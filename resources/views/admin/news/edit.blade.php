@extends('admin.layouts.admin')
@section('content')
<section class="content-header">
    <h1>
        Yangiliklar
        <small>Taxrirlash</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Yangiliklar</a></li>
        <li class="active">Taxrirlash</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-body">
                <!-- form start -->
                {!! Form::model($news, ['route' => ['news.update', $news->id], 'method' => 'put', 'enctype' => 'multipart/form-data']) !!}
                <div class="form-group">
                    {!! Form::label('title', 'Title') !!}
                    {!! Form::text('title', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('slug', 'Slug') !!}
                    {!! Form::text('slug', null, ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('description', 'Description') !!}
                    {!! Form::textarea('description', null, ['class' => 'form-control', 'rows' => 4]) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('image', 'Image') !!}
                    {!! Form::file('image', ['class' => 'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('category_id', 'Category') !!}
                    {!! Form::select('category_id', $categories->pluck('name', 'id'), $news->category_id, ['class' => 'form-control', 'placeholder' => 'Select a category']) !!}
                </div>
                <div class="form-group">
                    <label>Tags:</label>
                    <select name="tags[]" class="form-control select2" multiple="multiple">
                        @foreach($tags as $tag)
                            <option value="{{ $tag->id }}" @if(in_array($tag->id, $tag->pluck('id')->toArray())) selected @endif>{{ $tag->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    {!! Form::submit('Update', ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</section>
@endsection
