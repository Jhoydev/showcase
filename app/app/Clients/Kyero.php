<?php

namespace App\Clients;

use App\Clients\Skeleton;
use App\Imports\KyeroImport;
use Orchestra\Parser\Xml\Facade as XmlParser;


class Kyero extends Skeleton
{

    protected $fillable = [
        'ref'
    ];

    public function __construct()
    {

        $xml = XmlParser::load(storage_path('kyero.xml'));
        $data = $xml->parse([
            'properties' => [
                'uses' => 'property[id,ref]'
            ]
        ]);
        $this->ref = 13;
    }

    private function fotos($data)
    {
        $fotos = [];
        foreach ($data as $key => $value) {
            if (preg_match('/^foto[0-9]+/', $key)) {
                $fotos[] = $value;
            }
        }
        return $fotos;
    }

    private function setDefaultValues($data)
    {
        foreach ($this->fillable as $field) {
            if (!isset($data->$field)) {
                $data->{$field} = '';
                $data->$field = $data->$field ?: '';
            }
        }
        return $data;
    }
}
