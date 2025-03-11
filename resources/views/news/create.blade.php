@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <h1>Add News</h1>
                @livewire('news.edit')
            </div>
        </div>
    </div>
@endsection
