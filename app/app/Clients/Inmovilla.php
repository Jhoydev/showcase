<?php
namespace App\Clients;

class Inmovilla extends Skeleton
{

    public $data;

    public function __construct() {

        $data = request()->all();
        $data = $this->fakeData();
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
        $this->id_agency = $data->numagencia;
        $this->parking = $data->plaza_gara;
        $this->address = $data->calle;
        $this->agent_phone = $data->telefono_agente;
        $this->fotos = $this->fotos();

    }

    public function get()
    {
        return $this->data;
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
          "solicitadopor": "98076",
          "cod_ofer": "10080949",
          "acciones": "Vender",
          "ref": "181",
          "numfotos": "29",
          "fotoletra": "1",
          "latitud": "41.1603111",
          "altitud": "1.0729818",
          "tipomensual": "MES",
          "precio": "135000",
          "estadoficha": "1",
          "precioalq": "0",
          "nbtipo": "Piso",
          "ciudad": "Reus",
          "zona": "Mestral",
          "ciudad2": "Reus - Mestral",
          "nbconservacion": "Ninguno",
          "comunidadincluida": "0",
          "gastos_com": "0",
          "tgascom": "",
          "nborientacion": "",
          "banyos": "1",
          "aseos": "0",
          "planta": "0",
          "energialetra": "tramites",
          "energiarecibido": "0",
          "emisionesletra": "G",
          "energiavalor": "0",
          "emisionesvalor": "0",
          "m_parcela": "0",
          "m_uties": "68",
          "m_cons": "131",
          "jardin": "1",
          "m_terraza": "0",
          "antiguedad": "1970",
          "habitaciones": "4",
          "numagencia": "6827",
          "numplanta": "0",
          "keyacci": "1",
          "balcon": "0",
          "plaza_gara": "0",
          "patio": "0",
          "linea_tlf": "0",
          "solarium": "0",
          "terraza": "1",
          "ascensor": "0",
          "arma_empo": "0",
          "montacargas": "0",
          "trastero": "0",
          "puerta_blin": "0",
          "electro": "0",
          "muebles": "0",
          "calefaccion": "1",
          "aire_con": "0",
          "video_port": "0",
          "primera_line": "0",
          "piscina_com": "0",
          "piscina_prop": "0",
          "luz": "0",
          "agua": "0",
          "gasciudad": "0",
          "hilomusical": "0",
          "trifasica": "0",
          "cajafuerte": "0",
          "chimenea": "0",
          "barbacoa": "1",
          "apartseparado": "0",
          "alarma": "0",
          "bar": "0",
          "buardilla": "0",
          "depoagua": "0",
          "diafano": "0",
          "galeria": "0",
          "habjuegos": "0",
          "gimnasio": "0",
          "jacuzzi": "0",
          "mirador": "0",
          "ojobuey": "0",
          "parking": "0",
          "pergola": "0",
          "puertasauto": "0",
          "riegoauto": "0",
          "aconsultar": "0",
          "satelite": "0",
          "sauna": "0",
          "todoext": "0",
          "tv": "0",
          "vallado": "0",
          "vestuarios": "0",
          "distmar": "0",
          "estadofichatxt": "Libre",
          "vado": "0",
          "vistas": "",
          "keycalefa": "0",
          "conservacion": "0",
          "keyori": "0",
          "keyfachada": "0",
          "keyvista": "0",
          "calle": "",
          "numero": "",
          "keycarpin": "0",
          "keycarpinext": "0",
          "cocina_inde": "0",
          "keysuelo": "0",
          "key_tipo": "3399",
          "keyagente": "0",
          "telefono_agente": "910149625",
          "nombre_agente": "Lourdes Machuca",
          "email_agente": "info@artyconsultores.com",
          "foto1": "https://fotos15.apinmo.com/6827/10080949/1-1.jpg",
          "foto2": "https://fotos15.apinmo.com/6827/10080949/1-2.jpg",
          "foto3": "https://fotos15.apinmo.com/6827/10080949/1-3.jpg",
          "foto4": "https://fotos15.apinmo.com/6827/10080949/1-4.jpg",
          "foto5": "https://fotos15.apinmo.com/6827/10080949/1-5.jpg",
          "foto6": "https://fotos15.apinmo.com/6827/10080949/1-6.jpg",
          "foto7": "https://fotos15.apinmo.com/6827/10080949/1-7.jpg",
          "foto8": "https://fotos15.apinmo.com/6827/10080949/1-8.jpg",
          "foto9": "https://fotos15.apinmo.com/6827/10080949/1-9.jpg",
          "foto10": "https://fotos15.apinmo.com/6827/10080949/1-10.jpg",
          "foto11": "https://fotos15.apinmo.com/6827/10080949/1-11.jpg",
          "foto12": "https://fotos15.apinmo.com/6827/10080949/1-12.jpg",
          "foto13": "https://fotos15.apinmo.com/6827/10080949/1-13.jpg",
          "foto14": "https://fotos15.apinmo.com/6827/10080949/1-14.jpg",
          "foto15": "https://fotos15.apinmo.com/6827/10080949/1-15.jpg",
          "foto16": "https://fotos15.apinmo.com/6827/10080949/1-16.jpg",
          "foto17": "https://fotos15.apinmo.com/6827/10080949/1-17.jpg",
          "foto18": "https://fotos15.apinmo.com/6827/10080949/1-18.jpg",
          "foto19": "https://fotos15.apinmo.com/6827/10080949/1-19.jpg",
          "foto20": "https://fotos15.apinmo.com/6827/10080949/1-20.jpg",
          "foto21": "https://fotos15.apinmo.com/6827/10080949/1-21.jpg",
          "foto22": "https://fotos15.apinmo.com/6827/10080949/1-22.jpg",
          "foto23": "https://fotos15.apinmo.com/6827/10080949/1-23.jpg",
          "foto24": "https://fotos15.apinmo.com/6827/10080949/1-24.jpg",
          "foto25": "https://fotos15.apinmo.com/6827/10080949/1-25.jpg",
          "foto26": "https://fotos15.apinmo.com/6827/10080949/1-26.jpg",
          "foto27": "https://fotos15.apinmo.com/6827/10080949/1-27.jpg",
          "foto28": "https://fotos15.apinmo.com/6827/10080949/1-28.jpg",
          "foto29": "https://fotos15.apinmo.com/6827/10080949/1-29.jpg",
          "fotoagente": "https://fotos15.apinmo.com/6827/usuarios/0.jpg",
          "titulo_Castellano": "",
          "texto_Castellano": "Bonita casa (esquinera) de 60 m2 (todo planta baja), situada en Urb. Pelayo.  y mas de 100 m2 de jardín.  \r\n\r\nLa vivienda se compone de:\r\n- Salón comedor amplio y muy luminoso\r\n- 2 habitaciones\r\n- 1 baño completo con ducha\r\n- Cocina amueblada con salida al jardín\r\n\r\nEquipada con un aire acondicionado en el comedor y calefacción de gasoil en toda la casa.  \r\n\r\nA la parte trasera de la casa nos encontramos con un porche para disfrutar del sol en los días de invierno y de una ambiente muy agradable las noches de verano, barbacoa, pozo de agua y cuarto trastero donde se encuentra la caldera y el depósito de gasoil.\r\n\r\nSe puede entrar a vivir sin necesidad de hacer obras, en todo caso si se quisiera hacer ampliación de la casa no habría ningún inconveniente.\r\n\r\nLa zona es muy tranquila y muy cómoda para desplazarse sin tener que atravesar la ciudad.  Muy bien comunicada con el transporte público (autobús).\r\n\r\nNO DUDES MAS Y VEN A VERNOS!!!\r\n\r\nTe ayudamos a buscar la financiación que mas se ajuste a tus necesidades, pregúntanos como.  Estamos a tu lado hasta llegar al notario. Somos tu agencia de referencia.\r\n\r\nSíguenos en twitter para estar al día de toda la información inmobiliaria, para comprar, vender o alquilar tu inmueble.",
          "titulo_Ingles": "",
          "texto_Ingles": "Bonita casa (esquinera) de 60 m2 (todo planta baja), situada en Urb. Pelayo.  y mas de 100 m2 de jardín.  \r\n\r\nLa vivienda se compone de:\r\n- Salón comedor amplio y muy luminoso\r\n- 2 habitaciones\r\n- 1 baño completo con ducha\r\n- Cocina amueblada con salida al jardín\r\n\r\nEquipada con un aire acondicionado en el comedor y calefacción de gasoil en toda la casa.  \r\n\r\nA la parte trasera de la casa nos encontramos con un porche para disfrutar del sol en los días de invierno y de una ambiente muy agradable las noches de verano, barbacoa, pozo de agua y cuarto trastero donde se encuentra la caldera y el depósito de gasoil.\r\n\r\nSe puede entrar a vivir sin necesidad de hacer obras, en todo caso si se quisiera hacer ampliación de la casa no habría ningún inconveniente.\r\n\r\nLa zona es muy tranquila y muy cómoda para desplazarse sin tener que atravesar la ciudad.  Muy bien comunicada con el transporte público (autobús).\r\n\r\nNO DUDES MAS Y VEN A VERNOS!!!\r\n\r\nTe ayudamos a buscar la financiación que mas se ajuste a tus necesidades, pregúntanos como.  Estamos a tu lado hasta llegar al notario. Somos tu agencia de referencia.\r\n\r\nSíguenos en twitter para estar al día de toda la información inmobiliaria, para comprar, vender o alquilar tu inmueble.",
          "titulo_Aleman": "",
          "texto_Aleman": "Bonita casa (esquinera) de 60 m2 (todo planta baja), situada en Urb. Pelayo.  y mas de 100 m2 de jardín.  \r\n\r\nLa vivienda se compone de:\r\n- Salón comedor amplio y muy luminoso\r\n- 2 habitaciones\r\n- 1 baño completo con ducha\r\n- Cocina amueblada con salida al jardín\r\n\r\nEquipada con un aire acondicionado en el comedor y calefacción de gasoil en toda la casa.  \r\n\r\nA la parte trasera de la casa nos encontramos con un porche para disfrutar del sol en los días de invierno y de una ambiente muy agradable las noches de verano, barbacoa, pozo de agua y cuarto trastero donde se encuentra la caldera y el depósito de gasoil.\r\n\r\nSe puede entrar a vivir sin necesidad de hacer obras, en todo caso si se quisiera hacer ampliación de la casa no habría ningún inconveniente.\r\n\r\nLa zona es muy tranquila y muy cómoda para desplazarse sin tener que atravesar la ciudad.  Muy bien comunicada con el transporte público (autobús).\r\n\r\nNO DUDES MAS Y VEN A VERNOS!!!\r\n\r\nTe ayudamos a buscar la financiación que mas se ajuste a tus necesidades, pregúntanos como.  Estamos a tu lado hasta llegar al notario. Somos tu agencia de referencia.\r\n\r\nSíguenos en twitter para estar al día de toda la información inmobiliaria, para comprar, vender o alquilar tu inmueble.",
          "titulo_Frances": "",
          "texto_Frances": "Bonita casa (esquinera) de 60 m2 (todo planta baja), situada en Urb. Pelayo.  y mas de 100 m2 de jardín.  \r\n\r\nLa vivienda se compone de:\r\n- Salón comedor amplio y muy luminoso\r\n- 2 habitaciones\r\n- 1 baño completo con ducha\r\n- Cocina amueblada con salida al jardín\r\n\r\nEquipada con un aire acondicionado en el comedor y calefacción de gasoil en toda la casa.  \r\n\r\nA la parte trasera de la casa nos encontramos con un porche para disfrutar del sol en los días de invierno y de una ambiente muy agradable las noches de verano, barbacoa, pozo de agua y cuarto trastero donde se encuentra la caldera y el depósito de gasoil.\r\n\r\nSe puede entrar a vivir sin necesidad de hacer obras, en todo caso si se quisiera hacer ampliación de la casa no habría ningún inconveniente.\r\n\r\nLa zona es muy tranquila y muy cómoda para desplazarse sin tener que atravesar la ciudad.  Muy bien comunicada con el transporte público (autobús).\r\n\r\nNO DUDES MAS Y VEN A VERNOS!!!\r\n\r\nTe ayudamos a buscar la financiación que mas se ajuste a tus necesidades, pregúntanos como.  Estamos a tu lado hasta llegar al notario. Somos tu agencia de referencia.\r\n\r\nSíguenos en twitter para estar al día de toda la información inmobiliaria, para comprar, vender o alquilar tu inmueble.",
          "titulo_Catalan": "",
          "texto_Catalan": "Bonita casa (esquinera) de 60 m2 (todo planta baja), situada en Urb. Pelayo.  y mas de 100 m2 de jardín.  \r\n\r\nLa vivienda se compone de:\r\n- Salón comedor amplio y muy luminoso\r\n- 2 habitaciones\r\n- 1 baño completo con ducha\r\n- Cocina amueblada con salida al jardín\r\n\r\nEquipada con un aire acondicionado en el comedor y calefacción de gasoil en toda la casa.  \r\n\r\nA la parte trasera de la casa nos encontramos con un porche para disfrutar del sol en los días de invierno y de una ambiente muy agradable las noches de verano, barbacoa, pozo de agua y cuarto trastero donde se encuentra la caldera y el depósito de gasoil.\r\n\r\nSe puede entrar a vivir sin necesidad de hacer obras, en todo caso si se quisiera hacer ampliación de la casa no habría ningún inconveniente.\r\n\r\nLa zona es muy tranquila y muy cómoda para desplazarse sin tener que atravesar la ciudad.  Muy bien comunicada con el transporte público (autobús).\r\n\r\nNO DUDES MAS Y VEN A VERNOS!!!\r\n\r\nTe ayudamos a buscar la financiación que mas se ajuste a tus necesidades, pregúntanos como.  Estamos a tu lado hasta llegar al notario. Somos tu agencia de referencia.\r\n\r\nSíguenos en twitter para estar al día de toda la información inmobiliaria, para comprar, vender o alquilar tu inmueble.",
          "titulo_Italiano": "",
          "texto_Italiano": "Bonita casa (esquinera) de 60 m2 (todo planta baja), situada en Urb. Pelayo.  y mas de 100 m2 de jardín.  \r\n\r\nLa vivienda se compone de:\r\n- Salón comedor amplio y muy luminoso\r\n- 2 habitaciones\r\n- 1 baño completo con ducha\r\n- Cocina amueblada con salida al jardín\r\n\r\nEquipada con un aire acondicionado en el comedor y calefacción de gasoil en toda la casa.  \r\n\r\nA la parte trasera de la casa nos encontramos con un porche para disfrutar del sol en los días de invierno y de una ambiente muy agradable las noches de verano, barbacoa, pozo de agua y cuarto trastero donde se encuentra la caldera y el depósito de gasoil.\r\n\r\nSe puede entrar a vivir sin necesidad de hacer obras, en todo caso si se quisiera hacer ampliación de la casa no habría ningún inconveniente.\r\n\r\nLa zona es muy tranquila y muy cómoda para desplazarse sin tener que atravesar la ciudad.  Muy bien comunicada con el transporte público (autobús).\r\n\r\nNO DUDES MAS Y VEN A VERNOS!!!\r\n\r\nTe ayudamos a buscar la financiación que mas se ajuste a tus necesidades, pregúntanos como.  Estamos a tu lado hasta llegar al notario. Somos tu agencia de referencia.\r\n\r\nSíguenos en twitter para estar al día de toda la información inmobiliaria, para comprar, vender o alquilar tu inmueble."
        }';
    }
}