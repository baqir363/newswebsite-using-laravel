@extends('layouts.account')

@section('account-content')
    <h3 class="mb-3">Change Password</h3>
    <div class="row">
        <div class="col-md-6 col-lg-4">
            <form action="{{ route('password.update')}}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="current_password">Current Password</label>
                    <input class="form-control" type="password" name="current_password" id="current_password">
                    @error('current_password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password">New Password</label>
                    <input class="form-control" type="password" name="password" id="password">
                    @error('password')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="password_confirmation">Confirm Password</label>
                    <input class="form-control" type="password" name="password_confirmation" id="password_confirmation">
                    @error('password_confirmation')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <input type="submit" value="Update" class="btn btn-sm btn-primary">
            </form>
        </div>
    </div>
@endsection
