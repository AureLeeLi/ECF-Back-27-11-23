<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matelas extends Model
{
    use HasFactory;

    public function marques()
    {
        return $this->belongsTo(Marque::class, 'marque_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function dimensions(){
        return $this->belongsTo(Dimension::class, 'dimension_id');
    }

    public function stocks(){
        return $this->belongsTo(Stock::class, 'stock_id');
    }

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
   

}