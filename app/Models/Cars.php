<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cars extends Model
{
    use HasFactory;
    // We Can manipulate table field defined structure like we can define date format for timestamp, we can set
    // primary key for a column etc.
    protected $table='cars';
    protected $primaryKey='id';
    // protected $timestamps=true; //Set it to TRUE if we want to use it
    // protected $dateFormat='h:m:s';//We can use any that are define in PHP

    protected $fillable=['name','founded','description','image_path','user_id']; //We have to set fillable property in order to insert data using associate array.

    //One to Many Example
    //hasmany: Means One car(brand) has many models
    public function cars_model(){
        return $this->hasMany(cars_model::class);
    }

    // Here we have hasmany relationship between cars,cars_models,engine
    //Engine has primary key in cars_models while cars_models has primary key in cars
    // So CARS->CARS_MODELS->ENGINE
    // hasManyThrough(Name of model we wish to access,Intermediate model)
    public function engines(){
        return $this->hasManyThrough(
            engine::class,
            cars_model::class,
            'cars_id', //Foreign key cars_model table (optional arg)
            'model_id' //Foreign key engine table (optional arg)
        );
    }

    // Here we have hasone relationship between cars,cars_models,car_production_dates
    //car_production_dates has primary key in cars_models while cars_models has primary key in cars
    // So CARS->CARS_MODELS->ENGINE
    // hasOneThrough(Name of model we wish to access,Intermediate model)
    public function car_production_date(){
        return $this->hasOneThrough(
            carProductionDate::class,
            cars_model::class,
            'cars_id', //Foreign key cars_model table (optional arg)
            'model_id' //Foreign key engine table (optional arg)
        );
    }

    // MANY TO MANY RELATIONSHIP between cars and products
    public function products(){
        return $this->belongsToMany(product::class);
    }
}
