<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;

    public function news(){
        return $this->belongsTo('\App\Models\news');
    }
    public function user(){
        return $this->belongsTo('\App\Models\user');
    }
}
