<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matelas extends Model
{
    use HasFactory;

    public function marques()
    {
        return $this->belongsToMany(Marque::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
