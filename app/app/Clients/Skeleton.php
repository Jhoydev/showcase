<?php
namespace App\Clients;

use App\User;
use Illuminate\Support\Facades\Auth;

/**
 * Trait Skeleton
 * @package App\Clients
 */
trait Skeleton
{
    public $property;

    public function __construct() {
        $this->cleanProperty();
    }

    /**
     * @param $data
     * @return mixed
     */
    protected function setDefaultValues($data)
    {
        $data = (object) $data;
        foreach ($this->fillable as $field) {
            if (!isset($data->$field)) {
                $data->{$field} = '';
                $data->$field = $data->$field ?: '';
            }
        }
        return $data;
    }

    protected function cleanProperty()
    {
        $this->property = [
            'property_id' => null,
            'ref' => null,
            'type_month_rent' => null,
            'price' => null,
            'status' => null,
            'price_rent' => null,
            'property_type' => null,
            'city' => null,
            'zone' => null,
            'address' => null,
            'bathroom' => null,
            'bedroom' => null,
            'restroom' => null,
            'floor' => null,
            'm_plot' => null,
            'm_area' => null,
            'm_const' => null,
            'id_agency' => null,
            'fotos' => null,
            'parking' => null,
            'agent_phone' => null,
            'lift' => null,
            'heating' => null,
            'appliances' => null,
            'wardrove' => null,
            'reinforced_door' => null,
            'phone_line' => null,
            'cost_community' => null,
            'category_built' => null,
            'operation' => null,
            'web' => null,
            'address_agency' => null,
            'logo' => null
        ];
        $this->property = (object) $this->property;
    }

    public function get()
    {
        $data = [];
        foreach ($this->fillable as $key){
            $data[$key] = $this->{$key};
        }
        return $data;
    }

    protected function normalizer(User $user)
    {
        $this->property->city = $this->property->city ?: '';
        $this->property->address = $this->property->address ?: 'Sin Calle';
        $this->property->price = number_format($this->property->price,0,',','.') ?: 'A consultar';
        $this->property->operation = (in_array(strtolower($this->property->operation),['vender','sale'])) ? 'Venta' : $this->property->operation;
        if ($user) {
            $this->property->web = $this->property->web ?: $user->web;
            $this->property->logo = $this->property->logo ?: url('upload/images/' . $user->logo);
            $this->property->agent_phone = $this->property->agent_phone ?: $user->phone;
            $this->property->address_agency = $this->property->address_agency ?: $user->address;
        }
    }
}
