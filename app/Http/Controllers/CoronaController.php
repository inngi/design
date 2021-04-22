<?php

namespace App\Http\Controllers;

use App\Models\cities;
use App\Models\confirmed_case;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class CoronaController extends Controller
{
    private $result;
    private $go_to;
    private $vaccinated;
    public function __construct()
    {
    }
    public function index()
    {
        $this->number_of_get_vaccine();

        $this->initial_cities();
        $this->today_confirm();
        collect($this->result);
        $this->put_city_code();
        // dd($this->result);
        // dd($this->result);
        // $this->coronaByCities();
        // dd($this->vaccinated);
        return view('corona.index')->with("corona_by_cities",$this->go_to)->with("vaccines",$this->vaccinated);
    }

    public function coronaByCities($date = 0)
    {
        if ($date ==0){
            $date = date('Ymd');
        }
        $API_ADDRESS = "http://openapi.data.go.kr/openapi/service/rest/Covid19/getCovid19SidoInfStateJson?";
        $response = Http::get($API_ADDRESS, [
            "serviceKey" => env("CORONA_CITY_API"),
            "pageNo" => "1",
            "numOfRows" => "10",
            "startCreateDt" => $date,
            "endCreateDt" => $date
        ])->body();
        $this->xml_to_json($response);
    }
    public function xml_to_json($xml)
    {
        $json = json_encode(simplexml_load_string($xml));
        $json_decoded = json_decode($json, true);
        $this->result = $json_decoded;
    }

    public function initial_cities()
    {
        $quary = cities::firstOrCreate([
            "code"=> '11', 
            "name"=> '서울', 
            "ename"=> 'seoul'
        ]);
        $quary = cities::firstOrCreate([
            "code"=> '21', 
            "name"=> '부산', 
            "ename"=> 'busan'
        ]);
        $quary = cities::firstOrCreate([
            "code"=> '22', 
            "name"=> '대구', 
            "ename"=> 'daegu'
        ]);
        $quary = cities::firstOrCreate([
            "code"=> '23', 
            "name"=> '인천', 
            "ename"=> 'incheon'
        ]);
        $quary = cities::firstOrCreate([
            "code"=> '24', 
            "name"=> '광주', 
            "ename"=> 'kwangju'
        ]);
        $quary = cities::firstOrCreate([
            "code"=> '25', 
            "name"=> '대전', 
            "ename"=> 'daejeon'
        ]);
        $quary = cities::firstOrCreate([
            "code"=> '26', 
            "name"=> '울산', 
            "ename"=> 'ulsan'
        ]);
        $quary = cities::firstOrCreate([
            "code"=> '29', 
            "name"=> '세종', 
            "ename"=> 'sejong'
        ]);
        $quary = cities::firstOrCreate([
            "code"=> '31', 
            "name"=> '경기', 
            "ename"=> 'gyeonggi'
        ]);
        $quary = cities::firstOrCreate([
            "code"=> '32', 
            "name"=> '강원', 
            "ename"=> 'gangwon'
        ]);
        $quary = cities::firstOrCreate([
            "code"=> '33', 
            "name"=> '충북', 
            "ename"=> 'chungcheongbukdo'
        ]);
        $quary = cities::firstOrCreate([
            "code"=> '34', 
            "name"=> '충남', 
            "ename"=> 'chungcheongnamdo'
        ]);
        $quary = cities::firstOrCreate([
            "code"=> '35', 
            "name"=> '전북', 
            "ename"=> 'jeollabukdo'
        ]);
        $quary = cities::firstOrCreate([
            "code"=> '36', 
            "name"=> '전남', 
            "ename"=> 'jeollanamdo'
        ]);
        $quary = cities::firstOrCreate([
            "code"=> '37', 
            "name"=> '경북', 
            "ename"=> 'gyeongsangbukdo'
        ]);
        $quary = cities::firstOrCreate([
            "code"=> '38', 
            "name"=> '경남', 
            "ename"=> 'gyeongsangnamdo'
        ]);
        $quary = cities::firstOrCreate([
            "code"=> '39', 
            "name"=> '제주', 
            "ename"=> 'jeju'
        ]);
        $quary = cities::firstOrCreate([
            "code"=> '00', 
            "name"=> '합계', 
            "ename"=> 'korea nationwide'
        ]);
        $quary = cities::firstOrCreate([
            "code"=> '99', 
            "name"=> '검역', 
            "ename"=> 'Lazaretto'
        ]);
    }

    public function today_confirm($date =0 )
    {
        if ($date ==0){
            $date = date('Ymd');
        }
        
        $API_ADDRESS = "http://openapi.data.go.kr/openapi/service/rest/Covid19/getCovid19SidoInfStateJson?";
        $response = Http::get($API_ADDRESS, [
            "serviceKey" => env("CORONA_CITY_API"),
            "pageNo" => "1",
            "numOfRows" => "10",
            "startCreateDt" => $date,
            "endCreateDt" => $date
        ])->body();
        $this->xml_to_json($response);
        if ($this->result['body']['totalCount']==0){
            return 0;
        }

        foreach($this->result['body']['items']['item'] as $item){
            $code = cities::where('name','=',$item['gubun'])->first();
            confirmed_case::updateOrCreate([
                'cityCode' => $code['id'],
                'date' => $date,
                'numbers' => $item['incDec']
            ]);
        }
        return 0;
    }
    public function put_city_code()
    {
        $i=0;
        foreach($this->result['body']['items']['item'] as $item)
        {
            $citycode = cities::where('name','=',$item['gubun'])->get()->first();
            // $this->go_to[$i]=$item;
            // $this->go_to[$i]['code']=$citycode['code'];
            $this->go_to[$citycode['code']]=$item;
            $i++;
        }
    }
    public function number_of_get_vaccine()
    {
        $i = 1;
        while(1){
            $response = Http::get('https://api.odcloud.kr/api/15077756/v1/vaccine-stat?',[
                "serviceKey"=>"tUrVrvpv0PTKuJPdL2SgQ1taji59HrgdHbsdmLa6AIm2azX0UwNjXA2M0KKsz1SEMuOTYKXlbTKJ2wdLOsa9qw==",
                "page"=>$i,
                "perPage"=>20000,
                "returntype"=>"json",
                "baseDate"=>date("Ymd"),
                ]
                )->json();
                if($response["data"]==[])
                {
                    break;
                }
                else{
                    $i++;
                }
        }
        $response = Http::get('https://api.odcloud.kr/api/15077756/v1/vaccine-stat?',[
            "serviceKey"=>"tUrVrvpv0PTKuJPdL2SgQ1taji59HrgdHbsdmLa6AIm2azX0UwNjXA2M0KKsz1SEMuOTYKXlbTKJ2wdLOsa9qw==",
            "page"=>$i-1,
            "perPage"=>20000,
            "returntype"=>"json",
            "baseDate"=>date("Ymd"),
            ]
            )->json();

            // dd($response);
        $count = count($response["data"])-1;

        // dd($response['data'][$count-17]);
        // 전국
        $this->vaccinated['0']=$response['data'][$count-18];
        $this->vaccinated['11']=$response['data'][$count-17];
        $this->vaccinated['21']=$response['data'][$count-16];
        $this->vaccinated['22']=$response['data'][$count-15];
        $this->vaccinated['23']=$response['data'][$count-14];
        $this->vaccinated['26']=$response['data'][$count-13];
        $this->vaccinated['24']=$response['data'][$count-12];
        $this->vaccinated['25']=$response['data'][$count-11];
        $this->vaccinated['31']=$response['data'][$count-10];
        $this->vaccinated['29']=$response['data'][$count-9];
        $this->vaccinated['32']=$response['data'][$count-8];
        $this->vaccinated['33']=$response['data'][$count-7];
        $this->vaccinated['34']=$response['data'][$count-6];
        $this->vaccinated['35']=$response['data'][$count-5];
        $this->vaccinated['36']=$response['data'][$count-4];
        $this->vaccinated['37']=$response['data'][$count-3];
        $this->vaccinated['38']=$response['data'][$count-2];
        $this->vaccinated['39']=$response['data'][$count-1];
        

        for ($i=17; $i==0; $i--){
        }
        // dd($response['data'][$count-17]);
        
    }

    public function show($id)
    {
        return view('corona.show');
    }
}