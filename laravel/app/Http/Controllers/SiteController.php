<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SiteController extends Controller
{
    public function index()
    {
        $context = [];
        return view('site.index', $context);
        
    }
}