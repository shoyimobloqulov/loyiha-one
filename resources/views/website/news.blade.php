@extends('layouts.app')
@section('content')
    <div class="cat-news">
        <div class="container-fluid">
            @foreach ($categories as $category)
                <div class="row">
                    <div class="col-md-6">
                        <h2><i class="fas fa-align-justify"></i>{{ $category->name }}</h2>
                        <div class="row cn-slider">
                            @php
                                $newsModel = new \App\Models\News();
                                $newsc = $newsModel->scopeByCategoryId($category->id);
                            @endphp
                            @foreach ($newsc as $n)
                                <div class="col-md-6">
                                    <div class="cn-img">
                                        <img src="{{ asset('storage/news-image/../' . $n->image) }}"/>
                                        <div class="cn-content">
                                            <div class="cn-content-inner">
                                                <a class="cn-date" href=""><i class="far fa-clock"></i>{{ $n->created_at->format('d-M-Y') }}</a>
                                                <a class="cn-title" href="">{{ $n->title }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
