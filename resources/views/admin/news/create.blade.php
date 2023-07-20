@extends('admin.layouts.admin')
@section('content')
<section class="content-header">
    <h1>
        Yangilik
        <small>Qo'shish</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Yangilik</a></li>
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
                <div class="box box-primary">
                    <div class="box-body">
                        {!! Form::open(['route' => 'news.store', 'method' => 'post','files' => true]) !!}
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
                            {!! Form::textarea('description', null, ['class' => 'form-control','id'  => 'editor1', 'rows' => 4]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('image', 'Image') !!}
                            {!! Form::file('image', ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('category_id', 'Category') !!}
                            {!! Form::select('category_id', $categories->pluck('name','id'), null, ['class' => 'form-control', 'placeholder' => 'Select a category']) !!}
                        </div>
                        <div class="form-group">
                            <label>Tags:</label>
                            <select name="tags[]" class="form-control select2" multiple="multiple">
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            {!! Form::submit('Create', ['class' => 'btn btn-primary']) !!}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->
</section>
@endsection

@section('script')
    <script src="{{asset('admin/bower_components/ckeditor/ckeditor.js')}}"></script>

    <script src="{{asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
    <script>
        $(function () {
            // Replace the <textarea id="editor1"> with a CKEditor
            // instance, using default configuration.
            CKEDITOR.replace('editor1')
            //bootstrap WYSIHTML5 - text editor
            $('.textarea').wysihtml5()
        })
    </script>
@endsection
