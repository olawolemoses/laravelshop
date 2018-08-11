<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class WelcomeController extends Controller
{
    public function index()
    {
        $context = [];
        
        return view('welcome.index', $context);
        
    }
}