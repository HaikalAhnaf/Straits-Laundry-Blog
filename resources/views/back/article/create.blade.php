@extends('back/layout/template')

@section('title', 'Create Article')

{{-- @push('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endpush --}}

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

        {{-- @if (session('success'))
        <div class="my-3">
            <div class="alert alert-success">
                {{session('success')}}
            </div>
        </div>
        @endif --}}
    </div>

    <form action="{{url('article')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{old('title')}}">
                </div>
            </div>

            <div class="col-6">
                <div class="mb-3">
                    <label for="title">Category</label>
                    <select name="category_id" id="category_id" class="form-control">
                        <option value="" hidden>--< Choose >--</option>
                        @foreach ($categories as $item)
                        <option value="{{$item->id}}">{{$item->name}}</option>
                            
                        @endforeach
                    </select>
                </div>
            </div>
            
            <div class="col-12">
                <div class="mb-3">
                    <label for="title">Description</label>
                    <textarea name="desc" id="myeditor" cols="30" rows="10" class="form-control"></textarea>
                </div>
            </div>

            <div class="col-12">
                <div class="mb-3">
                    <label for="img">Image (max2mb)</label>
                    <input type="file" name="img" id="img" class="form-control">
                    <div class="mt-2">
                        <small>Image Preview :</small>
                        <img src="" class="img-thumbnail img-preview" width="10%">
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="mb-3">
                    <label for="status">status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="" hidden>--< Choose >--</option>
                        <option value="1">Publish</option>
                        <option value="0">Private</option>
                    </select>
                </div>
            </div>

            <div class="col-6">
                <div class="mb-3">
                    <label for="publish_date">Publish Date</label>
                    <input type="date" name="publish_date" id="publish_date" class="form-control">
                </div>
            </div>

            <div class="d-flex justify-content-end pb-5">
                <button type="submit" class="btn btn-success btn-lg">Save</button>
            </div>

        </div>
    </div>
    
    </form>
    </div>

    {{-- @include('back.category.modal') --}}
        

  </main>
    
@endsection

@push('js')
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>

<script>
    var options = {
      filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
      filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
      filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
      filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=',
      clipboard_handleImages: false
    };
  </script>

<script>
    CKEDITOR.replace( 'myeditor', options);

    $("#img").change(function(){
        previewImage(this);
    });

    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.img-preview').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush