<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    
    public function editProfile(Request $request, User $user)
    {
       $request->validate([
            'name' => 'required',
            'email' => ['required'],
            'lastpassword' => ['required','min:6'],
            'newpassword' => ['required','min:6'],
        ]);

        $lastpassword = $request->input('lastpassword');
        $newpassword = $request->input('newpassword');

        if(!Hash::check($lastpassword, $user->password)){
            return redirect()->back()->withErrors("Old Password Doesn't match!");
        }

        // #Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($newpassword)
        ]);

        return back()->with('success', 'Profile is updated!!');
    }
}

