<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stationary extends Model
{
    protected $table ='stationarys';

    protected $fillable = [
        'Name','Image'];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
