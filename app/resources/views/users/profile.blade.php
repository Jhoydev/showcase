@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <form action="#" method="post">
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
                    <p>Api Key</p>
                    <div class="alert alert-info" role="alert">
                        {{ $user->api_key }}
                    </div>
                    <p>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Perferendis doloremque facilis consequatur dicta dignissimos repellat harum unde voluptas fugit earum? Voluptatum corporis animi qui quo recusandae nobis aspernatur consequuntur praesentium.
                    </p>
                    <button class="btn btn-success btn-block">Solicitar nueva Api key</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
