

@extends('front.layout.template')

@section('content')
            <!-- Page content-->
            <div class="container">
                <div class="row">
                    <!-- Blog entries-->
                    <div class="col-lg-8">
                        <!-- Featured blog post-->
                        <div class="card mb-4">
                            <a href="{{url('p/'.$latest_post->slug)}}"><img class="card-img-top img-Featured" src="{{asset('storage/back/'.$latest_post->img)}}" alt="..." /></a>
                            <div class="card-body">
                                <div class="row">
                                    <div class="small text-muted col-6 d-flex justify-content-start">{{$latest_post->created_at->format('d-m-Y')}}</div>
                                    <div class="small text-muted col-6 d-flex justify-content-end"><a href="{{url('category/'.$latest_post->Category->slug)}}">{{$latest_post->Category->name}}</a></div>
                                </div>
                                <h2 class="card-title">{{$latest_post->title}}</h2>
                                <p class="card-text">{{Str::limit(strip_tags($latest_post->desc), 200, '...')}}</p>
                                <a class="btn btn-primary" href="{{url('p/'.$latest_post->slug)}}">Read more →</a>
                            </div>
                        </div>
                        <!-- Nested row for non-featured blog posts-->
                        <div class="row">

                            @foreach ($articles as $item)
                            <div class="col-lg-6 py-3">
                                <!-- Blog post-->
                                <div class="card mb-4 h-100 ">
                                    <a href="{{url('p/'.$item->slug)}}"><img class="card-img-top post-img" src="{{asset('storage/back/'.$item->img)}}" alt="..." /></a>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="small text-muted col-6 d-flex justify-content-start">{{$item->created_at->format('d-m-Y')}}</div>
                                            <div class="small text-muted col-6 d-flex justify-content-end"><a href="{{url('category/'.$item->Category->slug)}}">{{$item->Category->name}}</a></div>
                                        </div>
                                        <h2 class="card-title h4">{{$item->title}}</h2>
                                        <p class="card-text">{{Str::limit(strip_tags($item->desc), 200, '...')}}</p>
                                        <a class="btn btn-primary" href="{{url('p/'.$item->slug)}}">Read more →</a>
                                    </div>
                                </div>
                                <!-- Blog post-->
                            </div>
                            @endforeach

                        </div>

                        <div class="pagination justify-content-center my-4">
                            {{$articles->onEachSide(0)}}
                        </div>

                    </div>
                        @include('front.layout.side-widget')
                </div>
            </div>
@endsection


