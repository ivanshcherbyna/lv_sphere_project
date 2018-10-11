<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    protected $table ='services';

    public function order()
    {
        return $this->belongsTo('App\Orders','id');

    }
    public function client()
    {
        return $this->belongsTo('App\Clients','id');

    }
}
