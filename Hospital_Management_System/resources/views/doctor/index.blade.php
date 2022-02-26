@extends('layouts.admin_master')
@section('content')
    <div class="row">
        <div class="col-lg-10  ">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Docotor Details</h4>
                    @if (Session('doctorINfodeleted'))
                        <strong class="text-warning">{{ session('doctorINfodeleted') }}</strong>
                    @endif


                    <div class="">

                        <table class="table text-danger">

                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Room NO</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            @forelse ($doctors as $doctor)
                                <tbody>
                                    <tr>
                                        <td>{{ $doctor->name }}</td>
                                        <td>{{ $doctor->email }}</td>
                                        <td>{{ $doctor->phone }}</td>
                                        <td>{{ $doctor->room_no }}</td>
                                        <td>
                                            <img src="{{ asset($doctor->image) }}" alt="">

                                        </td>
                                        <td>

                                            <a type="button" href="{{ route('Doctor.edit', $doctor->id) }}"
                                                class="btn btn-primary btn-sm ">View</a>
                                            <a type="button" href="{{ route('Doctor.canceled', $doctor->id) }}"
                                                class="btn btn-danger btn-sm">Cancled</a>


                                        </td>
                                    </tr>



                                </tbody>
                            @empty
                                <p class="text-danger">no data yet here!</p>
                            @endforelse

                        </table>

                    </div>
                </div>
            </div>
        </div>
    @endsection
