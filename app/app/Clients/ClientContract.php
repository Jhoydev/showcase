<?php

namespace App\Clients;


use App\Client;
use App\User;

abstract class ClientContract
{
    abstract public function storeJson(Client $client, User $user);
    abstract protected function mapOut($data, User $user);
    abstract protected function fotos($data);
}
