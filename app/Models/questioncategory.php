<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class questioncategory extends Model
{
    use HasFactory;

    public function question()
    {
        return $this->hasMany('App\models\question');
    }
}
