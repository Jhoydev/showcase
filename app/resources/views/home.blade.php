@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center p-2">
                        <img src="{{ url('/images/icons/creative.svg') }}" class="card-img-top" alt="inmovilla" style="height: 150px">
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ url('/escaparates/create') }}" class="btn btn-primary btn-block">
                        Generar Escaparate
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center p-2" style="">
                        <img src="{{ url('/images/icons/property.svg') }}" class="card-img-top" alt="inmovilla" style="height: 150px">
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ url('properties') }}" class="btn btn-primary btn-block">
                        Agregar Propiedades
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
