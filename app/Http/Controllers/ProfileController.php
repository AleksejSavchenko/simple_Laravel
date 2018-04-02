<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show() {
        $user_profile = User::find(Auth::id());
        $user_profile['role'] = $user_profile->roles;
//dd(count($user_profile['role']));
        return view('user_profile')->with([
            'header' => "Profile",
            'user_profile' => $user_profile
        ]);
    }
}
