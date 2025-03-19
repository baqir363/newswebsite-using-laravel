@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <a href="{{ route('category.create')}}" class="btn btn-primary btn-sm float-end">Create</a>
        <h1>Categories</h1>
        <table class="table table-bordered">
            <tr>
                <th>Name</th>
                <th>Slug</th>
                <th>Updated At</th>
                <th>Action</th>
            </tr>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>{{ $category->updated_at }}</td>
                    <td><a href="{{ route('category.edit',['category'=>$category->id])}}" class="btn btn-sm btn-info"><i class="fas fa-edit"></i></a>
                        <a href="javascript:void(0);" onclick="confirmDelete('deleteForm-{{ $category->id }}')" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a>
                    <form id="deleteForm-{{ $category->id }}" action="{{ route('category.destroy',['category'=>$category->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                    </form></td>
                </tr>
            @endforeach

        </table>
    </div>
@endsection
