@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Add Category</h1>
               @livewire('category.edit')
            </div>
        </div>
    </div>

@endsection
