<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = 'orders';

    public function client()
    {
        return $this->hasMany('App\Clients');
    }
    public function service()
    {
        return $this->hasMany('App\Services');
    }
}
