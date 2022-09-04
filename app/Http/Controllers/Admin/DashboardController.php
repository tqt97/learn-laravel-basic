<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\User;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $users = User::all();
        $categories = Category::all();

        return view('dashboard', compact('users', 'categories'));
    }
}
