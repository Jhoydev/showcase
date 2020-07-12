@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-4 col-md-6 mb-3">
                <h3>Propiedades</h3>
                <p>Limite {{ count($properties) }}/{{ Auth::user()->properties_limit }}</p>
                <ul class="list-group">
                    @foreach($properties as $property)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <span class="font-weight-bold">{{ $property->title }}</span>
                        <span class="text-muted">{{ $property->created_at->diffForHumans() }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-8 col-md-6">
                <div class="row">
                    <div class="col-12">
                        <h3>Subir propiedades</h3>
                    </div>
                    @foreach($clients as $client)
                    <div class="col-lg-6 col-md-12 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center p-2">
                                    <img src="{{ url($client->logo) }}" class="card-img-top" alt="inmovilla" style="height: 100px">
                                </div>
                                <div class="form-group">
                                    <span class="badge badge-success">{{ strtoupper($client->format) }}</span>
                                </div>
                                @if ($client->format == 'post')
                                    <div class="form-group">
                                        <div class="alert alert-info" role="alert">
                                            <small>{{ config('app.url') }}/{{ $client->name }}/escaparate/upload/{{ Auth::user()->api_key }}</small>
                                        </div>
                                    </div>
                                @elseif ($client->format == 'xml')
                                    <form action="{{ url('upload/file/xml') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <input type="file" name="file" id="file" onchange="fileValidation(this)" required>
                                            <input type="hidden" name="client_id" value="{{ $client->id }}">
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-success btn-block" type="submit">Cargar fichero</button>
                                        </div>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                    @endforeach
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

        $('.form_upload_file').submit((e) => {
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
                for (let i = 0; i <= fi.files.length - 1; i++) {
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
