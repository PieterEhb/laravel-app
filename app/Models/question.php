<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo('\App\Models\user','user_id');
    }
    public function responder(){
        return $this->belongsTo('\App\Models\user','response_by');
    }
    public function category(){
        return $this->belongsTo('\App\Models\questioncategory');
    }
}
