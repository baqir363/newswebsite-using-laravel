@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="border-bottom">
                    <h1>{{ $news->heading }}</h1>
                    <span class="badge bg-secondary">{{ $news->category->name }}</span>
                    <small class="text-muted">{{ $news->updated_at->format('l, M d, Y-h:i A T') }}</small>
                    <p class="mt-4">
                    {{ $news->excerpt }}</p>
                    @isset($news->image)
                        <img src="{{ asset('storage/'.$news->image)}}" alt="" style="width: 100px;" class="rounded w-50">
                    @endisset
                </div>
                <div class="my-3">
                    <p>
                        @isset($news->city)
                            <b>{{ $news->city->name }}</b> :
                        @endisset{{ $news->content }}</p>
                </div>
                <div class="border rounded p-3">
                    BY: {{ $news->user->name }}
                </div>
            </div>
            <div class="col">
                <h5>More News</h5>
            </div>
        </div>
    </div>
@endsection
