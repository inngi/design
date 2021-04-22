<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lotto extends Model
{
    use HasFactory;
    // public function makeNumbers(){
    //     for($i=1; $i<46; $i++){

    //     }
    // }
    protected $table = 'lotto';
    protected $primaryKey = 'id';
    protected $fillable = [
       'no','date','first','second','third','fourth','fifth','sixth','bonus','firstAccumamnt','firstPrzwnerCo','firstWinamnt'
    ];
   
}
