<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reports extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo('\App\Models\user','user_id');
    }
    public function comment(){
        return $this->belongsTo('\App\Models\comment','comment_id');
    }
}
