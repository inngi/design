<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lotto;
use App\Models\lottofreq;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class GambleController extends Controller
{
    private $this_week;

    public function __construct()
    {
        
    }
    //     $lotto_no = 0;
    //     while (1) {
    //         // $lotto = DB::table('lotto')->first();
    //         $lotto = lotto::latest('no')->get()->first();
    //         $lottofreq = lottofreq::latest('no')->get()->first();
    //         if ($lotto == null) {
    //             $lotto_no = 1;
    //         } else {
    //             $lotto_no = $lotto['no'] + 1;
    //         }

    //         $json = Http::get("https://www.dhlottery.co.kr/common.do?method=getLottoNumber&drwNo=" . $lotto_no)->json();
    //         if ($json['returnValue'] == "fail") {
    //             break;
    //         }

    //         $lotto_this_week = lotto::create([
    //             'no' => $json['drwNo'],
    //             'date' => $json['drwNoDate'],
    //             'first' => $json['drwtNo1'],
    //             'second' => $json['drwtNo2'],
    //             'third' => $json['drwtNo3'],
    //             'fourth' => $json['drwtNo4'],
    //             'fifth' => $json['drwtNo5'],
    //             'sixth' => $json['drwtNo6'],
    //             'bonus' => $json['bnusNo'],
    //             'firstAccumamnt' => $json['firstAccumamnt'],
    //             'firstPrzwnerCo' => $json['firstPrzwnerCo'],
    //             'firstWinamnt' => $json['firstWinamnt']
    //         ]);

    //         if ($lottofreq == null) {
    //             $lotto_freq_this_week = lottofreq::create([
    //                 'no' => $json['drwNo'],
    //                 'number'.$json['drwtNo1'] => 1,
    //                 'number'.$json['drwtNo2'] => 1,
    //                 'number'.$json['drwtNo3'] => 1,
    //                 'number'.$json['drwtNo4'] => 1,
    //                 'number'.$json['drwtNo5'] => 1,
    //                 'number'.$json['drwtNo6'] => 1
    //             ]);
    //         } else {
    //             $lotto_freq_this_week = $lottofreq->replicate();
    //             $lotto_freq_this_week['no']=$json['drwNo'];
    //             $lotto_freq_this_week['number'.$json['drwtNo1']]+=1;
    //             $lotto_freq_this_week['number'.$json['drwtNo2']]+=1;
    //             $lotto_freq_this_week['number'.$json['drwtNo3']]+=1;
    //             $lotto_freq_this_week['number'.$json['drwtNo4']]+=1;
    //             $lotto_freq_this_week['number'.$json['drwtNo5']]+=1;
    //             $lotto_freq_this_week['number'.$json['drwtNo6']]+=1;
    //             $lotto_freq_this_week->push();
             
    //         }
    //         // if ($lotto_no == 10) {
    //         //     break;
    //         // }
    //     }

    //     // dd($json);
    // }

    public function index()
    {
        // dd($response);
        // $lotto = lotto::all();
        // dd($this->this_week);
        // $lotto = lottofreq::all()->sortByDesc('no');
        return view('lotto.index');
        // return view('lotto.lotto')->with('lottofreq', $lotto);
    }

    public function pension()
    {
        return view('lotto.pension');
    }
    public function post()
    {
        if (isset($_POST['lotto'])){
            $numbers=$this->make_lotto_numbers();
            return back()->with('numbers',$numbers);
        }
    }
    public function make_lotto_numbers(){
        $numbers=array();
        while(1){
            $rand_number = rand(1,45);
            
            if(!in_array($rand_number,$numbers)){
                $numbers[] = $rand_number;
            }
            if(count($numbers)==6){
                break;
            }
        }
        sort($numbers);
        return $numbers;
    }
    //
}
