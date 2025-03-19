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
            <div class="col-md-3 py-3">
                <h4>Recent News</h4>
                @foreach ($recent as $news)
                @livewire('news.listing', ['news'=>$news])
                @endforeach
            </div>
            <div class="col-md-6 py-3">
                <div id="carouselExampleDark" class="carousel carousel-dark slide">
                    <div class="carousel-inner">
                        @foreach ($topNews as $news)
                            <div class="carousel-item @if($loop->first) active @endif" data-bs-interval="10000">
                                <img src="{{ asset('storage/'.$news->image)}}" class="d-block rounded" style="width: 960px; height: 536px;" alt="...">
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
            <div class="col-md-3 py-3">
                <div class="card border-primary text-dark bg-info">
                    <div class="card-body">
                      <h5 class="card-title">Become NewsMods Partner</h5>
                      <h6 class="card-subtitle mb-2 text-body-secondary">Report/Edit/Anchor/Verify News</h6>
                        <p class="card-text">
                            Create your news channel or post news verified news and earn profit with us.
                        </p>
                        @guest
                            <a href="{{ route('register')}}" class="btn btn-primary w-100">Register Now</a>
                        @else
                            <a href="{{ route('news.create')}}" class="btn btn-primary w-100">Add News</a>
                        @endguest
                    </div>
                </div>

                Adverisement
                <div class="bg-secondary" style="height: 40vh;"></div>
            </div>
        </div>
    </div>
@endsection
