@extends('layouts.admin_master')
@section('content')
    <div class="main-panel">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 m-auto mt-4">
                    <h4 class="text-center">Create Doctor
                    </h4>
                    @if (Session('doctors_info'))
                        <strong class="text-info">{{ session('doctors_info') }}</strong>
                    @endif

                    <form action="{{ route('Doctor.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @error('name')
                            <strong>{{ $message }}</strong>
                        @enderror

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control text-danger" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control text-danger" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control text-danger" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Room No</label>
                            <input type="text" name="room_no" class="form-control text-danger" id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            @error('image')
                                <strong>{{ $message }}</strong>
                            @enderror

                            <label for="exampleInputPassword1" class="form-label">Image</label>
                            <input type="file" name="image" class="form-control text-danger" id="exampleInputPassword1">
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>

    {{-- <section>
        @if (session('doctors_info'))
            <div class="toast" style="position: absolute; top: 0; right: 0; data-delay=" 60000"">
                <div class="toast-header">
                    <strong class="mr-auto">{{ config('app.name') }}</strong>
                    <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body">
                    {{ session('doctors_info') }}
                </div>
            </div>
        @endif
    </section> --}}
@endsection
{{-- @section('backend_sxript')
    <script>
        < script >
            $('.toast').toast('show')
    </script>
@endsection --}}
