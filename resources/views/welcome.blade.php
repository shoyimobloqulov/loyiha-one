@extends('layouts.app')
@section('content')
    <!-- Top News Start-->
    @if(!$firstNewsItem) exit() ; @endif
    <div class="top-news">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 tn-left">
                    <div class="tn-img">
                        <img src="{{ asset('storage/news-image/../' . $firstNewsItem->image) }}" style="max-width:fit-content;"/>
                        <div class="tn-content">
                            <div class="tn-content-inner">
                                <a class="tn-date" href=""><i class="far fa-clock"></i>{{ $firstNewsItem->created_at->format('d-M-Y') }}</a>
                                <a class="tn-title" href="">{{ $firstNewsItem->title }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 tn-right">
                    <div class="row">
                        @foreach ($popularNewsItems as $newsItem)
                        <div class="col-md-6">
                            <div class="tn-img">
                                <img src="{{ asset('storage/news-image/../' . $newsItem->image) }}" />
                                <div class="tn-content">
                                    <div class="tn-content-inner">
                                        <a class="tn-date" href=""><i class="far fa-clock"></i>{{ $newsItem->created_at->format('d-M-Y') }}</a>
                                        <a class="tn-title" href="">{{ $newsItem->title }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Top News End-->
@endsection
