@extends('layouts.account')

@section('account-content')
    Welcome {{ Auth::user()->name }}
@endsection
