<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $table = 'tbladsgallery';

    public function ads()
    {
    	return $this->belongsTo(Ads::class,'adid','id');
       // return $this->belongsTo('App\Models\Ads','adid','id');
    }
}
