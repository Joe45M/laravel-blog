<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function index($id) {
        $user = User::where('id', $id)->first();

        if(!$user) {
            abort(404);
        }

        return view('user.profile', ['profile' => $user]);
    }
}
