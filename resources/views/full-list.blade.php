@extends('layouts.app')
@section('content')
    <!-- Single News Start-->
    <div class="single-news">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="row">
                        @foreach($news as $n)
                            <div class="col-md-4">
                                <div class="card" style="width: 18rem;">
                                    <img src="{{asset('storage/'.$n->image)}}" class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">{{$n->title}}</h5>
                                        <p class="card-text">{{$n->slug}}</p>
                                        <a href="{{route('news-show',$n->id)}}" class="btn btn-primary">Batafsil</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                </div>

                <div class="col-md-4">
                    <div class="sidebar">
                        <div class="sidebar-widget">
                            <h2><i class="fas fa-align-justify"></i>Category</h2>
                            <div class="category">
                                <ul class="fa-ul">
                                    @foreach($category as $c)
                                        <li><span class="fa-li"><i class="far fa-arrow-alt-circle-right"></i></span><a href="{{route('news.by.category',$c->id)}}">{{$c->name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Single News End-->

@endsection
