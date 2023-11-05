@extends('back/layout/template')

@section('title', 'List Categories Admin')


@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Categories</h1>
    </div>
    <div>
        <!-- Button trigger modal -->
        <button class="btn text-white rounded-5 px-5 mb-4 text-uppercase" data-bs-toggle="modal" data-bs-target="#createModal" style="background-color: #01426a;">ADD Table</button>

        @if ($errors->any())
        <div class="my-3">
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endif 

        @if (session('success'))
        <div class="my-3">
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        </div>
        @endif
        
        
    </div>
      <table id="tabel-data" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Slug</th>
            <th scope="col">Created At</th>
            <th scope="col">Function</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($categories as $item)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $item->name }}</td>
                <td>{{ $item->slug }}</td>
                <td>{{ $item->created_at }}</td>
                <td class="text-center">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#updateModal{{$item->id}}" title="Update Record" data-toggle="tooltip" style="color: #01426a;"><span class='bx bxs-edit bx-sm'></span></a>
                        {{-- <a href="View.php?ID=2" title="View Record" data-toggle="tooltip" style="color: #01426a;"><span class='bx bx-detail'></span></a> --}}
                        <a href="#" data-bs-toggle="modal" data-bs-target="#deleteModal{{$item->id}}" title="Delete Record" data-toggle="tooltip" style="color: #01426a;"><span class='bx bx-trash bx-sm'></span></a>
                </td>
            </tr>
                
            @endforeach
        </tbody>
      </table>
    </div>

    @include('back.category.modal')
        

  </main>
    
@endsection