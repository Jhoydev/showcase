@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col-12">
            <h3>Elige un escaparate pendiente</h3>
        </div>
        <div class="col-12 d-flex">
            @foreach ($request_client as $item)
                <div class="card mr-3">
                    <div class="card-body pointer">
                        Ref: {{ $item->title}}
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h3>Elige una plantilla
            </h3>
        </div>
        @foreach ($escaparates as $escaparate)
        <div class="col-md-6">
            <img class="img-thumbnail mb-5 pointer" src="{{ $escaparate->thumbnail }}" alt="" data-toggle="modal" data-target="#exampleModal">
        </div>
        @endforeach
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection
