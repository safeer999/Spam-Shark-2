@extends('layouts.app')

@section('content')
    {{-- Main heading for the page, adjusted for small screen padding --}}
   <div class="d-flex justify-content-between align-items-center px-xl-5 mb-3 mt-xl-5">
  <h2 class="mb-0">Edit Profile</h2>
  <span class="text-muted">Profile / Delete Account</span>
</div>


    {{-- Main row container for the panel, with responsive padding --}}
    <div style="background-color: white" class="row mb-3  px-sm-4 px-md-5 px-lg-3 px-xl-3 ml-xl-5 mr-xl-5">
        <div class="col-12"> {{-- Ensures the panel takes full width on all screens --}}
            <div class="panel" data-sortable-id="form-stuff-11">
                {{-- Top decorative accent bar --}}
                <div class="w-100" style="height: 3px; background-color: #00ACAC; margin-bottom: 10px;"></div>

                <div class="panel-heading">
                    <div class="w-100">
                        {{-- Panel heading for the "Edit Profile" section --}}
                        <h4 class="px-5" >Edit Profile</h4>
                        {{-- Decorative bottom line for the heading --}}
                        <div class="" style="height: 2px; background-color: #c7bfbf; margin-bottom: 20px;"></div>
                    </div>
                    {{-- Placeholder for panel heading buttons (if any) --}}
                    <div class="panel-heading-btn"></div>
                </div>

                {{-- Column for the form content, controlling width and padding responsively --}}
                {{-- col-12: Full width on extra-small screens --}}
                {{-- col-md-10: 10/12 width on medium screens and up, centering content --}}
                {{-- col-lg-8: 8/12 width on large screens and up, further centering --}}
                {{-- col-xl-6: 6/12 width on extra-large screens and up, for a narrower form --}}
                {{-- px-3, px-sm-4, px-md-5, px-lg-5: Responsive horizontal padding inside this column --}}
                <div class="col-12 col-md-10 col-lg-8 col-xl-6 px-3 px-sm-4 px-md-5 px-lg-5 mb-xl-3">
                    {{-- Warning message for account deletion --}}
                    <h5 class="mb-3  text-danger">
                        Once your account is deleted, all of its resources and data will be permanently deleted.
                        Please download any information you want to keep.
                    </h5>

                    {{-- Account deletion form --}}
                    <form method="POST" action="{{ route('profile.destroy') }}"
                        onsubmit="return confirm('Are you sure you want to delete your account? This action cannot be undone.');">
                        @csrf
                        @method('DELETE') {{-- Method spoofing for DELETE request --}}

                        <div class="mt-6">
                            {{-- Label for the password input. Assuming x-input-label is a custom Blade component,
                                 if it renders visually, remove 'sr-only' if you want it visible.
                                 Otherwise, the Bootstrap label below is sufficient. --}}
                            {{-- <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" /> --}}

                            <div class="col-md-8 mb-3 ">
                                <label class="form-label" for="password">Current Password *</label>
                                <input class="form-control" id="password" name="password" type="password"
                                    autocomplete="current-password" required> {{-- Added 'required' for form validation --}}

                                {{-- Display validation error for the 'password' field --}}
                                @error('password')
                                    <div class="text-danger mt-1">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- This x-input-error is likely for a specific Inertia/Jetstream setup.
                                 Ensure it aligns with how your application handles errors from userDeletion. --}}
                            <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                        </div>

                        {{-- Action buttons: Cancel and Delete Account --}}
                        {{-- d-flex justify-content-between: Spaces out the buttons --}}
                        {{-- mb-xl-5, mt-xl-5: Margin on extra-large screens --}}
                        {{-- mt-sm-4: Margin on small screens and up --}}
                        <div class="col-12 d-flex justify-content-between mb-xl-5 mt-xl-5 mt-sm-8 mb-sm-5 ">
                            <a href="{{ url('/dashboard') }}" class="btn btn-outline-danger" style="width:100px">Cancel</a>
                            <button type="submit" class="btn btn-primary-custom">
                                Delete Account
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection