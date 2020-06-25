<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function request_client()
    {
        return $this->hasMany('App\RequestClient');
    }
}
