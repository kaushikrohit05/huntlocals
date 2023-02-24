<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    use HasFactory;
    protected $table = 'tbluserads';

    public function gallery(){
         return $this->hasMany('App\Models\Gallery','adid','id');
        // return $this->hasMany(Gallery::class);
  
    }
     
}
