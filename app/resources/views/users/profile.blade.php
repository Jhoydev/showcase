@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>{{__('Perfil') }}</h1>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('profile.update', Auth::user()->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <div class="mb-3">
                                <img class="img-fluid" src="{{ url('upload/images/'.$user->logo) }}" alt="">
                            </div>
                            <label for="name">Logo</label>
                            <input type="file" name="logo" class="form-control-file">
                        </div>
                        <div class="form-group">
                          <label for="name">Nombre</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
                        </div>
                        <div class="form-group">
                          <label for="phone">Telefono</label>
                          <input type="text" name="phone" id="phone" class="form-control" value="{{ $user->phone }}">
                        </div>
                        <div class="form-group">
                          <label for="mobile">Movil</label>
                          <input type="text" name="mobile" id="mobile" class="form-control" value="{{ $user->mobile }}">
                        </div>
                        <div class="form-group">
                          <label for="address">Dirección</label>
                          <input type="text" name="address" id="address" class="form-control" value="{{ $user->address }}">
                        </div>
                        <div class="form-group">
                          <label for="cp">Código Postal</label>
                          <input type="text" name="cp" id="cp" class="form-control" value="{{ $user->cp }}">
                        </div>
                        <div class="form-group">
                            <label for="web">Web</label>
                            <input type="text" name="web" id="web" class="form-control" value="{{ $user->web }}">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success btn-block" type="submit">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h3>Api key</h3>
                    <img class="img-fluid px-5" src="/images/icons/key.svg" alt="">
                    <p>
                        Esta es tu clave de autenticación, usala para realizar peticiones hacia esta aplicación
                    </p>
                    <div class="alert alert-info" role="alert">
                        {{ $user->api_key }}
                    </div>

                    <form action="{{ route('profile.generateNewApiKey') }}" method="post">
                        @method('PUT')
                        @csrf
                    <button class="btn btn-success btn-block">Solicitar nueva Api key</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
