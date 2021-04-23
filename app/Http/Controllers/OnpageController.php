<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OnpageController extends Controller
{
    //
    public function responsive(){
        return view('design.onepage.responsive');
    }
    public function calendar(){
        return view('design.onepage.calendar');
    }
}
