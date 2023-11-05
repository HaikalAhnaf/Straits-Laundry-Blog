@extends('back/layout/template')

@section('title', 'List Article Admin')

@push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endpush

@section('content')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Article</h1>
    </div>
    <div>
        <!-- Button trigger modal -->
        <a href="{{url('article/create')}}"><button class="btn text-white rounded-5 px-5 mb-4 text-uppercase" style="background-color: #01426a;">ADD Article</button></a>
        

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

        <div class="swal" data-swal="{{session('success')}}"></div>
        
        
    </div>
      <table  class="table table-striped table-bordered" id="table-data">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Category</th>
            {{-- <th scope="col">Description</th> --}}
            {{-- <th scope="col">Image</th> --}}
            <th scope="col">View</th>
            <th scope="col">Status</th>
            <th scope="col">Publish Date</th>
            <th scope="col">Function</th>
          </tr>
        </thead>
        <tbody>
            
        </tbody>
      </table>
    </div>

    {{-- @include('back.category.modal') --}}
        

  </main>
    
@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    const swal = $('.swal').data('swal');

    if (swal){
        Swal.fire({

        'icon': 'success',
        'title': 'Success',
        'text': swal,
        'showConfirmButton': false,
        'timer': 1500
    })
}

    function deleteArticle(e) {
        let id = e.getAttribute('data-id');

        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.value) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type: 'DELETE',
                url: '/article/' + id,
                dataType: "json",
                success: function(response) {
                    Swal.fire({
                        title: 'Success',
                        text: response.message,
                        icon: 'success',
                    }).then((result) => {
                        window.location.href = '/article';
                    })
            },
                eror: function(xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responeText + "\n" + thrownError);
                }
            });
        }
    })
}
</script>

<script>
    $(document).ready(function(){
      $('#table-data').DataTable({
        processing: true,
        serverside: true,
        ajax: '{{ url()->current() }}',
        columns: [
            {
                data: 'DT_RowIndex',
                name: 'DT_RowIndex'
            },
            {
                data: 'title',
                name: 'title'
            },
            {
                data: 'category_id',
                name: 'category_id'
            },
            {
                data: 'views',
                name: 'views'
            },
            {
                data: 'status',
                name: 'status'
            },
            {
                data: 'publish_date',
                name: 'publish_date'
            },
            {
                data: 'button',
                name: 'button'
            },
            
        ]
      });
  });
    </script>
@endpush