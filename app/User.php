<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function roles(){
        return $this->belongsToMany('App\Role','user_roles','user_id','role_id');

    }
    /**
     * Проверка принадлежности пользователя к определенной роли
     * @return boolean
    */
    public function isEmployee(){
        $roles =$this->toArray();
        return !empty($roles);
    }
    /**
     * Получение идентификатора рроли
     * @return int
     */
    public function getIdInArray($array, $term){
      foreach ( $array as $key=>$value ){
          if($value == $term){
              return $key + 1;
          }
      }
      return false;
    }

    /**
     * Добавление роли пользователю
     * @return boolean
     */
    public function makeEmployee($title){
        $assigned_roles = array();
        $roles = array_fetch(Role::all()->toArray(),'name');
        switch ($title){
            case 'admin':
                $assigned_roles[] = $this->getIdInArray($roles,'admin');
            case 'client':
                $assigned_roles[] = $this->getIdInArray($roles,'client');
                break;
            default:
                $assigned_roles[] = false;
        }
        $this->roles()->attach($assigned_roles);
    }
}
