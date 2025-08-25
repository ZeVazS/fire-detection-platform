<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Zone;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::all();
        $zones = Zone::with('cameras')->get();
        return view('dashboard', compact('users', 'zones'));
    }
}
