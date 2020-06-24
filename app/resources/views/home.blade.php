@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul>
                        @foreach($request_client as $req)
                    <li>
                        {{ $req->title }} - {{ $req->client->name }}
                        <form method="POST" action="{{ url('escaparates/1') }}">
                        <input type="hidden" name="request_client_id" value="{{ $req->id }}">
                            <button type="submit">Genera</button>
                        </form>
                    </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
