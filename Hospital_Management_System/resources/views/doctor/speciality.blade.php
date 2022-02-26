@extends('layouts.admin_master')
@section('content')
<div class="main-panel">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 m-auto mt-4">
                <h4 class="text-center">Create Doctor Speciality
                    @if(session('specialityadded'))
                    <div class="alert alert-success" role="alert">
                        {{session('specialityadded')}}
                    </div>
                    @endif

                </h4>
                <form action="{{route('Doctor.speacialityStore')}}" method="post">
                    @csrf
                    @error('speciality_name')
                    <strong>{{$message}}</strong>
                    @enderror

                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Name</label>
                        <input type="text" name="speciality_name" class="form-control text-danger" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection