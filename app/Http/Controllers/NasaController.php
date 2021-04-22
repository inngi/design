<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nasa;
use Illuminate\Support\Facades\Http;

class NasaController extends Controller
{
    public function __construct()
    {
        $nasa = Nasa::latest('id')->get()->first();
        $json = Http::get("https://api.nasa.gov/planetary/apod?api_key=" . env('NASA_API'))
            ->json();
        if (!isset($nasa['date'])) {
            $today_nasa = Nasa::create(
                [
                    "copyRight" => $json["copyright"]??null,
                    "date" => $json["date"],
                    "explanation" => $json["explanation"],
                    "hdurl" => $json["hdurl"]??null,
                    "url" => $json["url"],
                    "title" => $json["title"],
                ]
            );
            return;
        }
        elseif($nasa['date'] == $json['date']){
            return;
        }
        $today_nasa = Nasa::create(
            [
                "copyRight" => $json["copyright"]??null,
                "date" => $json["date"],
                "explanation" => $json["explanation"],
                "hdurl" => $json["hdurl"]??null,
                "url" => $json["url"],
                "title" => $json["title"],
            ]
        );
    }
    public function index()
    {
        $nasa = Nasa::latest('id')->get()->first();
        // $xml = "xml";
        // $response = Http::get("http://openapi.data.go.kr/openapi/service/rest/Covid19/getCovid19InfStateJson?",[
        //     "serviceKey"=>"tUrVrvpv0PTKuJPdL2SgQ1taji59HrgdHbsdmLa6AIm2azX0UwNjXA2M0KKsz1SEMuOTYKXlbTKJ2wdLOsa9qw==",
        //     "pageNo"=>"1",
        //     "numOfRows"=>"10000",
        //     "startCreateDt"=>"20210418",
        //     "endCreateDt"=>"20210418"
        // ])->body();
        // $json = json_encode(simplexml_load_string($response));
        // $array = json_decode($json, true);
        // dd($array["body"]["items"]["item"]["accDefRate"]);
        // dd(simplexml_load_string($response));

        return view('nasa.index')->with("nasa",$nasa);
    }
    //
}
