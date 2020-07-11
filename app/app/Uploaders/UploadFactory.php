<?php

namespace App\Uploaders;

use App\Client;
use Illuminate\Support\Str;

class UploadFactory
{
    public static function make(Client $client)
    {
        $class = "App\\Uploaders\\" . Str::studly($client->name);

        if (!class_exists($class)) {
            throw new \Exception('Client not found');
        }

        return new $class;
    }
}
