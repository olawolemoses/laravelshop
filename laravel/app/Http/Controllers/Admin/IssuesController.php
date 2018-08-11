<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IssuesController extends Controller
{
    //
    public function __construct()
    {
    	return $this->middleware('auth');
    }

    public function index()
    {
    	return view('admin.issues.index');
    }
}
