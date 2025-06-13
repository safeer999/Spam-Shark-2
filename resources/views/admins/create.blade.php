@extends('layouts.app')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="card mb-6">
    <h5 class="card-header">Admin Creation Form</h5>
    <form method="POST" action="{{ route('admins.store') }}" class="card-body">
      @csrf

<!-- Name -->
      <div class="mt-4">
        <label for="name" class="form-label">First Name</label>
        <input type="text" id="first_name" name="first_name" value="{{ old('first_name')}}" class="form-control" required autofocus autocomplete="first_name" />
        @error('first_name')
          <div class="mt-2 text-danger">{{ $message }}</div>
        @enderror
      </div>
      <div class="mt-4">
        <label for="name" class="form-label"> Last Name</label>
        <input type="text" id="last_name" name="last_name" value="{{ old('last_name')}}" class="form-control" required autofocus autocomplete="last_name" />
        @error('last_name')
          <div class="mt-2 text-danger">{{ $message }}</div>
        @enderror
      </div>
      <!-- Email -->
      <div class="mt-4">
        <label for="email" class="form-label">Email</label>
        <input type="email" id="email" name="email" value="{{ old('email')}}" class="form-control" required autocomplete="username" />
        @error('email')
          <div class="mt-2 text-danger">{{ $message }}</div>
        @enderror
      </div>

      <!-- Password -->
      <div class="mt-4">
        <label for="password" class="form-label">Password</label>
        <input type="password" id="password" name="password" class="form-control" required autocomplete="new-password" />
        @error('password')
          <div class="mt-2 text-danger">{{ $message }}</div>
        @enderror
      </div>

      <!-- Confirm Password -->
      <div class="mt-4">
        <label for="password_confirmation" class="form-label">Confirm Password</label>
        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required autocomplete="new-password" />
        @error('password_confirmation')
          <div class="mt-2 text-danger">{{ $message }}</div>
        @enderror
      </div>

      <!-- Submit and Cancel -->
      <div class="pt-4">
        <button type="submit" class="btn btn-primary me-4">Submit</button>
        <a href="{{ route('admins.index') }}" class="btn btn-secondary">Cancel</a>
      </div>
    </form>
  </div>
</div>

 @endsection


