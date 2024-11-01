<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class AuthenticatedSessionController extends Controller
{

    // Display the login form
    public function create()
    {
        return view('auth.login'); // Make sure this view exists
    }

    // Handle the login request

    public function store(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            auth()->login($user);

            // Redirect to drugs list after successful login
            return redirect()->route('drugs.index');
        } else {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
    }


    // Logout method
    public function destroy(Request $request)
    {
        auth()->logout(); // Log the user out
        return redirect('/login'); // Redirect to the login page
    }
    public function login(Request $request)
    {
        // Validate the input fields
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to authenticate
        $user = User::where('email', $request->email)->first();
        if ($user && Hash::check($request->password, $user->password)) {
            auth()->login($user);

            // Redirect to the specified route after successful login
            return redirect($this->redirectTo);
        } else {
            return back()->withErrors(['email' => 'The provided credentials do not match our records.']);
        }
    }
}
