@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="border-bottom">
                    <h1>{{ $news->heading }}</h1>
                    <small class="text-muted">{{ $news->created_at->diffForHumans() }}</small>
                    <p>{{ $news->excerpt }}</p>
                </div>
                <p>{{ $news->content }}</p>
            </div>
            <div class="col">
                <h5>More News</h5>
            </div>
        </div>
    </div>
@endsection
