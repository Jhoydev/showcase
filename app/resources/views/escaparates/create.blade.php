@extends('layouts.app')

@section('content')
<div class="container create_escaparate">
    <div class="row mb-4">
        <div class="col-12">
            <h3>Elige un escaparate pendiente</h3>
        </div>
        <div class="col-12 d-flex">
            @foreach ($request_client as $item)
                <div class="card mr-3 request_client_card text-second pointer" data-request_client_id="{{ $item->id}}">
                    <div class="card-body py-2 px-4">Referencia: {{ $item->title}}</div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h3>Elige una plantilla</h3>
        </div>
        @foreach ($escaparates as $escaparate)
        <div class="col-md-3">
        <img class="img-thumbnail mb-5 pointer img-escaparate" src="{{ $escaparate->thumbnail }}" alt="{{ $escaparate->name }}" data-escaparate_id="{{ $escaparate->id}}">
        </div>
        @endforeach
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="confirm-showcase" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirma el escaparate</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body d-flex">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4 d-flex align-items-center justify-content-center">
                            <div class="card">
                                <div class="card-body py-2 px-4">
                                    <span id="request_client_selected"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8 d-flex align-items-center justify-content-center">
                            <img id="thumbnail_selected" class="img-thumbnail" src="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <form action="{{ route('showcase.previous') }}" method="POST">
                    <input type="hidden" id="request_client_id"  name="request_client_id">
                    <input type="hidden" id="escaparate_id"  name="escaparate_id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')

<script>
    let request_client_selected = null;
    var thumbnail_selected = null;

    $('.request_client_card').click((ev) => {
        $('.request_client_card').removeClass('selected');
        $(ev.currentTarget).addClass('selected');
        request_client_selected = $(ev.currentTarget).first('.card-body').html();
        $('#confirm-showcase #request_client_id').val($(ev.currentTarget).data('request_client_id'));
        showConfirmShowcase();
    });
    $('.img-escaparate').click((ev) => {
        $('.img-escaparate').removeClass('selected');
        $(ev.currentTarget).addClass('selected');
        thumbnail_selected = $(ev.currentTarget).first('img').prop('src');
        $('#confirm-showcase #escaparate_id').val($(ev.currentTarget).data('escaparate_id'));
        showConfirmShowcase();
    });

    function showConfirmShowcase()
    {
        if (request_client_selected && thumbnail_selected) {
            $('#request_client_selected').html(request_client_selected);
            $('#thumbnail_selected').prop('src',thumbnail_selected);
            $('#confirm-showcase').modal('show');
        }
    }
</script>

@endpush
