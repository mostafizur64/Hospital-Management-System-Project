@extends('layouts.admin_master')
@section('title |')
@endsection
@section('content')
    <div class="main-panel">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 mt-4">
                    <h4 class="text-center">Create Doctor
                    </h4>
                    @if (Session('approved'))
                        <strong class="text-info">{{ session('approved') }}</strong>
                    @endif
                    @if (Session('Canceled'))
                        <strong class="text-info">{{ session('Canceled') }}</strong>
                    @endif
                    <div class="">

                        <table class="table text-danger">

                            <thead>
                                <tr>
                                    <th>Client_Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Date</th>
                                    <th>Message</th>
                                    <th>status</th>
                                    {{-- <th>user_id</th> --}}
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($appointment as $doctor)
                                    <tr>
                                        <td>{{ $doctor->client_name }}</td>
                                        <td>{{ $doctor->number }}</td>
                                        <td>{{ $doctor->email }}</td>
                                        <td>{{ $doctor->date }}</td>
                                        <td>{{ $doctor->message }}</td>
                                        <td class="text-warning">{{ $doctor->status }}</td>
                                        {{-- <td>{{ $doctor->user_id }}</td> --}}
                                        <td>

                                            <a type="button" href="{{ route('Appointment.approved', $doctor->id) }}"
                                                class="btn btn-primary btn-sm ">Approved</a>
                                            <a type="button" href="{{ route('Appointment.canceled', $doctor->id) }}"
                                                class="btn btn-danger btn-sm">Cancled</a>
                                            <a type="button" href="{{ route('Doctor.emailView', $doctor->id) }}"
                                                class="btn btn-danger btn-sm">Send Email</a>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>

                        </table>

                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
{{-- <section>
    @if (session('approved'))
        <div class="toast show" style="position: absolute; top: 0; right: 0; data-delay=" 60000"">
            <div class="toast-header">
                <strong class="mr-auto">{{ config('app.name') }}</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                {{ session('approved') }}
            </div>
        </div>
    @endif
</section>


<script>
    $('.toast').toast('show')
</script> --}}

{{-- @section('backend_sxript')
    <script>
        $('.toast').toast('show')
    </script>
@endsection --}}
