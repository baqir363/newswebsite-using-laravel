@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row border-bottom text-center">
                @foreach ($categories as $category)
                    <div class="col mb-3">
                        <a href="{{ route('category.show',['category'=>$category->slug])}}">{{ $category->name}}</a>
                    </div>
                @endforeach
        </div>
        <div class="row">
            <div class="col-md-4 py-3">
                <h4>Recent News</h4>
                @foreach ($recent as $news)
                @livewire('news.listing', ['news'=>$news])
                @endforeach
            </div>
            <div class="col">

            </div>
        </div>
    </div>
@endsection
