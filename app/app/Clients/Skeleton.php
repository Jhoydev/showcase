<?php
namespace App\Clients;

use Illuminate\Support\Facades\Auth;

class Skeleton
{
    public $property_id;
    public $ref;
    public $type_moth_rent;
    public $price;
    public $status;
    public $price_rent;
    public $property_type;
    public $city;
    public $zone;
    public $address;
    public $bathroom;
    public $bedroom;
    public $restroom;
    public $floor;
    public $m_plot;
    public $m_area;
    public $m_const;
    public $id_agency;
    public $fotos;
    public $parking;
    public $agent_phone;
    public $lift;
    public $heating;
    public $appliances;
    public $wardrove;
    public $reinforced_door;
    public $phone_line;
    public $cost_community;
    public $category_built;
    public $operation;
    public $web;
    public $address_agency;
    public $logo;



    protected function normalizer()
    {
        $this->address = $this->address ?: 'Sin Calle';
        $this->price = $this->price ?: 'A consultar';
        $this->operation = ($this->operation == 'Vender') ? 'Venta' : $this->operation;
        if (Auth::user()) {
            $this->web = $this->web ?: Auth::user()->web;
            $this->logo = $this->logo ?: Auth::user()->logo;
            $this->address_agency = $this->address_agency ?: Auth::user()->address;
        }
    }
}
