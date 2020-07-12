@extends('layouts.app')

@section('content')
<div class="container create_escaparate">
    <div class="row mb-4 d-flex justify-content-center">
        <div class="col-12 mb-3">
            <h3 class="text-center">Elige una propiedad</h3>
            <hr class="border border-primary">
        </div>
        @foreach ($request_client as $item)
        <div class="d-flex mb-3">
            <div class="card mr-3 request_client_card text-second pointer" data-request_client_id="{{ $item->id}}">
                <div class="card-body py-2 px-4"><span class="text-muted">Referencia:</span> {{ $item->title}}</div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-12 mb-3">
            <h3 class="text-center">Elige una plantilla</h3>
            <hr class="border border-primary">
        </div>
        @foreach ($escaparates as $escaparate)
        <div class="col-md-3">
            <h5 class="text-capitalize text-center">{{$escaparate->name }}</h5>
            <img class="img-thumbnail mb-5 pointer img-escaparate" src="{{ $escaparate->thumbnail }}"
                alt="{{ $escaparate->name }}" data-escaparate_id="{{ $escaparate->id}}">
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
                    <input type="hidden" id="request_client_id" name="request_client_id">
                    <input type="hidden" id="escaparate_id" name="escaparate_id">
                    <button type="button" class="btn btn-light border" data-dismiss="modal">Cancelar</button>
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

    $('#form_upload_file').submit((e) => {
        e.preventDefault();

        var fd = new FormData(e.target);
        var files = $('#file')[0].files[0];
        var url = e.target.action;

        fd.append('_token',$('meta[name="csrf-token"]').attr('content'));
        $.ajax({
            url: url,
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){
                let html = '';
                response.property.forEach(element => {
                    html += `<div class="col-md-2">
                                <div class="card">
                                    <div class="card-body">
                                        Referencia: ${element.ref}
                                    </div>
                                </div>
                            </div>`
                });
                $('#content_response_upload>.row').html(html);
            },
        });
    });

    function showConfirmShowcase()
    {
        if (request_client_selected && thumbnail_selected) {
            $('#request_client_selected').html(request_client_selected);
            $('#thumbnail_selected').prop('src',thumbnail_selected);
            $('#confirm-showcase').modal('show');
        }
    }


    function fileValidation(input)
    {
        filevalidationSize(input);
        fileValidateExtension(input);
    }



    function filevalidationSize(input)
    {
        const fi = input;


        // Check if any file is selected.
        if (fi.files.length > 0) {
            for (const i = 0; i <= fi.files.length - 1; i++) {
                const fsize=fi.files.item(i).size;
                const file=Math.round((fsize / 1024));
                // The size of the file.
                if (file>= 100){
                    alert("File too Big, please select a file less than 100KB");
                    return false;
                } else if (file < 2) {
                    alert( "File too small, please select a file greater than 2KB" );
                    return false;
                }
            }
        }
    }


    function fileValidateExtension(input){

        var fileInput = input;
        var filePath = fileInput.value;
        // Allowing file type
        var allowedExtensions = /(\.xml)$/i;
        if (!allowedExtensions.exec(filePath)) {
            alert('Invalid file type');
            fileInput.value = '';
            return false;
        }
    }

</script>

@endpush
