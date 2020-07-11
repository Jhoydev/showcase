<?php
namespace App\Clients;

use App\Property;
use Illuminate\Support\Str;

class ClientFactory
{
    public static function make($referer)
    {
        $inmovilla = ['apinmo','inmovilla'];

        $class = "App\\Clients\\" . Str::studly($referer);

        if (Str::contains($referer,$inmovilla)){
            $class = "App\\Clients\\Inmovilla";
            $request_client = Property::where('id', request()->request_client_id)->first();
            return new $class($request_client->request);
        }

        if (!class_exists($class)) {
            throw new \Exception('Client not found');
        }

        return new $class;
    }
}
