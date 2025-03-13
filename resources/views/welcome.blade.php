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
            <div class="col py-3">
                <div id="carouselExampleDark" class="carousel carousel-dark slide">
                    <div class="carousel-inner">
                        @foreach ($topNews as $news)
                            <div class="carousel-item @if($loop->first) active @endif" data-bs-interval="10000">
                                <img src="{{ asset('storage/'.$news->image)}}" class="d-block rounded" style="width: 960px; height: 600px;" alt="...">
                                <div style="position: absolute;bottom: 0px;background-color: rgba(0,0,0,0.5)" class="w-100 p-3 d-none d-md-block text-white">
                                <h5>{{ $news->heading }}</h5>
                                <small>{{ $news->created_at->diffForHumans() }}</small><br>
                                <p>{{ $news->excerpt}}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
            </div>
        </div>
    </div>
@endsection
