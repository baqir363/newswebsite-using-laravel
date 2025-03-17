@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-lg-3">
            <div class="card">
                <div class="card-header">{{ __('My account') }}</div>

                <div class="card-body">
                    <ul class="nav flex-column nav-pills">
                        <li class="nav-item">
                            <a class="nav-link @if(url()->current()==route('home')) active @endif" aria-current="page" href="{{route('home')}}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if(url()->current()==route('password.edit')) active @endif" href="{{ route('password.edit')}}">Change Password</a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link" href="#">My Earnings Report</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Billing/ Details</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">My Channels</a>
                        </li> --}}
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-md-8 col-lg-9">
            @yield('account-content')
        </div>
    </div>
</div>
@endsection
