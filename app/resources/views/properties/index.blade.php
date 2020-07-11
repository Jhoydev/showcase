@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            @foreach($clients as $client)
            <div class="col-md-4 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-center p-2">
                            <img src="{{ url($client->logo) }}" class="card-img-top" alt="inmovilla" style="height: 100px">
                        </div>
                        <form>
                            <div class="form-group">
                                <span class="badge badge-success">{{ strtoupper($client->format) }}</span>
                            </div>
                            @if ($client->format == 'post')
                                <div class="form-group">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Amet at corporis deserunt dicta, dignissimos et ex illo itaque mollitia non numquam porro provident quam sit temporibus. Alias commodi cumque mollitia?</p>
                                </div>
                            @elseif ($client->format == 'xml')
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Example file input</label>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1">
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-success btn-block" type="submit">Cargar fichero</button>
                                </div>
                            @endif
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
@endsection

