<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <meta name="copyright" content="MACode ID, https://macodeid.com/">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'One Health - Medical Center') }}</title>

    <link rel="stylesheet" href="{{ asset('fontend') }}/assets/css/maicons.css">

    <link rel="stylesheet" href="{{ asset('fontend') }}/assets/css/bootstrap.css">

    <link rel="stylesheet" href="{{ asset('fontend') }}/assets/vendor/owl-carousel/css/owl.carousel.css">

    <link rel="stylesheet" href="{{ asset('fontend') }}/assets/vendor/animate/animate.css">

    <link rel="stylesheet" href="{{ asset('fontend') }}/assets/css/theme.css">
</head>

<body>

    <!-- Back to top button -->
    <div class="back-to-top"></div>

    <header>
        <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-8 text-sm">
                        <div class="site-info">
                            <a href="#"><span class="mai-call text-primary"></span> +00 123 4455 6666</a>
                            <span class="divider">|</span>
                            <a href="#"><span class="mai-mail text-primary"></span> mail@example.com</a>
                        </div>
                    </div>
                    <div class="col-sm-4 text-right text-sm">
                        <div class="social-mini-button">
                            <a href="#"><span class="mai-logo-facebook-f"></span></a>
                            <a href="#"><span class="mai-logo-twitter"></span></a>
                            <a href="#"><span class="mai-logo-dribbble"></span></a>
                            <a href="#"><span class="mai-logo-instagram"></span></a>
                        </div>
                    </div>
                </div> <!-- .row -->
            </div> <!-- .container -->
        </div> <!-- .topbar -->

        <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('home') }}"><span class="text-primary">One</span>-Health</a>

                <form action="#">
                    <div class="input-group input-navbar">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
                        </div>
                        <input type="text" class="form-control" placeholder="Enter keyword.." aria-label="Username"
                            aria-describedby="icon-addon1">
                    </div>
                </form>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport"
                    aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupport">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('home') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="about.html">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="doctors.html">Doctors</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="blog.html">News</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contact</a>
                        </li>
                        @if (Route::has('login'))
                            @auth
                                <li class="nav-item">
                                    <a class="nav-link btn btn-warning btn-sm text-danger"
                                        href="{{ Route('Appointment.view') }}">Appointment
                                        View</a>
                                </li>

                                <x-app-layout>

                                </x-app-layout>
                            @else
                                <li class="nav-item">
                                    <a class="btn btn-primary ml-lg-3" href="{{ route('login') }}">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="btn btn-primary ml-lg-3" href="{{ route('register') }}">Register</a>
                                </li>
                            @endauth
                        @endif

                    </ul>
                </div> <!-- .navbar-collapse -->
            </div> <!-- .container -->
        </nav>
    </header>









    <div class="page-section pb-0">
        <div class="container">
            <div class="col-sm-12 m-auto">
                <div class="card ">
                    <h4 class="text-center text-waring">Appointment List</h4>

                    <table class="table table-bordered mt-4">
                        <thead>
                            <tr>
                                <th>Client_name</th>
                                <th>Email</th>
                                <th>Date</th>
                                <th>Doctor_name and Seciality</th>
                                <th>number</th>
                                <th>message</th>
                                <th>status</th>
                                <th>user_id</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($appointments as $appointment)
                                <tr>


                                    <td>{{ $appointment->client_name }}</td>
                                    <td>{{ $appointment->email }}</td>
                                    <td>{{ $appointment->date }}</td>
                                    <td>{{ $appointment->doctor_name }}</td>
                                    <td>{{ $appointment->number }}</td>
                                    <td>{{ $appointment->message }}</td>
                                    <td>{{ $appointment->status }}</td>
                                    <td>{{ $appointment->user_id }}</td>
                                    <td>
                                        <a href="{{ route('Appointment.Delete', $appointment->id) }}"
                                            class="btn btn-success"
                                            onclick="return confirm('You are sure to detele this')">Delete</a>
                                    </td>


                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>


    </div>
    <section>
        @if (session('AppointmentDelete'))
      
        <div class="toast" style="position: absolute; top: 0; right: 0; data-delay=" 60000"">
            <div class="toast-header">
                <strong class="mr-auto">{{ config('app.name') }}</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                {{ session('AppointmentDelete') }}
            </div>
        </div>
          @endif
    </section>





    <script src="{{ asset('fontend') }}/assets/js/jquery-3.5.1.min.js"></script>

    <script src="{{ asset('fontend') }}/assets/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('fontend') }}/assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

    <script src="{{ asset('fontend') }}/assets/vendor/wow/wow.min.js"></script>

    <script src="{{ asset('fontend') }}/assets/js/theme.js"></script>
    <script>
        $('.toast').toast('show')
    </script>

</body>

</html>
