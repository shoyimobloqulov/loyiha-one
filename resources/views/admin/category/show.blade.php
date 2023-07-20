@extends('admin.layouts.admin')
@section('content')
<section class="content-header">
    <h1>
        Katigoriya
        <small>Malumotlari</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Katigoriyalar</a></li>
        <li class="active">Ko'rish</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <div class="box box-solid">
                <!-- /.box-header -->
                <div class="box-body">
                    <blockquote>
                        <p>{{$category->name}}</p>
                    </blockquote>
                </div>
                <!-- /.box-body -->
              </div>
        </div>
    </div>
    <!-- /.row -->
</section>
@endsection
