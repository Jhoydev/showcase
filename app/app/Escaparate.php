<?php

namespace App;

use App\Clients\ClientFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Escaparate
 * @package App
 */
class Escaparate extends Model
{
    /**
     * @param $referer
     * @return mixed
     */
    public static function make($referer)
    {
        if ($referer) {
            return ClientFactory::make($referer);
        }
    }

    public function view()
    {
        return 'escaparates.plantillas.' . $this->slug;
    }
}
