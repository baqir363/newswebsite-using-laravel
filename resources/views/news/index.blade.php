@extends('layouts.account')

@section('account-content')

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <a href="{{ route('news.create')}}" class="btn btn-sm btn-primary float-end">Add New</a>
                <h1>News</h1>
                <table class="table table-bordered">
                    <tr>
                        <th>Heading</th>
                        <th>Category</th>
                        <th>Created At</th>
                        <th>Action</th>
                    </tr>
                    @foreach ($news as $row)
                        <tr>
                            <td>
                                @isset($row->image)
                                    <img src="{{ asset('storage/'.$row->image)}}" alt="" style="width: 100px;" class="rounded float-start me-2">
                                @endisset
                                {{ $row->heading }}
                            </td>
                            <td>{{ $row->category->name}}</td>
                            <td>{{ $row->created_at}}</td>
                            <td><a href="{{ route('news.edit',['news'=>$row->slug])}}">Edit</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
