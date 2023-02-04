<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PostCategory;
use Illuminate\Http\Request;

class PostCategoryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'post_category_name' => 'required',
        ]);

        PostCategory::create([
            'post_category_name' => $request->post_category_name,
        ]);

        return request()->json(200, 'success', [
            'id' => $request->post_category_name,
        ]);
    }
}
