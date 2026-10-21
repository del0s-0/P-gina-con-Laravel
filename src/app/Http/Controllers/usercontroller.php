<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class usercontroller extends Controller
{
    public function index(Request $request){
        $users = User::paginate(10);
        return view('users', compact('users'));
    }
}
