<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $limit = 10;
        $news = News::latest()->paginate($limit);
        if (\Request::wantsJson()) {
            return $news;
        } else{
            return view('news.index', compact('news'));
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('news.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            "heading"=>"required",
            "excerpt"=>"required",
            "content"=>"required",
            "image"=>"image",
            "category_id"=>"required",
        ]);
        $validated['user_id'] = \Auth::id();
        return $news = News::create($validated);
    }

    /**
     * Display the specified resource.
     */
    public function show(News $news)
    {
        //
        if (\Request::wantsJson()) {
            return $news;
        } else{
            return view('news.show', compact('news'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(News $news)
    {
        //
        return view('news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(News $news)
    {
        //
    }
}
