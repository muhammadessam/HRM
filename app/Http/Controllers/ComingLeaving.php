<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComingLeaving extends Controller
{
    public function index()
    {
      return view('auth.coming_leving');
    }
}
