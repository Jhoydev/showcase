<?php

namespace App\Clients;

use App\Client;
use App\Clients\Skeleton;
use App\Imports\KyeroImport;
use App\Property;
use App\User;


class Kyero extends ClientContract
{
    use Skeleton;

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
        $json  = json_encode($xml);
        $xmlArr = json_decode($json);

        $this->data = $xmlArr;
    }

    public function storeJson(Client $client, User $user)
    {

        if (!count($this->data->property)) {
            return false;
        }

        foreach($this->data->property as $property){
            $this->mapOut($property, $user);
            $json = json_encode($this->property);
            Property::create([
                'data' => $json,
                'title' => $this->property->ref,
                'user_id' => $user->id
            ]);
        }

    }

    public function mapOut($data, User $user)
    {
        $data = $this->setDefaultValues($data);
        $this->cleanProperty();
        $this->property->property_id = $data->id;
        $this->property->ref = $data->ref;
        $this->property->price = $data->price;
        $this->property->city = $data->town;
        $this->property->property_type = $data->type;
        $this->property->zone = $data->location_detail;
        $this->property->operation = $data->price_freq;
        $this->property->bedroom = $data->beds;
        $this->property->bathroom = $data->baths;
        $this->property->fotos = $this->fotos($data);
        $this->normalizer($user);
    }

    protected function fotos($data)
    {
        $fotos = [];
        foreach ($data->images as $images) {
            foreach ($images as $url){
                $fotos[] = $url->url;
            }
        }
        return $fotos;
    }

}
