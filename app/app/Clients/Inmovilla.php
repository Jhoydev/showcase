<?php
namespace App\Clients;

class Inmovilla
{

    public $data;

    public function __construct() {
        $data = request()->all();

        if (is_string($data)) {
            $data = json_decode($data);
        }
        $this->data = $data;
    }

    public function get()
    {
        return $this->data;
    }
}