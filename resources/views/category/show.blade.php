@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="border-bottom">
                    <h1>{{ $category->name }} News</h1>
                </div>
                @foreach ($news as $row)
                    @livewire('news.listing', ['news'=>$row])
                @endforeach
            </div>
            <div class="col">
            </div>
        </div>
    </div>
@endsection
