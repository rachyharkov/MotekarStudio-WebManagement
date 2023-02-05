<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VisitorController extends Controller
{
    public function index()
    {
        // return view('visitor.pages.main');
        return view('visitor.pages.coming-soon');
    }
}
