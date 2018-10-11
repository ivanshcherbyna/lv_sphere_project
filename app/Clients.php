<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clients extends Model
{
    protected $table = 'clients';
    public function order()
    {
        return $this->belongsTo('App\Orders');
    }
    public function service()
    {
        return $this->belongsTo('App\Services');
    }
   // public static $timestamps = false;// этот метод убирает заполнение двух полей
   // phconst CREATED_AT = 'creation_date';
   // phconst UPDATED_AT = 'last_update';
    //protected $dateFormat = 'U';

}
