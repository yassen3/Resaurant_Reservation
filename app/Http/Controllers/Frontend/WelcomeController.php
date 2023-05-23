<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function thankyou()
    {
        return view('thankyou');
    }

    public function welcome()
    {
        return view('welcome');
    }
}