@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Media
            </h1>
            <ol class="breadcrumb">
                <li class="active"><i class="fa fa-file-photo-o"></i> Media</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content ">
            <div class="container">
                @if(count($errors) >0)
                    <ul>
                        @foreach($errors->all() as $error)
                            <li class="text-danger">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
                <!-- enctype="multipart/form-data" class="dropzone dz-clickable" -->
                <form action="{{ url('admin/media') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="col-md-12">
                        <div class="dropzone" id="my-dropzone" name="myDropzone">

                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success pull-right">
                            <i class="fa fa-save"></i>
                            <span>Save and back</span>
                        </button>
                    </div>
                </form>
            </div>

        </section>
        <!-- /.content -->
    </div>
@endsection

@section('top-css-js')
    <!-- Dropzone-->
    <link rel="stylesheet" href="{{ asset('plugins/dropzone/dist/dropzone.css') }}">
    <script src="{{ asset('plugins/dropzone/dist/dropzone.js') }}"></script>
    <script type="text/javascript">
        Dropzone.options.myDropzone= {
            url: '{{ url('admin/media') }}',
            headers: {
                'X-CSRF-TOKEN': '{!! csrf_token() !!}'
            },
            autoProcessQueue: true,
            uploadMultiple: true,
            parallelUploads: 5,
            maxFiles: 10,
            maxFilesize: 5,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            dictFileTooBig: 'Image is bigger than 5MB',
            addRemoveLinks: true,
            removedfile: function(file) {
                var name = file.name;
                name =name.replace(/\s+/g, '-').toLowerCase();    /*only spaces*/
                $.ajax({
                    type: 'POST',
                    url: '{{ url('admin/media/delete') }}',
                    headers: {
                        'X-CSRF-TOKEN': '{!! csrf_token() !!}'
                    },
                    data: "id="+name,
                    dataType: 'html',
                    success: function(data) {
                        $("#msg").html(data);
                    }
                });
                var _ref;
                if (file.previewElement) {
                    if ((_ref = file.previewElement) != null) {
                        _ref.parentNode.removeChild(file.previewElement);
                    }
                }
                return this._updateMaxFilesReachedClass();
            },
            previewsContainer: null,
            hiddenInputContainer: "body"
        }
    </script>
    <style>
        .dropzone {
            border: 2px dashed #0087F7;
            border-radius: 5px;
            background: white;
        }
    </style>
@endsection