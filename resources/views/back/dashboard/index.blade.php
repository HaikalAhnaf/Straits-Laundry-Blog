@extends('back/layout/template')

@section('title', 'Dashboard')


@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-end pt-3">
    Welcome, {{ auth()->user()->name}}
  </div>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Dashboard</h1>
    </div>
    <div class="row">
      <div class="col-6">
        <div class="card mb-3" style="border: solid #01426a">
          <div class="card-header fs-4">Total Article</div>
          <div class="card-body" style="color: #01426a">
            <h5 class="card-title">{{$total_articles}} Article</h5>
            <hr>
            <p class="card-text">
              <a href="{{ url('article')}}" class="text-black">View</a>
            </p>
          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="card mb-3" style="border: solid #01426a">
          <div class="card-header fs-4">Total Categories</div>
          <div class="card-body" style="color: #01426a">
            <h5 class="card-title">{{$total_categories}} Categories</h5>
            <hr>
            <p class="card-text">
              <a href="{{ url('categories')}}" class="text-black">View</a>
            </p>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-6">
        <h3>Latest Article</h3>
        <table  class="table table-striped table-bordered">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Title</th>
              <th scope="col">Category</th>
              <th scope="col">Create At</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($latest_article as $item)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $item->title }}</td>
              <td>{{ $item->Category->name }}</td>
              <td>{{ $item->created_at }}</td>
              <td class="text-center">
                <a href="{{ url('article/'.$item->id)}}" class="btn btn-sm btn-secondary">Detail</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      
      <div class="col-6">
        <h3>Popular Article</h3>
        <table  class="table table-striped table-bordered">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Title</th>
              <th scope="col">Category</th>
              <th scope="col">Viewed</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($popular_article as $item)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $item->title }}</td>
              <td>{{ $item->Category->name }}</td>
              <td>{{ $item->views }}x</td>
              <td class="text-center">
                <a href="{{ url('article/'.$item->id)}}" class="btn btn-sm btn-secondary">Detail</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    

    

  </main>
    
@endsection