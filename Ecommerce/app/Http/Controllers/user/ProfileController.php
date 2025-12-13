<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display the user's profile information.
     */
    public function show()
    {
        // Automatically fetches the currently authenticated user
        $user = Auth::user(); 
        
        // Pass the user object to the profile view
        return view('user.profile.show', compact('user'));
    }

    /**
     * Update the user's profile information (Name and Email).
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        // 1. Validation
        $request->validate([
            'name' => 'required|string|max:255',
            // Ensure the email is unique, ignoring the current user's email
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        // 2. Update and Save
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        // 3. Redirect back with a success message
        return redirect()->route('user.profile')->with('success', 'Profile updated successfully!');
    }
}