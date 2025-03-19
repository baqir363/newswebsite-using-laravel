@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Edit Category</h1>
               @livewire('category.edit', ['category'=>$category])
            </div>
        </div>
    </div>

@endsection
