<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function index()
    {
        return view('user.about');
    }
}
