<?php
namespace App\Clients;

use App\Client;
use App\Property;
use App\User;

class Inmovilla extends ClientContract
{
    use Skeleton;

    protected $fillable = [
        'cod_ofer',
        'ref',
        'tipomensual',
        'precio',
        'estadoficha',
        'precioalq',
        'nbtipo',
        'ciudad',
        'zona',
        'banyos',
        'habitaciones',
        'aseos',
        'planta',
        'm_parcela',
        'm_uties',
        'm_cons',
        'nbconservacion',
        'numagencia',
        'plaza_gara',
        'calle',
        'ascensor',
        'calefaccion',
        'electro',
        'arma_empo',
        'puerta_blin',
        'linea_tlf',
        'gastos_com',
        'acciones',
        'telefono_agente',
        'fotos'
    ];
    protected $data;

    public function getRequest($request)
    {
        $this->data = $request;
    }

    public function storeJson(Client $client, User $user)
    {
        if (!count($this->data)) {
            return false;
        }

        $this->mapOut($this->data, $user);
        Property::create([
            'data' => json_encode($this->property),
            'title' => $this->property->ref,
            'user_id' => $user->id
        ]);
    }

    protected function mapOut($data, User $user)
    {
        $data = $this->setDefaultValues($data);
        $this->cleanProperty();

        $this->property->property_id = $data->cod_ofer;
        $this->property->ref = $data->ref;
        $this->property->type_month_rent = $data->tipomensual;
        $this->property->price = $data->precio;
        $this->property->status = $data->estadoficha;
        $this->property->price_rent = $data->precioalq;
        $this->property->property_type = $data->nbtipo;
        $this->property->city = $data->ciudad;
        $this->property->zone = $data->zona;
        $this->property->bathroom = $data->banyos;
        $this->property->bedroom = $data->habitaciones;
        $this->property->restroom = $data->aseos;
        $this->property->floor = $data->planta;
        $this->property->m_plot = $data->m_parcela;
        $this->property->m_area = $data->m_uties;
        $this->property->m_const = $data->m_cons;
        $this->property->category_built = $data->nbconservacion;
        $this->property->id_agency = $data->numagencia;
        $this->property->parking = $data->plaza_gara;
        $this->property->address = $data->calle;
        $this->property->lift = $data->ascensor;
        $this->property->heating = $data->calefaccion;
        $this->property->appliances = $data->electro;
        $this->property->wardrove = $data->arma_empo;
        $this->property->reinforced_door = $data->puerta_blin;
        $this->property->phone_line = $data->linea_tlf;
        $this->property->cost_community = $data->gastos_com;
        $this->property->operation = $data->acciones;
        $this->property->agent_phone = $data->telefono_agente;
        $this->property->fotos = $this->fotos($data);
        $this->normalizer($user);
    }


    protected function fotos($data)
    {
        $fotos = [];
        foreach ($data as $key => $value){
            if (preg_match('/^foto[0-9]+/',$key)){
                $fotos[] = $value;
            }
        }
        return $fotos;
    }


}
