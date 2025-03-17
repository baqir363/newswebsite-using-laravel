<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
class AccountController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function editPassword(){
        return view('account.password');
    }

    public function updatePassword(Request $request){
        if(!Hash::check($request->current_password, Auth::user()->password)) {
            return redirect()->back()->with('danger','Entered current password is wrong.');
        }
        $request->validate([
            "password" => ['required','confirmed',Password::min(8)->mixedCase()],
        ]);
        Auth::user()->password = Hash::make($request->password);
        Auth::user()->save();

        return redirect()->back()->with('message','Password Updated Successfully');
    }
}
