<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cities extends Model
{
    use HasFactory;
    protected $table = "cities";
    protected $primaryKey = "id";
    protected $fillable = [
        "code", "name", "ename"
    ];

    public function city_confirmed(){
        return $this->hasMany(confirmed_case::class);
    }
    public function city_death(){
        return $this->hasMany(death_case::class);
    }
}
