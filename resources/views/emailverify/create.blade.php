@extends('layouts.app')
@section('content')
<style>
    /* Your CSS as provided, with the changes above */
    /* Custom CSS for the Email Verifier card */
    .card-form {
        max-width: 100%;
        border-radius: 0.5rem; 
         height: 90vh;
    }.image-custom{
        
        max-width: 100%; /* Make image responsive within its parent */
    height: auto;    /* Maintain aspect ratio */
    display: block;  /* Essential for margin: auto to work */
    margin: auto;    /* Center the image horizontally */
         
        
    }

    /* New style for the inner content wrapper */
    .card-form .card-body-inner {
        
        max-width: 600px; 
        margin: auto;     
        padding: 1rem;    
    }

    .card-form .nav-tabs .nav-link {
        color: #6c757d; 
        border-bottom: 2px solid transparent; 
    }
    .card-form .nav-tabs .nav-link.active {
        color: #0d6efd; 
        border-color: #0d6efd; 
        background-color: transparent; 
    }
    .card-form .form-control {
        margin-bottom: 15px; 
    }
    .result-box {
        background-color: #d1e7dd; 
        color: #0f5132; 
        padding: 10px;
        border-radius: 5px;
        margin-bottom: 15px;
        text-align: center;
        font-weight: bold;
    }
   
    .input-group-append .btn {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
    }.nav-item{
        font-size: 14px
    }
</style>

<div class="card card-form shadow-sm">
    <div class="card-header bg-white">
        <ul class="nav nav-tabs card-header-tabs" id="emailVerifierTabs" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="single-email-tab" data-bs-toggle="tab" data-bs-target="#singleEmail" type="button" role="tab" aria-controls="singleEmail" aria-selected="true">Email Verifier</button>
            </li>
          
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="bulk-email-tab" data-bs-toggle="tab" data-bs-target="#bulkEmail" type="button" role="tab" aria-controls="bulkEmail" aria-selected="false">Bulk Email Verifier</button>
            </li>
        </ul>
    </div>
    <div class="card-body">
        <div class="tab-content" id="emailVerifierTabsContent">
            <div class="tab-pane fade show active" id="singleEmail" role="tabpanel" aria-labelledby="single-email-tab">
                <div class="card-body-inner"> <div class="text-center mb-4">
                   <img src="{{asset('custom-image/single-image.webp')}}" alt="" class="image-custom">
                    </div>
<form action="{{ route('single.verify') }}" method="POST">
    @csrf
    <div class="input-group mb-3">
        <input 
            type="email" 
            name="email" 
            class="form-control form-control-lg @error('email') is-invalid @enderror" 
            placeholder="Enter email address to verify"  autocomplete="off"
        
        >
        @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="d-grid gap-2 mb-3">
      {{-- All Flash Messages --}}
@if (session('success'))
    <div class="alert alert-success text-center">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger text-center">
        {{ session('error') }}
    </div>
@endif

@if (session('warning'))
    <div class="alert alert-warning text-center">
        {{ session('warning') }}
    </div>
@endif

@if (session('info'))
    <div class="alert alert-info text-center">
        {{ session('info') }}
    </div>
@endif

{{-- Validation Errors --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


        <button class="btn btn-primary btn-lg" type="submit">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle me-2"><path d="M22 11.08V12a10 10 0 1 1-5.93-8.86"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
            Verify Email
        </button>
    </div>
</form>

                    <div class="text-center my-3">
                        or
                    </div>

       <div class="d-grid gap-2">
    <button 
        type="button" 
        class="btn btn-outline-primary btn-lg w-100 rounded" 
        onclick="document.getElementById('bulk-email-tab').click();">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" 
             viewBox="0 0 24 24" fill="none" stroke="currentColor" 
             stroke-width="2" stroke-linecap="round" stroke-linejoin="round" 
             class="feather feather-mail me-2">
            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
            <polyline points="22,6 12,13 2,6"></polyline>
        </svg>
        Verify Bulk Emails
    </button>
</div>

                </div> </div>

            <div class="tab-pane fade" id="bulkEmail" role="tabpanel" aria-labelledby="bulk-email-tab">
               
                <div class="card-body-inner"> <div class="mb-3">
                  <img src="{{asset('custom-image/bulk-image.webp')}}" alt="" class="image-custom">      
                    </div>
                   <form action="{{ route('bulk.upload.verify') }}" method="POST" enctype="multipart/form-data">
            @csrf {{-- CSRF token for security --}}

            <div class="mb-3">
                <label for="email_csv" class="form-label">Upload CSV/Excel file:</label>
                <input class="form-control @error('email_csv') is-invalid @enderror"
                       type="file"
                       id="email_csv" {{-- Corrected ID to match name for label --}}
                       name="email_csv" {{-- Corrected name to 'email_csv' --}}
                       accept=".csv, .txt, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                       required>
                {{-- Error message display --}}
                @error('email_csv')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <p class="text-muted small">
            
                Max file size: 5MB.<br>
               
            </p>

            <div class="d-grid gap-2">
                 <button type="submit" class="btn btn-primary btn-lg mt-3"> {{-- Changed type to submit --}}
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check-circle me-2"><path d="M22 11.08V12a10 10 0 1 1-5.93-8.86"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>
                    Start Bulk Verification
                </button>
            </div>
        </form>
                    <div class="mt-4 p-3 bg-light border rounded">
                        <h5>Bulk Verification Results:</h5>
                        <p class="text-muted">Results will appear here after processing.</p>
                        <ul class="list-group">
                            </ul>
                    </div>
                </div> </div>
        </div>
    </div>
</div>


<script>
    document.addEventListener('DOMContentLoaded', function() {
    // Initialize Bootstrap Tabs
    var triggerTabList = [].slice.call(document.querySelectorAll('#emailVerifierTabs button'))
    triggerTabList.forEach(function (triggerEl) {
        var tabTrigger = new bootstrap.Tab(triggerEl)

        triggerEl.addEventListener('click', function (event) {
            event.preventDefault()
            tabTrigger.show()
        })
    })

    // Logic to switch to Bulk Email tab when "Verify Bulk Emails" button is clicked
    document.querySelector('[data-bs-target="#bulkEmail"]').addEventListener('click', function() {
        var bulkEmailTab = document.getElementById('bulk-email-tab');
        var tab = new bootstrap.Tab(bulkEmailTab);
        tab.show();
    });
});
</script>
@endsection