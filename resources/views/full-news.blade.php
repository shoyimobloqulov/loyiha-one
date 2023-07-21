@extends('layouts.app')
@section('content')
    <!-- Single News Start-->
    <div class="single-news">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="sn-img">
                        <img src="{{asset('storage/'.$news->image)}}"  height="500px"/>
                    </div>
                    <div class="sn-content">
                        <a class="sn-title" href="">{{$news->title}}</a>
                        <span class="sn-date" href=""><i class="far fa-clock"></i> {{ $news->created_at->format('d-M-Y') }}</span> &ensp;
                        <span class="sn-icon"><i class="fa fa-eye"></i> {{$news->view_count}}</span>
                        {!! $news->description !!}
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

                        <div class="sidebar-widget">
                            <h2><i class="fas fa-align-justify"></i>Tags</h2>
                            <div class="tags">
                                @foreach($tags as $t)
                                    <a>#{{$t->name}}</a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Single News End-->

@endsection
