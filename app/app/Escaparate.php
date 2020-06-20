<?php

namespace App;

use App\Clients\ClientFactory;
use Illuminate\Database\Eloquent\Model;

class Escaparate extends Model
{
    public static function make($referer){
        if ($referer) {
            return ClientFactory::make($referer);
        }
    }
}
