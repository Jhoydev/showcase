<?php
namespace App\Clients;

use App\Client;
use App\Property;
use Illuminate\Support\Str;

class ClientFactory
{
    public static function make(Client $client)
    {
        $class = "App\\Clients\\" . Str::studly($client->name);

        if (!class_exists($class)) {
            throw new \Exception('Client not found');
        }

        return new $class;
    }
}
