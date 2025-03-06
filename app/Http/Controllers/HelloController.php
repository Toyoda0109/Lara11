<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class HelloController extends Controller
{
    public function index(Request $request) {
        $name = $request->input('name', '');
        return view('hello', compact('name'));
    }

    public function show(User $user) {
        dd($user->toArray());
    }
}
