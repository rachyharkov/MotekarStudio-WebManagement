<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Portofolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class PortofolioController extends Controller
{
    public function index()
    {
        if(request()->ajax()) {
            $datanya = Portofolio::latest()->get();
            return DataTables::of($datanya)
                ->addIndexColumn()
                ->addColumn('action','admin.portofolio._action')
                ->toJson();
        }

        return view('admin.portofolio.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'portofolio_title' => 'required',
            'portofolio_content' => 'required',
            // 'portofolio_service' => 'required',
            // 'portofoilo_foto_sampul' => 'required',
            // 'portofoilo_link' => 'required',
        ]);

        // dd($request->all());

        $image_name = 'default.png';
        if($request->hasFile('portofolio_foto_sampul')) {
            $image = $request->file('portofolio_foto_sampul');
            $image_name = 'sampul-'.date('Y-m-d').time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/images/portofolios'), $image_name);

        }

        Portofolio::create([
            'portofolio_title' => $request->portofolio_title,
            'portofolio_content' => $request->portofolio_content,
            'portofolio_service' => $request->portofolio_service,
            'portofolio_foto_sampul' => $image_name,
            'portofolio_link' => $request->portofolio_link,
            'pprtofolio_views' => 0,
            'portofolio_status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return request()->json(200, 'success', [
            'id' => $request->portofolio_title,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'portofolio_title' => 'required',
            'portofolio_content' => 'required',
            // 'portofolio_service' => 'required',
            // 'portofoilo_foto_sampul' => 'required',
            // 'portofolio_link' => 'required',
        ]);

        // dd($request->all());


        $portofolio = Portofolio::find($request->portofolio_id);

        $image_name = $portofolio->portofolio_foto_sampul;
        if($request->hasFile('portofolio_foto_sampul')) {
            // dd($request->all());

            $image = $request->file('portofolio_foto_sampul');
            $image_name = 'sampul-'.date('Y-m-d').time() . '.' . $image->getClientOriginalExtension();
            // upload to public/images/portofolios
            $image->move(public_path('/images/portofolios'), $image_name);


            if($portofolio->portofolio_foto_sampul != 'default.png') {
                if(file_exists(public_path('/images/portofolios/' . $portofolio->portofolio_foto_sampul))) {
                    unlink(public_path('/images/portofolios/' . $portofolio->portofolio_foto_sampul));
                }
            }
        }

        $portofolio->update([
            'portofolio_title' => $request->portofolio_title,
            'portofolio_content' => $request->portofolio_content,
            'portofolio_service' => $request->portofolio_service,
            'portofolio_foto_sampul' => $image_name,
            'portofolio_link' => $request->portofolio_link,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return request()->json(200, 'success', [
            'id' => $request->portofolio_title,
        ]);
    }

    public function destroy($id)
    {
        $portofolio = portofolio::find($id);

        if($portofolio->portofolio_foto_sampul != 'default.png') {
            if(file_exists(public_path('/images/portofolios/' . $portofolio->portofolio_foto_sampul))) {
                unlink(public_path('/images/portofolios/' . $portofolio->portofolio_foto_sampul));
            }
        }

        $portofolio->delete();

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
            $fileName = 'content-'.$randomname . '.' . $extension;

            $request->file('upload')->move(public_path('/images/portofolios'), $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/portofolios/'.$fileName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            return response()->json([
                'uploaded' => true,
                'url' => $url
            ]);
        }
    }
}
