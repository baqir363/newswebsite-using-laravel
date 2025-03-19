<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Carbon\Carbon;

class WelcomeController extends Controller
{
    public function index()
    {

        //\Auth::user()->assignRole('Super Admin');
        $categories = Category::get();
        $recent = \App\Models\News::whereNotNull('published_at')->whereTime('published_at','<',Carbon::now())->latest()->limit(6)->get();

        $topNews = \App\Models\News::whereNotNull('image')->latest()->limit(4)->get();
        return view('welcome', compact('categories','recent','topNews'));
    }
}
