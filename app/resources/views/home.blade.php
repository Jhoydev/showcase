@extends('layouts.app')

@section('content')
<div class="container">
    @include('components.alert')
    <div class="row">
        @foreach ($clients as $client)
        @php($request_client_count = Auth::user()->request_client()->where('client_id',$client->id)->get()->count())
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center p-2" style="height: 150px">
                        <img src="{{ $client->logo }}" class="card-img-top" alt="inmovilla">
                    </div>
                    <div>
                        <a href="{{ url("/escaparates/create/".$client->id) }}" class="btn btn-primary btn-block">
                            Escaparates
                            @if($request_client_count)
                            <span class="pull-right badge badge-danger">{{ $request_client_count }}</span>
                            @endif
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
