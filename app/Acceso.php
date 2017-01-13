<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acceso extends Model
{
    public $timestamps = false;
    protected $dateFormat = 'H:i:s';


    public function permiso() {
       return $this->belongsTo('App\Permiso');
    }

}
