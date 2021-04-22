<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nasa extends Model
{
    use HasFactory;

    protected $table = "nasa";
    protected $primaryKey ="id";
    protected $fillable =[
        "copyRight", "date", "explanation", "url", "title", "hdurl"
    ];

}
