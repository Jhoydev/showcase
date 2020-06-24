<?php
namespace App\Clients;

use App\RequestClient;
use Illuminate\Support\Str;

class ClientFactory
{
    public static function make($referer)
    {
        $inmovilla = ['apinmo','inmovilla'];
        $test = ['utilidades'];

        $class = null;

        if (Str::contains($referer,$inmovilla)){
            $class = "App\\Clients\\Inmovilla";
            $request_client = RequestClient::where('id', request()->request_client_id)->first();
            return new $class($request_client->request);
        }

        if (Str::contains($referer,$test)){
            $class = "App\\Clients\\Inmovilla";
        }

        if (!class_exists($class)) {
            throw new \Exception('Client not found');
        }

        return new $class;
    }
}
