

@extends('front.layout.template')

@section('content')




            <!-- Page content-->
            <div class="container">
                <nav class="navbar navbar-expand-lg">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedSearch" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedSearch">
                        @foreach ($categories as $item)
                        <ul class="navbar-nav  mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link text-black" href="#">{{$item->name}}</a>
                            </li>
                        </ul>
                        @endforeach
                    </div>

                        <div class="collapse navbar-collapse" id="navbarSupportedSearch">
                            <ul class="navbar-nav ms-auto mb-lg-0">
                                <form action="{{route('search')}}" method="POST" class="my-3">
                                    @csrf
                                    <div class="input-group">
                                        <input class="form-control" type="text" name="keyword" placeholder="Search articles..." aria-label="Enter search term..." aria-describedby="button-search" />
                                        <button class="btn btn-primary" id="button-search" type="submit">Search</button>
                                    </div>
                                </form>
                            </ul>
                        </div>
                </nav>
                @foreach ($articles as $item)
                    <div class="card mb-5">
                        <a href="Blog/StraitsLaundryOutlet.php">
                        <div class="row g-0">
                        <div class="col-md-10">
                            <div class="card-body">
                            <h3 class="card-title">{{$item->title}}</h3>
                            <p class="card-text" style="text-align: justify;">{{Str::limit(strip_tags($item->desc), 300, '...')}}</p>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <img src="{{asset('storage/back/'.$item->img)}}" class="p-3 post-img" alt="...">
                        </div>
                        </div>
                    </a>
                    </div>
                  @endforeach


                        {{-- @include('front.layout.side-widget') --}}
                </div>
            </div>
@endsection


