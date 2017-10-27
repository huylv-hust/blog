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
                        <!-- Form search -->
                        {{ Form::open(array('url' => $route, 'id' => 'form-search', 'class' => '', 'method' => 'GET')) }}
                            <div class="form-group form-inline">
                                {{ Form::text('name', Request()->name, array('class' => 'form-control', 'placeholder' =>'Name Category')) }}

                                {{ Form::text('user', Request()->user, array('class' => 'form-control', 'placeholder' =>'Name Author')) }}

                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    {{ Form::text('start_date', Request()->start_date, array('class' => 'form-control pull-right datepicker', 'placeholder' =>'Start Date', 'data-date-format' => 'yyyy-mm-dd'))}}
                                </div>

                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    {{ Form::text('end_date', Request()->end_date, array('class' => 'form-control pull-right datepicker', 'placeholder' =>'Start Date', 'data-date-format' => 'yyyy-mm-dd')) }}
                                </div>

                                {{ Form::select('status', \App\Http\Constant::$status, Request()->status, array('class' => 'form-control')) }}
                            </div>
                            <div class="form-group form-inline">
                                <a href="{{ route('category.create') }}" class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Create</a>
                                <button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-search"></i> Search</button>
                                <a href="#" class="btn btn-primary btn_active"><i class="glyphicon glyphicon-ok"></i> Avtive</a>
                                <a href="#" class="btn btn-warning btn_deactive"><i class="glyphicon glyphicon-remove"></i> Deactive</a>
                                <a href="#" class="btn btn-danger btn_delete"><i class="glyphicon glyphicon-trash"></i> Delete</a>
                            </div>
                        {{ Form::close() }}
                        <!-- End form search -->

                        <!-- Message-->
                        @if(Request()->session()->has('success'))
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{ Request()->session()->get('success') }}
                            </div>
                        @elseif(Request()->session()->has('error'))
                            <div class="alert alert-danger alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{ Request()->session()->get('error') }}
                            </div>
                        @endif
                        <!-- End Message-->

                        <!-- Result-->
                        <div class="box box-info">
                            <!-- /.box-header -->
                            <div class="box-body table-responsive no-padding">
                                <table class="table table-hover">
                                    <tbody>
                                        <tr class="">
                                            <th>
                                                <label>
                                                    <input type="checkbox" id="select_all">
                                                </label>
                                            </th>
                                            <th>ID</th>
                                            <th>Name</th>
                                            <th>Author</th>
                                            <th>Date</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    {{ Form::open(array('id' => 'form-category', 'method' => 'POST')) }}
                                        <input type="hidden" name="status" value="">
                                    @foreach($result as $category)
                                        <tr>
                                            <td>
                                                <label>
                                                    <input type="checkbox" name="id[]" value="{{ $category->id }}">
                                                </label>
                                            </td>
                                            <td>
                                                <a href="{{ route('category.edit', ['id' => $category->id]) }}">{{ $category->id }}</a>
                                            </td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->users->name }}</td>
                                            <td>{{ $category->created_at }}</td>
                                            <td>
                                                @if($category->status == 1)
                                                    <span class="label label-success">Active</span>
                                                @elseif($category->status == 2)
                                                    <span class="label label-warning">Pending</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('category.edit', ['id' => $category->id]) }}" class="btn btn-xs bg-olive"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    {{ Form::close() }}
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

@section('bot-css-js')
    <script src="{{ asset('js/category.js') }}"></script>
@endsection