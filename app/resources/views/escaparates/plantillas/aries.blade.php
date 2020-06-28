<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escaparate horizontal </title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jomolhari&display=swap" rel="stylesheet">
    <style>
        *{
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }
        body{
            font-family: 'Roboto', sans-serif;
            color: #444;
            font-weight: 300;
        }
        .contenedor-escaparate{
            width: 29.7cm;
            height:  21cm;
            display: grid;
            grid-template-rows: .5fr minmax(0, 4fr) .5fr;
            grid-template-areas:    "head"
            "main"
            "foot";

        }
        header{
            grid-area: head;
            background-color: lightblue;
            display: grid;
            grid-template-columns: 2fr 1fr;
            grid-template-areas:    "cnt_logo cnt_main_label"
            "ctn_title cnt_main_label";
            background-image: url('{{ url('images/hero.jpg') }}');
            background-repeat: no-repeat;
            padding-left: 40px;
            background-size: cover;

        }
        #cnt_logo{
            grid-area: cnt_logo;
        }
        #cnt_logo img {
            width: 340px;
        }
        #cnt_main_label{
            grid-area: cnt_main_label;
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }
        .cnt_label{
            min-width: 60%;
            padding: 0 20px 0 50px;
        }
        #cnt_main_label .first_label{
            display: flex;
            align-items: center;
            justify-content: flex-end;
            color: navy;
            padding: 0 20px;
            font-size: 40px;
            font-weight: 700;
            height: 50px;
            background-color: #f9e006;
            position: relative;
        }
        .first_label:before{
            content: "";
            display: block;
            position: absolute;
            top: 0;
            width: 2px;
            height: 0px;
            left: -43px;
            border-bottom: 50px solid #f9e006;
            border-left: 43px solid transparent;
        }

        #cnt_main_label .second_label{

            color: white;
            font-size: 24px;
            display: flex;
            justify-content: space-around;
            align-items: center;
            height: 50px;
            background-color: cornflowerblue;
            position: relative;
        }
        .second_label:before{
            content: "";
            display: block;
            position: absolute;
            top: 0;
            width: 2px;
            height: 0px;
            left: -43px;
            border-top: 50px solid cornflowerblue;
            border-left: 43px solid transparent;
        }
        #ctn_title{
            grid-area: ctn_title;
            color: white;
            font-size: 64px;
            font-family: 'Roboto', sans-serif;
            font-weight: 900;
            line-height: 45px;
            text-transform: uppercase;
        }

        .cnt_icon{
            display: flex;
            justify-content: space-between;
        }
        .cnt_icon img{
            width: 24px;
            height: 24px;
            filter: invert(1);
            padding-left: 5px;
        }

        main{
            display: grid;
            grid-area: main;
            grid-template-rows: .5fr 1fr 1fr;
            grid-template-columns: .4fr .4fr 1fr;
            grid-template-areas:    "ctn_main_data ctn_main_data ctn_fotos"
            "ctn_caract . ctn_fotos"
            "ctn_calid ctn_cert ctn_fotos";

        }


        #ctn_main_data{
            grid-area: ctn_main_data;
            filter: drop-shadow(1px 2px 3px rgba(50, 50, 0, 0.2));
        }

        #ctn_data{
            padding: 20px 20px 5px 20px;
            background-color: whitesmoke;
            clip-path: polygon(0 0, 100% 0%, 75% 100%, 0% 100%);
        }

        .main_data{
            color: navy;
            font-size: 28px;;
        }
        .data_ref{
            font-size: 20px;
            color: gray;
        }


        #ctn_fotos{
            grid-area: ctn_fotos;
            display: grid;
            grid-template-rows: minmax(0,1fr) .5fr;
            grid-template-columns: 1fr 1fr;
            grid-template-areas:    "main_foto main_foto"
            "second_foto third_foto";
            grid-gap: 10px;
            padding-right: 20px;
            padding-bottom: 20px;
        }

        #ctn_fotos img{
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .main_foto{
            padding-top: 20px;
            grid-area: main_foto;
        }

        .main_foto img{
            height: 100%;
        }

        .second_foto{
            grid-area: second_foto;
        }
        .third_foto{
            grid-area: third_foto;
        }

        #ctn_caract{
            grid-area: ctn_caract;
            padding-left: 40px;
            margin-top: 20px;
            font-size: 20px;
        }

        #ctn_calid{
            grid-area: ctn_calid;
            padding-left: 40px;
            font-size: 20px;
        }

        .title_caract{
            color: #008cd1;
            font-weight: 400;
            font-size: 24px;
        }

        #ctn_cert{
            grid-area: ctn_cert;
            display: flex;
            justify-content: flex-end;
            padding: 20px;
            overflow: hidden;
        }
        #ctn_cert img {
            overflow: hidden;

            width: 100%;
        }
        footer{
            grid-area: foot;
            display: grid;
            grid-template-columns: 1fr 3fr 1fr;
            padding: 0 20px;
            font-family: 'Jomolhari', serif;

        }

        .telefono{
            position: relative;
            background-color: #f9e006;
            border-top-left-radius: 40px 40px;
            border-bottom-left-radius: 40px 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 900;
        }

        .telefono:after{
            color: navy;
            content: "";
            display: block;
            position: absolute;
            top: 0;
            width: 0px;
            height: 0px;

            right: -15px;
            border-top: 40px solid #f9e006;
            border-right: 15px solid transparent;
        }
        .telefono img{
            width: 18px;
            margin-right: 10px;
        }
        .direccion{
            border-top: 1px solid #ccc;
            border-bottom: 1px solid #ccc;
            display: flex;
            align-items: center;
            justify-content: center;
            height: fit-content;
            padding: 5px 0;
            margin-top: 5px;
            line-height: 18px;
        }
        .web{
            position: relative;
            background-color: navy;
            color: white;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .web:before{
            content: "";
            display: block;
            position: absolute;
            top: 0;
            width: 0px;
            height: 0px;
            left: -15px;
            border-top: 40px solid transparent ;
            border-right: 15px solid navy;
        }
    </style>
</head>
<body>
<div class="contenedor-escaparate">
    <header>
        <div id="cnt_logo">
        <img src="{{ url($data
        ->logo) }}" alt="">
        </div>
        <div id="ctn_title">

            {{ $data->property_type }} EN {{ $data->operation }}
        </div>
        <div id="cnt_main_label">
            <div class="cnt_label">
                <div class="first_label">{{ $data->price }} €</div>
                <div class="second_label">
                    @if ($data->bedroom)
                        <div class="cnt_icon">
                            {{ $data->bedroom }} <img src="/images/icons/bed.svg" alt="">
                        </div>
                    @endif
                    @if ($data->bathroom)
                        <div class="cnt_icon">
                            {{ $data->bathroom }} <img src="/images/icons/bathroom.svg" alt="">
                        </div>
                    @endif
                    @if ($data->parking)
                        <div class="cnt_icon">
                            {{ $data->parking }} <img src="/images/icons/parking.svg" alt="">
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </header>
    <main>
        <div id="ctn_main_data">
            <div id="ctn_data">
                <div class="main_data">{{ $data->address }}, {{ $data->zone }}, {{ $data->city }}</div>
                <div class="data_ref">REF: {{ $data->ref }}</div>
            </div>
        </div>
        <div id="ctn_fotos">
            <div class="main_foto">
                <img src="{{ $data->fotos[0] }}" alt="">
            </div>
            <div class="second_foto">
                <img src="{{ $data->fotos[1] }}" alt="">

            </div>
            <div class="third_foto">
                <img src="{{ $data->fotos[2] }}" alt="">
            </div>
        </div>
        <div id="ctn_caract">
            <p class="title_caract">Caracteristicas</p>
            {!! $data->m_const ? "<p>Mt Const: {$data->m_const}m<sup>2</sup></p>" : '' !!}
            {!! $data->m_area ? "<p>Superficie Útil: {$data->m_area}m<sup>2</sup></p>" : '' !!}
            {!! $data->floor ? "<p>Planta: {$data->floor}ª</p>" : '' !!}
            {!! $data->category_built ? "<p>Conservación: {$data->category_built}</p>" : '' !!}
            {!! $data->cost_community ? "<p>Comunidad: {$data->cost_community}€/MEN</p>" : '' !!}
        </div>
        <div id="ctn_calid">
            <p class="title_caract">Calidades:</p>
            {!! $data->lift ? "<p>Ascensor</p>" : '' !!}
            {!! $data->heating ? "<p>Calefacción</p>" : '' !!}
            {!! $data->appliances ? "<p>Electrodomésticos</p>" : '' !!}
            {!! $data->wardrove ? "<p>Armarios Empotrados</p>" : '' !!}
            {!! $data->reinforced_door ? "<p>Puerta Blindada</p>" : '' !!}
            {!! $data->phone_line ? "<p>Linea Telefónica</p>" : '' !!}
        </div>
        <div id="ctn_cert">
            <img src="https://www.certificadosbaratos.es/img/icons/sin-riesgo.png" alt="">
        </div>
    </main>

    <footer>
        <div class="telefono"><img src="/images/phone.svg" alt="">{{ $data->agent_phone }}</div>
        <div class="direccion">{{$data->address_agency}}</div>
        <div class="web">{{ $data->web }}</div>
    </footer>

</div>
</body>
</html>
