@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <h1 class="text-center">ESCAPARATES</h1>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="d-flex align-items-center p-2" style="height: 150px">
                        <img src="{{ url('/images/clients/inmovilla.png') }}" class="card-img-top" alt="inmovilla">
                    </div>
                    <div class="card-body d-flex align-items-center flex-column">
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary btn-sm">Leer más</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="d-flex align-items-center p-2" style="height: 150px">
                        <img src="{{ url('/images/clients/kyero.svg') }}" class="card-img-top" alt="inmovilla">
                    </div>
                    <div class="card-body d-flex align-items-center flex-column">
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda dolorem quod sed? Ea harum nam odio officiis quod tempore vel veniam. Adipisci at doloremque fugit hic modi molestias nesciunt nulla!</p>
                        <a href="#" class="btn btn-primary btn-sm">Leer más</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="card">
                    <div class="d-flex align-items-center p-2" style="height: 150px">
                        <img src="{{ url('/images/clients/excel.svg') }}" class="card-img-top" alt="inmovilla" style="height: 100%">
                    </div>
                    <div class="card-body d-flex align-items-center flex-column">
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda dolorem quod sed? Ea harum nam odio officiis quod tempore vel veniam. Adipisci at doloremque fugit hic modi molestias nesciunt nulla!</p>
                        <a href="#" class="btn btn-primary btn-sm">Leer más</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
