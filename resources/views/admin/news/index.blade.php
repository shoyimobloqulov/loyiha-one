@extends('admin.layouts.admin')
@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Yangiliklar
        <small>Ko'rish</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Yangiliklar</a></li>
        <li class="active">Ko'rish</li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title"><a href="{{route('news.create')}}" class="btn bg-olive margin"><i class="fa fa-plus"></i> Qo'shish</a></h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>№</th>
                                <th>Title</th>
                                <th>Desc</th>
                                <th>view count <i class="fa fa-eye"></i></th>
                                <th>Image</th>
                                <th>Ammallar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $id = 1
                            @endphp
                        	@foreach($news as $s)
                            <tr>
                                <td>{{$id}}</td>
                                <td>{{$s->title}}</td>
                                <td>{!! $s->description !!}</td>
                                <td>{{$s->view_count}}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $s->image) }}" alt="Image not found" width="70px">
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('news.edit',$s->id) }}"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-info" href="{{ route('news.show',$s->id) }}"><i class="fa fa-eye"></i></a>
                                    {!! Form::open(['method' => 'DELETE','route' => ['news.destroy', $s->id],'style'=>'display:inline']) !!}
                                    {{ Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger'] ) }}
                                    {!! Form::close() !!}
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
