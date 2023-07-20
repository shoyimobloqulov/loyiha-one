@extends('layouts.app')
@section('content')
<div class="contact">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="sn-content">
                    <h2 class="sn-title">{{$about->title}}</h2>
                    {!! $about->desc !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection