<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile() {
        $user = auth()->user();
        return view('pages.profile.index', compact('user'));
    }

    public function profileUpdate(Request $request) {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|confirmed',
        ]);

        $user = User::find(auth()->id());
        // dd($user);

        if (Hash::check($request->old_password, $user->password)) {
            $user->update([
                'password' => Hash::make($request->password),
            ]);

            return redirect()->back()->with('success', 'Profile updated successfully');
        }

        return redirect()->back()->with('success', 'Opps! Something went wrong');
    }
}
