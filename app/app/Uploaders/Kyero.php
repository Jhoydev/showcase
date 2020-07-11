<?php

namespace App\Uploaders;

use App\Client;
use App\Clients\Skeleton;
use App\Property;
use App\User;
use Illuminate\Http\Request;
use Orchestra\Parser\Xml\Facade as XmlParser;

class Kyero extends Skeleton
{
    protected $data;

    protected $fillable = [
        'id',
        'ref',
        'price',
        'price_freq',
        'type',
        'town',
        'location_detail',
        'beds',
        'baths',
        'pool',
        'built',
        'plot',
        'lift',
        'heating',
        'address_agency'
    ];

    public function uploadXML($file)
    {
        $xml = simplexml_load_file($file);

        //convert into json
        $json  = json_encode($xml);

        //convert into associative array
        $xmlArr = json_decode($json);

        $this->data = $xmlArr;
    }

    public function get()
    {
        return $this->data;
    }

    public function storeJson(Client $client, User $user)
    {

        if (!count($this->data->property)) {
            return false;
        }

        $data = $this->data;

        foreach($data->property as $property){
            Property::create([
                'request' => json_encode($property),
                'title' => $property->ref,
                'client_id' => $client->id,
                'user_id' => $user->id
            ]);
        }

    }

    public function mapOut()
    {
        $data = $this->data;
        $data = $this->setDefaultValues($data);

        $this->property_id = $data->id;
        $this->ref = $data->ref;
        $this->price = $data->price;
        $this->city = $data->town;
        $this->zone = $data->location_detail;
        $this->bedroom = $data->beds;
        $this->bathroom = $data->baths;
        $this->fotos = $this->fotos($data);
    }

    private function fotos($data)
    {
        $fotos = [];
        foreach ($data->images as $key => $value) {
            if (preg_match('/^foto[0-9]+/', $key)) {
                $fotos[] = $value;
            }
        }
        return $fotos;
    }

}
