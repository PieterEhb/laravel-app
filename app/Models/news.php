<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    use HasFactory;
    public function comment(){
        return $this->hasMany('\App\Models\comment');
    }
    public function user(){
        return $this->belongsTo('\App\Models\user');
    }
    public function likes(){
        return $this->hasMany('App\models\like');
    }
}
