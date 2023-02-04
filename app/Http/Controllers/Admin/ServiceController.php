<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        if(request()->ajax()) {
            $datanya = Service::latest()->get();
            return DataTables::of($datanya)
                ->addIndexColumn()
                ->addColumn('action','admin.service._action')
                ->toJson();
        }

        return view('admin.service.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_title' => 'required',
            'service_short_description' => 'required',
            'service_content' => 'required',
            'service_icon' => 'required',
        ]);

        // dd($request->all());

        $image_name = 'default.png';
        if($request->hasFile('service_foto_sampul')) {
            $image = $request->file('service_foto_sampul');
            $image_name = 'sampul-'.date('Y-m-d').time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('/images/services'), $image_name);

        }

        service::create([
            'service_title' => $request->service_title,
            'service_short_description' => $request->service_short_description,
            'service_content' => $request->service_content,
            'service_icon' => $request->service_icon,
            'service_views' => 0,
            'service_status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return request()->json(200, 'success', [
            'id' => $request->service_title,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'service_title' => 'required',
            'service_short_description' => 'required',
            'service_content' => 'required',
            'service_icon' => 'required',
        ]);

        $service = service::find($request->service_id);

        $service->update([
            'service_title' => $request->service_title,
            'service_short_description' => $request->service_short_description,
            'service_content' => $request->service_content,
            'service_icon' => $request->service_icon,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return request()->json(200, 'success', [
            'id' => $request->service_title,
        ]);
    }

    public function destroy($id)
    {
        $service = service::find($id);
        $service->delete();

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

            $request->file('upload')->move(public_path('/images/services'), $fileName);

            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('images/services/'.$fileName);
            $msg = 'Image uploaded successfully';
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";

            return response()->json([
                'uploaded' => true,
                'url' => $url
            ]);
        }
    }
}
