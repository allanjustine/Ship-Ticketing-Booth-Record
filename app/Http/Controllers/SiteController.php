<?php

namespace App\Http\Controllers;

use App\Models\Passenger;
use App\Models\Ship;
use App\Models\User;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function home()
    {
        $totalShips = Ship::count();
        $totalPassengers = Passenger::count();

        return inertia('Home', [
            'totalShips' => $totalShips,
            'totalPassengers' => $totalPassengers,
        ]);
    }

    public function loginForm()
    {
        return inertia('Login');
    }

    public function registerForm()
    {
        return inertia('Register');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        $login = auth()->attempt($request->all());

        if ($login)
            return redirect('/passengers');
        else
            return back()->withErrors(['authentication' => 'Invalid username and/or password.']);
    }

    public function register(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users,username',
            'fullname' => 'required',
            'mobile_number' => 'required',
            'role' => 'required',
            'password' => 'required'
        ]);

        User::create([
            'username' => $request->username,
            'fullname' => $request->fullname,
            'mobile_number' => $request->mobile_number,
            'role' => $request->role,
            'password' => bcrypt($request->password)
        ]);

        return redirect('/login')->with('Info', 'You registered an account successfully.');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }
}
