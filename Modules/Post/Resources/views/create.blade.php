@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{ $title }}
            </h1>
            <ol class="breadcrumb">
                <li><i class="fa fa-edit"></i> Post</li>
                <li class="active">{{ $title }}</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container">
                <div class="row">
                    <!-- Form Post -->
                    <div class="col-lg-8">
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">Add New Post</h3>
                            </div>
                            {{ Form::open(array('url' => $route, 'id' => 'form-post', 'method' => 'POST', 'class' => '')) }}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name">Name Post</label>
                                    {{ Form::text('name', isset($post) ? $post->name : old('name') , array('class' => 'form-control', 'placeholder' =>'Name Post')) }}
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="content">Content Post</label>
                                    {{ Form::textarea('content', isset($post) ? $post->content : old('content') , ['size' => '30x5' , 'id' => 'content']) }}
                                    <script type="text/javascript">
                                        var editor = CKEDITOR.replace('content', {
                                            language: 'vi',
                                            filebrowserBrowseUrl: "{{ asset('bower_components/ckfinder/ckfinder.html') }}",
                                            filebrowserImageBrowseUrl: "{{ asset('bower_components/ckfinder/ckfinder.html?type=Images') }}",
                                            filebrowserFlashBrowseUrl: "{{ asset('bower_components/ckfinder/ckfinder.html?type=Flash') }}",
                                            filebrowserUploadUrl: "{{ asset('bower_components/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}",
                                            filebrowserImageUploadUrl: "{{ asset('bower_components/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}",
                                            filebrowserFlashUploadUrl: "{{ asset('bower_components/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}"
                                        });
                                    </script>
                                    @if ($errors->has('content'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('content') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <input type="hidden" name="category" value="">
                                <input type="hidden" name="tag" value="">
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                    <!-- End Form Post -->

                    <div class="col-lg-4">
                        <!-- Form Category -->
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">Categories</h3>
                            </div>
                            <div class="box-body">
                                <label for="category_id">All Categories</label>
                                <div class="form-group">
                                @foreach($category as $k => $v)
                                    <?php $check = $post->category_id == $k ? 'checked' : ''?>
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="category" value="{{ $k }}" {{ $check }}> {{ $v }}
                                            </label>
                                        </div>
                                @endforeach
                                </div>
                                @if ($errors->has('category_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="box-footer">
                                <label for="category_id">Add New Category</label>
                                {{ Form::open(array('url' => '', 'id' => 'form-category', 'method' => 'POST', 'class' => '')) }}
                                    {{ Form::text('category_name', '', array('class' => 'form-control', 'placeholder' =>'Name Category')) }}
                                    <br>
                                    <button type="submit" class="btn btn-success">Save</button>
                                {{ Form::close() }}
                            </div>
                        </div>
                        <!-- End Form Category -->

                        <!-- Form Tag -->
                        <div class="box box-info">
                            <div class="box-header with-border">
                                <h3 class="box-title">Tag Form</h3>
                            </div>
                            {{ Form::open(array('url' => '', 'id' => 'form-tag', 'method' => 'POST', 'class' => '')) }}
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="tag">Tags</label>
                                    {{ Form::text('tag',  isset($post) ? $post->tag : old('tag'), array('class' => 'form-control', 'placeholder' =>'Tag')) }}
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                            {{ Form::close() }}
                        </div>
                        <!-- End Form Tag -->
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection

@section('top-css-js')
    <!-- CKEditor -->
    <script src="{{ asset('bower_components/ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('bower_components/ckfinder/ckfinder.js') }}"></script>
@endsection