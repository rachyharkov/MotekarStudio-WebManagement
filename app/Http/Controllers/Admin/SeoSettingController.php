<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SeoSetting;
use Illuminate\Http\Request;

class SeoSettingController extends Controller
{
    public function index()
    {
        return view('admin.seosetting.form');
    }

    // public function update(Request $request)
    // {
    //     $request->validate([
    //         'meta_title' => 'required',
    //         'meta_description' => 'required',
    //         'meta_keywords' => 'required',
    //         'google_analytics' => 'required',
    //         'google_search_console' => 'required',
    //         'bing_search_console' => 'required',
    //     ]);

    //     $seo = SeoSetting::first();
    //     $seo->meta_title = $request->meta_title;
    //     $seo->meta_description = $request->meta_description;
    //     $seo->meta_keywords = $request->meta_keywords;
    //     $seo->google_analytics = $request->google_analytics;
    //     $seo->google_search_console = $request->google_search_console;
    //     $seo->bing_search_console = $request->bing_search_console;
    //     $seo->save();

    //     return redirect()->back()->with('success', 'SEO Setting Updated Successfully');
    // }
}
