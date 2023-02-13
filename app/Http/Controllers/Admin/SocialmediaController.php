<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class SocialmediaController extends Controller
{
    public function index()
    {
        if(request()->ajax()) {
            $datanya = SocialMedia::latest()->get();
            return DataTables::of($datanya)
                ->addIndexColumn()
                ->addColumn('action','admin.social_media._action')
                ->toJson();
        }

        return view('admin.social_media.index');
    }

    public function store(Request $request)
    {
        $request->validate([
            'social_media_name' => 'required',
            'social_media_icon' => 'required',
            'social_media_url' => 'required',
        ]);

        SocialMedia::create([
            'social_media_name' => $request->social_media_name,
            'social_media_icon' => $request->social_media_icon,
            'social_media_url' => $request->social_media_url,
            'social_media_type' => $request->social_media_type,
            'social_media_color_primary' => $request->social_media_color_primary,
            'social_media_color_secondary' => $request->social_media_color_secondary,
            'social_media_clicks' => 0,
            'social_media_status' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return request()->json(200, 'success', [
            'id' => $request->social_media_name,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'social_media_name' => 'required',
            'social_media_icon' => 'required',
            'social_media_url' => 'required',
        ]);

        $social_media = SocialMedia::find($request->social_media_id);

        $social_media->update([
            'social_media_name' => $request->social_media_name,
            'social_media_icon' => $request->social_media_icon,
            'social_media_url' => $request->social_media_url,
            'social_media_type' => $request->social_media_type,
            'social_media_color_primary' => $request->social_media_color_primary,
            'social_media_color_secondary' => $request->social_media_color_secondary,
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return request()->json(200, 'success', [
            'id' => $request->social_media_name,
        ]);
    }

    public function destroy($id)
    {
        $social_media = SocialMedia::find($id);
        $social_media->delete();

        return request()->json(200, 'success', [
            'id' => $id,
        ]);
    }
}
