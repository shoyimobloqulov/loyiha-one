@extends('admin.layouts.admin')
@section('content')
<section class="content-header">
    <h1>
        Taglar
        <small>Qo'shish</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Taglar</a></li>
        <li class="active">Qo'shish</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <!-- form start -->
                <form role="form" action="{{route('tags.store')}}" method="POST">
                    @csrf
                    <div class="box-body">
                        <div class="form-group {{$errors->has('name')?'has-error':''}}">
                            <label for="exampleInputEmail1">Nom</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter Name" name="name">
                            @if($errors->has('name'))
                            <span class="help-block">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Saqlash</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- /.row -->
</section>
@endsection
