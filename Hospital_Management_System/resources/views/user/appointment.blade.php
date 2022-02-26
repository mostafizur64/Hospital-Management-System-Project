<div class="page-section">
    <div class="container">
        <h1 class="text-center wow fadeInUp">Make an Appointment</h1>

        <form class="main-form" action="{{ route('appointment.store') }}" method="POST">
            @csrf
            <div class="row mt-5 ">
                @error('client_name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft">

                    <input type="text" name="client_name" class="form-control" placeholder="Full name">
                </div>
                @error('email')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="col-12 col-sm-6 py-2 wow fadeInRight">

                    <input type="email" name="email" class="form-control" placeholder="Email address..">
                </div>
                @error('date')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">

                    <input type="date" name="date" class="form-control">
                </div>

                @error('doctor_name')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="col-12 col-sm-6 py-2 wow fadeInRight" data-wow-delay="300ms">


                    <select name="doctor_name" id="departement" class="custom-select">


                        <option>---Choose Doctor---</option>
                        @foreach ($doctors as $doctor)
                            <option value="{{ $doctor->name }}">{{ $doctor->name }}
                                (--{{ $doctor->speciality->speciality_name }}--)
                            </option>
                        @endforeach

                    </select>
                </div>
                @error('number')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">

                    <input type="text" name="number" class="form-control" placeholder="Number..">
                </div>
                @error('message')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">

                    <textarea name="message" id="message" class="form-control" rows="6"
                        placeholder="Enter message.."></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary ">Submit Request</button>


            {{-- <button type="submit" class="btn btn-primary "></button> --}}
        </form>
    </div>
</div> <!-- .page-section -->
