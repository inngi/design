<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JusoController extends Controller
{

    
    public function index(){
        return view('address.index');
    }
    public function submit(request $request){
       
        if ($request->has("currentPage")){
            
            return ("good");
        }
        else{
            dd($request);
            return back()->with("result","else");
        }
    }
    //
}
