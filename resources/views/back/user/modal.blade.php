<!-- Modal Create-->
<div class="modal fade" id="createModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #01426a;color:white;">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Create Table User</h1>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{url('users')}}" method="post">
                    @csrf

                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name')}}">
                    </div>

                    @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror

                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email')}}">
                    </div>

                    @error('email')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror

                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" value="">
                    </div>

                    @error('password')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror

                    <div class="mb-3">
                        <label for="password_confirmation">Password Confirmation</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" value="">
                    </div>

                    @error('password_confirmation')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror

                    

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>

<!-- Modal Update-->
@foreach ($users as $item)
    
<div class="modal fade" id="updateModal{{ $item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #01426a;color:white;">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Table User</h1>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{url('users/'.$item->id)}}" method="post">
                    @method('PUT')
                    @csrf

                    <div class="mb-3">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{old('name', $item->name)}}">
                    </div>

                    @error('name')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror

                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{old('email', $item->email)}}">
                    </div>

                    @error('email')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror

                    <div class="mb-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" value="">
                    </div>

                    @error('password')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror

                    <div class="mb-3">
                        <label for="password_confirmation">Password Confirmation</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" value="">
                    </div>

                    @error('password_confirmation')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror

                    

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-warning">Save</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>
@endforeach

<!-- Modal Delete-->
@foreach ($users as $item)
    
<div class="modal fade" id="deleteModal{{ $item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color: #01426a;color:white;">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Delete Table User</h1>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{url('users/'.$item->id)}}" method="post">
                    @method('DELETE')
                    @csrf

                    <p>Are you sure delete User <span class="text-danger">{{$item->name}}</span>?</p>

                    

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>
@endforeach
