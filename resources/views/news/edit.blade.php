@extends('layouts.app')

@section('content')

    <div class="container-fluid">
        <div class="row justify-content-md-center">
            <div class="col-md-6">
                <h1>Edit News</h1>
                @livewire('news.edit',['news'=>$news])
            </div>
        </div>
    </div>
@endsection
