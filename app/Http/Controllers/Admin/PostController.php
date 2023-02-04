<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;


class PostController extends Controller
{
    public function index()
    {
        if(request()->ajax()) {
            $datanya = Post::latest()->get();
            return DataTables::of($datanya)
                ->addIndexColumn()
                ->addColumn('action','admin.post._action')
                ->toJson();
        }

        return view('admin.post.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'post_title' => 'required',
            'post_content' => 'required',
            'post_category' => 'required',
            'created_at_date' => 'required',
            'created_at_time' => 'required',
            'tags' => 'required',
        ]);

        // dd($request->all());

        $image_name = 'default.png';
        if($request->hasFile('foto_sampul')) {
            $image = $request->file('foto_sampul');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            // upload to storage/app/public/post
            Storage::disk('public')->put('posts_image/' . $image_name, file_get_contents($image));
        }

        Post::create([
            'post_title' => $request->post_title,
            'post_content' => $request->post_content,
            'post_status' => 'published', // published
            'post_category' => $request->post_category,
            'post_author' => Auth::user()->id,
            'post_views' => 0,
            'tags' => $request->tags,
            'foto_sampul' => $image_name,
            'created_at' => Carbon::parse($request->created_at_date . ' ' . $request->created_at_time),
            'updated_at' => Carbon::now(),
        ]);

        return request()->json(200, 'success', [
            'id' => $request->post_title,
        ]);
    }

    public function edit($id)
    {
        // return view('admin.post.edit');
    }

    public function update(Request $request)
    {
        $request->validate([
            'post_id' => 'required',
            'post_title' => 'required',
            'post_content' => 'required',
            'post_category' => 'required',
            'created_at_date' => 'required',
            'created_at_time' => 'required',
            'tags' => 'required',
        ]);

        // dd($request->all());

        $post = Post::find($request->post_id);

        $image_name = $post->foto_sampul;
        if($request->hasFile('foto_sampul')) {
            $image = $request->file('foto_sampul');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            // upload to storage/app/public/post
            Storage::disk('public')->put('posts_image/' . $image_name, file_get_contents($image));
            Storage::disk('public')->delete('posts_image/' . $post->foto_sampul);
        }

        $post->update([
            'post_title' => $request->post_title,
            'post_content' => $request->post_content,
            'post_category' => $request->post_category,
            'post_author' => Auth::user()->id,
            'tags' => $request->tags,
            'foto_sampul' => $image_name,
            'updated_at' => Carbon::now(),
        ]);

        return request()->json(200, 'success', [
            'id' => $request->post_title,
        ]);
    }

    public function destroy($id)
    {
        $post = Post::find($id);

        if($post->foto_sampul != 'default.png') {
            Storage::disk('public')->delete('posts_image/' . $post->foto_sampul);
        }

        $post->delete();

        return request()->json(200, 'success', [
            'id' => $id,
        ]);
    }

    public function upload_image(Request $request)
    {
        if($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $randomname = Str::random($length=10);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $randomname . '.' . $extension;

            $request->file('upload')->storeAs('public/posts_image', $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/posts_image/'.$fileName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            return response()->json([
                'uploaded' => true,
                'url' => $url
            ]);
        }
    }

    public function get_post_categories(Request $request)
    {
        $keyword = $request->q;

        $data = postCategory::select('post_category_name')
            ->where('post_category_name', 'LIKE', "%$keyword%")
            ->get();

        $resp = [
            'data' => [],
            'more' => false
        ];

        if(count($data) > 0) {
            foreach($data as $d) {
                $resp['data'][] = [
                    'id' => $d->post_category_name,
                    'text' => $d->post_category_name
                ];
            }
        }

        return response()->json($data);
    }
}

