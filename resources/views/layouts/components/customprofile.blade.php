@extends('layouts.app')

@section('content')
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/css/intlTelInput.css">

<div class="d-flex justify-content-between align-items-center px-5  mb-3 mt-xl-5">
  <h2 class="mb-0">Edit Profile</h2>
  <span class="text-muted">Profile / Edit Profile</span>
</div>






    <div style="background-color: white" class="row ml-xl-5 mr-xl-5  ">
        <div class="col-md-12 ">
            <div class="panel   " data-sortable-id="form-stuff-11">
                <div class="w-100" style="height: 3px; background-color: #00ACAC; margin-bottom: 5px;"></div>
                <div class="panel-heading ">
                    <!-- Top colored line -->
                    <div class="w-100">

                        <!-- Heading -->
                        <h4 class=" px-4 mb-xl-2 mt-xl-0">Edit Profile</h4>

                        <!-- Bottom black line -->
                        <div class="" style="height: 2px; background-color: #c7bfbf; margin-bottom: 20px; "></div>
                    </div>
                    <div class="panel-heading-btn">

                    </div>
                </div>

                <div class="panel-body ">
                    @if (session('status') === 'profile-updated')
                        <div style="width: 50%" class="alert alert-success">Profile updated successfully.</div>
                    @endif

                    <form method="post" action="{{ route('profile.update') }}">
                        @csrf
                        @method('patch')
                        <div class="col-sm-12 col-md-12 col-xl-6 px-4">
                            <fieldset class=""> <!-- full width -->


                                <!-- First Row -->
                                <div class="row mb-3">
                                    <div class="col-md-6 ">
                                        <label class="form-label" for="first_name">First Name</label>
                                        <input class="form-control" id="first_name" name="first_name" type="text"
                                            value="{{ old('first_name', $user->first_name) }}" required autofocus
                                            autocomplete="first_name">
                                        @error('first_name')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        <label class="form-label" for="last_name">Last Name</label>
                                        <input class="form-control" id="last_name" name="last_name" type="text"
                                            value="{{ old('last_name', $user->last_name) }}" required
                                            autocomplete="last_name">
                                        @error('last_name')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Second Row -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <label class="form-label" for="phone">Phone</label>
                                        <input type="tel" id="phone" name="phone" class="form-control" required
                                            value="{{ old('phone', $user->phone) }}" required autocomplete="phone">
                                            <input type="hidden" id="full_phone" name="full_phone">
                                        @error('phone')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>



                                     <div class="col-md-6 ">
                                            <label class="form-label" for="email">Email</label>
                                            <input class="form-control" id="email" name="email" type="email"
                                                value="{{ old('email', $user->email) }}"  
                                                readonly>
                                            @error('email')
                                                <div class="text-danger mt-1">{{ $message }}</div>
                                            @enderror

                                            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                                                <div class="mt-2 text-warning">
                                                    Your email address is unverified.
                                                    <form id="send-verification" method="post"
                                                        action="{{ route('verification.send') }}" class="d-inline">
                                                        @csrf
                                                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
                                                            Click here to re-send the verification email.
                                                        </button>
                                                    </form>

                                                    @if (session('status') === 'verification-link-sent')
                                                        <div class="text-success mt-1">
                                                            A new verification link has been sent to your email address.
                                                        </div>
                                                    @endif
                                                </div>
                                            @endif
                                        </div>
                                    

                                    <div class="col-md-6 mt-xl-3">
                                        <label class="form-label" for="address">Address</label>
                                        <textarea class="form-control" id="address" name="address" rows="3"  >{{ old('address', $user->address) }}</textarea>
                                        @error('address')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <!-- Third Row - Full width input aligned left -->
                                  
                                       

                                    <!-- Buttons -->
                                    <div class="col-xl-10 d-flex justify-content-between mb-xl-5 mt-xl-5 mt-5">
                                        <a href="{{ url('/dashboard') }}" class="btn btn-outline-danger "
                                            style="text: red;">Cancel</a>
                                        <button type="submit" class="btn btn-primary-custom ">Save</button>
                                    </div>
                            </fieldset>
                        </div>


                    </form>

                </div>
            </div>
        </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/intlTelInput.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.js"></script>

<script>
    const input = document.querySelector("#phone");
    const fullPhoneInput = document.querySelector("#full_phone");

    const iti = intlTelInput(input, {
        initialCountry: "auto",
        separateDialCode: false,
        nationalMode: false,
        formatOnDisplay: true,
        utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.19/js/utils.js",
        geoIpLookup: function (callback) {
            fetch("https://ipapi.co/json")
                .then((res) => res.json())
                .then((data) => callback(data.country_code))
                .catch(() => callback("US"));
        }
    });

    document.querySelector("form").addEventListener("submit", function () {
        const number = iti.getNumber(); // E.164 format
        fullPhoneInput.value = number; // Pass to hidden field
    });
</script>

@endsection