

@extends('front.layout.template')

@section('content')
            <!-- Page content-->
            <div class="container">
                <div class="row">
                    <!-- Blog entries-->
                    <div class="col-lg-8">
                        <!-- Featured blog post-->
                        <div class="card mb-4">
                            <a href="{{url('p/'.$article->slug)}}"><img class="card-img-top img-Featured" src="{{asset('storage/back/'.$article->img)}}" alt="..." /></a>
                            <div class="card-body">
                                <div class="row">
                                    <div class="small text-muted col-6 d-flex justify-content-start">{{$article->created_at->format('d-m-Y')}}</div>
                                    <div class="small text-muted col-6 d-flex justify-content-end"><a href="{{url('category/'.$article->Category->slug)}}">{{$article->Category->name}}</a></div>
                                </div>
                                <h1 class="card-title">{{$article->title}}</h1>
                                <p class="card-text">{!! ($article->desc) !!}</p>
                            </div>
                        </div>


                    </div>
                        @include('front.layout.side-widget')
                </div>
            </div>
@endsection


