<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = ['quantity']; 

    public function matelas()
    {
        return $this->belongsTo(Matelas::class, 'matelas_id');
    }
}
