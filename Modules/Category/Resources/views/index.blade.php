@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{ $title }}
            </h1>
            <ol class="breadcrumb">
                <li><i class="fa fa-edit"></i> Categories</li>
                <li class="active">{{ $title }}</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        {{ Form::open(array('url' => $route, 'id' => 'form-tag', 'class' => '', 'method' => 'GET')) }}
                            <div class="row">
                                <div class="col-sm-6 form-group">
                                    {{ Form::label('name', 'Name', ['class' => 'col-sm-2 col-form-label']) }}
                                    <div class="col-sm-10">
                                        {{ Form::text('name', Request()->name, array('class' => 'form-control', 'placeholder' =>'Name Category')) }}
                                    </div>
                                </div>
                                <div class="col-sm-6 form-group">
                                    {{ Form::label('name', 'Author', ['class' => 'col-sm-2 col-form-label']) }}
                                    <div class="col-sm-10">
                                        {{ Form::text('user', Request()->user, array('class' => 'form-control', 'placeholder' =>'Name Author')) }}
                                    </div>
                                </div>
                            </div>
                            <div style="text-align: center">
                                <a href="{{ route('category.create') }}" class="btn btn-success">Create</a>
                                <button type="submit" class="btn btn-info">Search</button>
                            </div>
                        {{ Form::close() }}
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
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Category Table</h3>
                                <div class="box-tools" style="bottom: auto">
                                    {{ Form::open(array('url' => $route, 'id' => 'form-tag', 'class' => 'form-inline', 'method' => 'GET')) }}

                                        <div class="form-group">
                                            {{ Form::label('name', 'Name', ['class' => 'col-form-label']) }}
                                            {{ Form::text('name', Request()->name, array('class' => 'form-control', 'placeholder' =>'Name Category')) }}
                                        </div>
                                        <div class="form-group">
                                            {{ Form::label('name', 'Author', ['class' => 'col-form-label']) }}
                                            {{ Form::text('user', Request()->user, array('class' => 'form-control', 'placeholder' =>'Name Author')) }}
                                        </div>

                                        <button type="submit" class="btn btn-info">Search</button>

                                    {{ Form::close() }}
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover">
                                    <tbody>
                                        <tr>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Author</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    @foreach($result as $category)
                                        <tr>
                                            <td>
                                                <a href="{{ route('category.edit', ['id' => $category->id]) }}">{{ $category->id }}</a>
                                            </td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->users->name }}</td>
                                            <td>{{ $category->created_at }}</td>
                                            <td>
                                                @if($category->status == 1)
                                                    <span class="label label-success">Approved</span>
                                                @elseif($category->status == 2)
                                                    <span class="label label-warning">Pending</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div style="float: left; margin-right: 2px">
                                                    <!-- Form change status -->
                                                    {{ Form::open(array('url' => route('category.status'), 'method' => 'POST')) }}
                                                        {{ Form::hidden('id', $category->id) }}
                                                        @if($category->status == 1)
                                                            {{ Form::hidden('status', '2') }}
                                                            <button type="submit" class="btn btn-warning btn-sm">Pending</button>
                                                        @elseif($category->status == 2)
                                                            {{ Form::hidden('status', '1') }}
                                                            <button type="submit" class="btn btn-success btn-sm">Approved</button>
                                                            @endif
                                                    {{ Form::close() }}
                                                </div>
                                                <div>
                                                    <!-- Form delete -->
                                                    {{ Form::open(array('url' => route('category.delete'), 'method' => 'POST')) }}
                                                        {{ Form::hidden('id', $category->id) }}
                                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                    {{ Form::close() }}
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <!-- End Result-->
                        <!-- Pagination-->
                        {{ $result->appends(Request()->all())->links() }}
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection