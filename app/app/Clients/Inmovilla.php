<?php
namespace App\Clients;

class Inmovilla
{

    public $data;

    public function __construct() {
        $data = request()->all();
        $this->data = json_decode($data);
    }

    public function get()
    {
        return $this->data;
    }
}