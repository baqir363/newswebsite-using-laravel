<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

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

    public function test()
    {
        //GET https://newsapi.org/v2/top-headlines?country=us&apiKey=API_KEY
        $response = Http::get('https://newsapi.org/v2/top-headlines?country=in&apiKey='.getenv('NEW_API_KEY'));
        dd($response->json());

        $apidata = Cache::remember('api_news', 900, function () {
            $response = Http::get('https://newsapi.org/v2/top-headlines?country=us&apiKey='.getenv('NEW_API_KEY'));
            return $response->object();
        });

        foreach($apidata->articles as $article){
            echo  $article->title."<br><img style='width:100px;' src=". $article->urlToImage.">".$article->content."<hr>";
        }
    }
}
