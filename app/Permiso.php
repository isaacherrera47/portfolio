<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permiso extends Model
{
    public $timestamps = false;
    protected $dateFormat = 'H:i:s';
    public function accesos() {
        return $this->hasMany('App\Acceso')->orderBy('fecha','desc');
    }

}
