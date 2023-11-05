@extends('back/layout/template')

@section('title', 'Show Detail Article')


@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Detail Article</h1>
    </div>
    <div>        
               
    </div>
      <table  class="table table-striped table-bordered">
        <thead>
          <tr>
            <th width="10%" scope="col">Title</th>
            <td scope="col">: {{$article->title}}</td>
          </tr>
          <tr>
            <th scope="col">Category</th>
            <td scope="col">: {{$article->Category->name}}</td>
          </tr>
          <tr>
            <th scope="col">Description</th>
            <td scope="col">: {!! $article->desc !!}</td>
          </tr>
          <tr>
            <th scope="col">Image</th>
            <td scope="col">
                <a href="{{asset('storage/back/'.$article->img)}}" target="_blank" rel="noopener noreferrer"><img src="{{asset('storage/back/'.$article->img)}}" alt=""  width="25%"></a>
                    
            </td>
          </tr>
          <tr>
            <th scope="col">Views</th>
            <td scope="col">: {{$article->views}}x</td>
          </tr>
          <tr>
            <th scope="col">Status</th>
            <td scope="col">
                @if ($article->status == 1)
                <span class="badge bg-success">Published</span>
                @else
                <span class="badge bg-danger">Private</span>
                @endif
            </td>
          </tr>
          <tr>
            <th scope="col">Publish Date</th>
            <td scope="col">: {{$article->publish_date}}</td>
          </tr>
        </thead>
      </table>
      <div class="d-flex justify-content-end">
        <a href="{{url('article')}}"><button class="btn btn-secondary btn-lg">Back</button></a>
    </div>
    </div>

    {{-- @include('back.category.modal') --}}
        

  </main>
    
@endsection
