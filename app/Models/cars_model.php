<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cars_model extends Model
{
    use HasFactory;
    protected $table='cars_models';
    protected $primaryKey='id';

    //One to Many Example
    //Belongs: Means Many car models belongs to one car(brand)
    public function cars(){
        return $this->belongsTo(Cars::class);
    }
}
