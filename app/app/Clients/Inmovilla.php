<?php
namespace App\Clients;

use App\RequestClient;

class Inmovilla extends Skeleton
{

    protected $data;

    public function __construct($data) {


        if (is_string($data)) {
            $data = json_decode($data);
        }
        $data = (object) $data;

        $this->data = $data;

        $this->property_id = $data->cod_ofer;
        $this->ref = $data->ref;
        $this->type_moth_rent = $data->tipomensual;
        $this->price = $data->precio;
        $this->status = $data->estadoficha;
        $this->price_rent = $data->precioalq;
        $this->property_type = $data->nbtipo;
        $this->city = $data->ciudad;
        $this->zone = $data->zona;
        $this->bathroom = $data->banyos;
        $this->bedroom = $data->habitaciones;
        $this->restroom = $data->aseos;
        $this->floor = $data->planta;
        $this->m_plot = $data->m_parcela;
        $this->m_area = $data->m_uties;
        $this->m_const = $data->m_cons;
        $this->category_built = $data->nbconservacion;

        $this->id_agency = $data->numagencia;
        $this->parking = $data->plaza_gara;
        $this->address = $data->calle;
        $this->lift = $data->ascensor;
        $this->heating = $data->calefaccion;
        $this->appliances = $data->electro;
        $this->wardrove = $data->arma_empo;
        $this->reinforced_door = $data->puerta_blin;
        $this->phone_line = $data->linea_tlf;
        $this->cost_community = $data->gastos_com;
        $this->operation = $data->acciones;

        $this->agent_phone = $data->telefono_agente;
        $this->fotos = $this->fotos();
        $this->normalizer();
    }

    private function fotos(){
        $fotos = [];
        foreach ($this->data as $key => $value){
            if (preg_match('/^foto[0-9]+/',$key)){
                $fotos[] = $value;
            }
        }
        return $fotos;
    }

    private function fakeData(){
        return '{

        }';
    }
}
