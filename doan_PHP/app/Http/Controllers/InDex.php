<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InDex extends Controller
{
    public function index()
    {
    	return view('index');
    }
}
