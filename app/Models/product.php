<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table='products';
    protected $primaryKey='id';
    
    // MANY TO MANY RELATIONSHIP between cars and products
    public function cars(){
        return $this->belongsToMany(Cars::class);
    }
}
