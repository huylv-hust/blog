@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                {{ Form::open(array('url' => $route, 'id' => 'form-tag', 'method' => 'POST')) }}
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
                        {{ Form::text('content', isset($post) ? $post->content : old('content'), array('class' => 'form-control', 'placeholder' =>'Content Post')) }}
                        @if ($errors->has('content'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('content') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        {{ Form::select('category_id', $category,  isset($post) ? $post->category_id : old('category_id'), array('class' => 'form-control')) }}
                        @if ($errors->has('category_id'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="tag">Tag</label>
                        {{ Form::text('tag',  isset($post) ? $post->tag : old('tag'), array('class' => 'form-control', 'placeholder' =>'Tag')) }}
                    </div>
                    <button type="submit" class="btn btn-success">Save</button>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection