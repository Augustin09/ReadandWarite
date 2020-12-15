<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    protected $fillable = [
    'Name', 'stationary_id','Stock', 'Price', 'Description', 'Image',
    ];



    public function stationary(){
        return $this->hasMany('App\Stationary');
    }

    public function transaction()
    {
        return $this->belongsTo('App\transaction');
    }

}
