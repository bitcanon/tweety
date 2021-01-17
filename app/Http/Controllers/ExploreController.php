<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ExploreController extends Controller
{
    public function index()
    {
        $users = User::all()->except(current_user()->id);
        return view('explore.index', compact('users'));
    }
}
