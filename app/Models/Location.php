<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Location extends Model
{
    use HasFactory;
    protected $table = 'tbllocation';

    public function children()
    {
        return $this->hasMany(Location::class, 'parent')->orderby('sort_id');

    }

    public function scopeRoot($query)
    {
        $query->whereNull('parent');

    }


}
