@extends('layouts.admin_master')
@section('content')
    <div class="main-panel">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 m-auto mt-4">
                    <h4 class="text-center">Create Doctor
                    </h4>
                    @if (Session('sendEmail'))
                        <strong class="text-info">{{ session('sendEmail') }}</strong>
                    @endif

                    <form action="{{ route('Doctor.sentemail', $data->id) }}" method="post">
                        @csrf
                        @error('name')
                            <strong>{{ $message }}</strong>
                        @enderror

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Greeting</label>
                            <input type="text" name="greeting" class="form-control text-danger" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Body</label>
                            <input type="text" name="body" class="form-control text-danger" id="exampleInputEmail1"
                                aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Action text</label>
                            <input type="text" name="action_text" class="form-control text-danger"
                                id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Action Url</label>
                            <input type="text" name="action_url" class="form-control text-danger"
                                id="exampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            @error('image')
                                <strong>{{ $message }}</strong>
                            @enderror

                            <label for="exampleInputPassword1" class="form-label">End Part</label>
                            <input type="text" name="endpart" class="form-control text-danger" id="exampleInputPassword1">
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
