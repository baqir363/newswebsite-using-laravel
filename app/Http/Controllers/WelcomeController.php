<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class WelcomeController extends Controller
{
    public function index()
    {
        $categories = Category::get();
        $recent = \App\Models\News::latest()->limit(6)->get();

        $topNews = \App\Models\News::whereNotNull('image')->latest()->limit(4)->get();
        return view('welcome', compact('categories','recent','topNews'));
    }
}
