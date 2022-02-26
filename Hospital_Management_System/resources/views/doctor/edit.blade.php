@extends('layouts.admin_master')
@section('content')
    <div class="main-panel">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 m-auto mt-4">
                    <h4 class="text-center">Create Doctor
                    </h4>
                    @if (Session('doctorINfoUpdated'))
                        <strong class="text-white">{{ session('doctorINfoUpdated') }}</strong>
                    @endif


                    <form action="{{ route('Doctor.update', $doctor_info->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        {{-- <input type="hidden" name="id" value="{{ $doctor_info->id }}"> --}}
                        <input type="hidden" name="old_image" value="{{ $doctor_info->image }}">
                        @error('name')
                            <strong>{{ $message }}</strong>
                        @enderror

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control text-danger"
                                value="{{ $doctor_info->name }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control text-danger"
                                value="{{ $doctor_info->email }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control text-danger"
                                value="{{ $doctor_info->phone }}">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Room No</label>
                            <input type="text" name="room_no" class="form-control text-danger"
                                value="{{ $doctor_info->room_no }}">
                        </div>
                        <div class="mb-3">
                            @error('image')
                                <strong>{{ $message }}</strong>
                            @enderror

                            <label for="exampleInputPassword1" class="form-label">Image</label>
                            <input type="file" name="image" class="form-control text-danger"
                                value="{{ $doctor_info->email }}">
                        </div>
                        <div class="mb-3">

                            <label for="exampleInputPassword1" class="form-label">Old Image</label>


                            <img src="{{ asset($doctor_info->image) }}" height="150px" width="150px"
                                alt="{{ config('app.name') }}">
                        </div>

                        <button type=" submit" class="btn btn-primary">Submit</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
