@extends('admin.layouts.admin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Contactlar
        <small>Ko'rish</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Contactlar</a></li>
        <li class="active">Ko'rish</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>№</th>
                                <th>Nomi</th>
                                <th>Email</th>
                                <th>Subject</th>
                                <th>Desc</th>
                                <th>Ammallar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $id = 1
                            @endphp
                        	@foreach($contact as $s)
                            <tr>
                                <td>{{$id}}</td>
                                <td>{{$s->name}}</td>
                                <td>{{$s->email}}</td>
                                <td>{{$s->subject}}</td>
                                <td>{{$s->desc}}</td>
                                <td>
                                    {!! Form::open(['method' => 'DELETE','route' => ['contact.destroy', $s->id],'style'=>'display:inline']) !!}
                                    {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger'] ) }}
                                    {!! Form::close() !!}
                                </td>
                                @php
                                    $id ++
                                @endphp
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->
@endsection
