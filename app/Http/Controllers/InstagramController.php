<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class InstagramController extends Controller
{
    public function index(){
        $response = Http::get('https://api.instagram.com/oauth/authorize
        ?client_id=990602627938098',[
            "redirect_uri" =>"https://socialsizzle.herokuapp.com/auth/",
            "response_type"=>"code",
            "scope"=>"user_profile,user_media",
            "state"=>"1"
        ]);
        dd($response);
        return view('instagram.index')->with('response',$response);
    }
    //
}
