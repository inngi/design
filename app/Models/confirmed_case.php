<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class confirmed_case extends Model
{
    use HasFactory;
    protected $table = "confirmed_case";
    protected $primaryKey = "id";
    protected $fillable =[
        "cityCode", "date", "numbers"
    ];

    public function cities(){
        return $this->belongsTo(cities::class);
    }
}
