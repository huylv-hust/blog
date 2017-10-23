@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
            <!-- Form Search-->
                {{ Form::open(array('url' => $route, 'id' => 'form-tag', 'class' => 'form-inline', 'method' => 'GET')) }}
                    <div class="form-group">
                        {{ Form::label('name', 'Name') }}
                        {{ Form::text('name', Request()->name, array('class' => 'form-control', 'placeholder' =>'Name Post')) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('category', 'Category') }}
                        {{ Form::text('category', Request()->category, array('class' => 'form-control', 'placeholder' =>'Name Category')) }}
                    </div>
                <button type="submit" class="btn btn-primary">Search</button>
                <a href="{{ route('post.create') }}" class="btn btn-success">Create</a>
                {{ Form::close() }}
            <!-- End Form Search-->
                <br>
            <!-- Message-->
                @if(Request()->session()->has('success'))
                    <div class="alert alert-success"> {{ Request()->session()->get('success') }}</div>
                @elseif(Request()->session()->has('error'))
                    <div class="alert alert-danger"> {{ Request()->session()->get('error') }}</div>
                @endif
            <!-- End Message-->
                <br>
            <!-- Result-->
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Name Post</td>
                            <td>Content</td>
                            <td>Category</td>
                            <td>Tags</td>
                            <td>Created</td>
                            <td>Menu</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($result as $post)
                            <tr>
                                <td>
                                    <a href="{{ route('post.edit', ['id' => $post->id]) }}">{{ $post->id }}</a>
                                </td>
                                <td>{{ $post->name }}</td>
                                <td>{{ $post->content }}</td>
                                <td>{{ $post->categories->name }}</td>
                                <td>{{ $post->tag }}</td>
                                <td>{{ $post->created_at }}</td>
                                <td>
                                {{ Form::open(array('url' => route('post.delete'), 'method' => 'POST')) }}
                                    {{ Form::hidden('id', $post->id) }}
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                {{ Form::close() }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            <!-- End Result-->
            <!-- Pagination-->
                {{ $result->appends(Request()->all())->links() }}
            </div>
        </div>
    </div>
@endsection