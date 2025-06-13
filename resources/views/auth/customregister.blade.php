<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        body {
            height: 100vh;
            display: flex;
            background-color:white; /* Light background for the whole page */
            overflow: hidden; /* Hide any potential overflow from the diagonal */
             font-family: poppins;
        }
        .left-panel {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #ffffff; /* White background for the form */
            padding: 30px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05); /* Lighter shadow for subtlety */
            z-index: 1; /* Ensure left panel is on top */
        }
        .right-panel {
            flex: 1;
            background: linear-gradient(to right, rgba(0, 69, 111, 1), #004d4d); /* Teal to dark teal gradient */
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            position: relative;
            /* Using clip-path for the straight diagonal cut */
            clip-path: polygon(0% 0%, 100% 0%, 100% 100%, 15% 100%); /* Adjusted: goes from top-left to 15% from left at bottom */
            z-index: 0; /* Behind the left panel */
        }
        /* Fallback/alternative for browsers that don't fully support clip-path well or for more complex curves */
        /* You could also use a pseudo-element on the left panel or right panel with a transformed background */
        /* For this specific straight line, clip-path on the right panel is simplest. */

        .shark-icon {
            width: 80%; /* Adjust size as needed */
            max-width: 500px;
            height: auto;
            opacity: 0.8; /* Slightly transparent */
        }
        .register-form-container {
            width: 100%;
            max-width: 400px; /* Limit form width */
        }
        .form-label {
            font-weight: 500;
        }
        .btn-custom-signup {
            background-color: #008080; /* Teal color for sign up button */
            border-color: #008080;
            color: white;
            width: 100%;
        }
        .btn-custom-signup:hover {
            background-color: #006666;
            border-color: #006666;
        }
        .forgot-password, .login-link {
            color: #008080;
            text-decoration: none;
        }
        .forgot-password:hover, .login-link:hover {
            text-decoration: underline;
        }
        .form-check-label small {
            font-size: 0.85rem;
            color: #6c757d;
        }
        .form-check-label a {
            color: #008080;
            text-decoration: none;
        }
        .form-check-label a:hover {
            text-decoration: underline;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            body {
                flex-direction: column;
                overflow: auto; /* Allow scrolling on smaller screens if content exceeds height */
            }
            .left-panel, .right-panel {
                flex: none;
                width: 100%;
                min-height: 50vh; /* Give some height on small screens */
            }
            .right-panel {
                display: none; /* Hide shark panel on small screens for simplicity if desired */
                clip-path: none; /* Remove clip-path on small screens if hidden */
            }
            .register-form-container {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
   <div class="register-form-container">
    <h2 class="mb-2">Hello!</h2>
    <p class="mb-4 text-muted">Sign Up to Get Started</p>

    <form method="POST" action="{{ route('register') }}" class="fs-13px">
        @csrf
        
        <div class="mb-3">
            <label for="first_name" class="form-label">First Name <span class="text-danger">*</span></label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-person"></i></span>
                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name') }}" required autofocus>
            </div>
            @error('first_name')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="last_name" class="form-label">Last Name <span class="text-danger">*</span></label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-person"></i></span>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
            </div>
            @error('last_name')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required autocomplete="username">
            </div>
            @error('email')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}">
            </div>
            @error('phone')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="address" class="form-label">Address</label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-geo-alt"></i></span>
                <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}">
            </div>
            @error('address')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                <input type="password" class="form-control" id="password" name="password" required autocomplete="new-password">
            </div>
            @error('password')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Confirm Password <span class="text-danger">*</span></label>
            <div class="input-group">
                <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required autocomplete="new-password">
            </div>
            @error('password_confirmation')
                <div class="text-danger mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" id="termsCheckbox" required>
            <label class="form-check-label" for="termsCheckbox">
                <small>
                    Please tick this checkbox confirming that you accept 
                    <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>.
                </small>
            </label>
        </div>

        <div class="d-grid gap-2 mb-3">
            <button type="submit" class="btn btn-custom-signup">Sign up</button>
        </div>

        <div class="text-center">
            Already have an account? <a href="{{ route('login') }}" class="login-link">Log in</a>
        </div>
    </form>
</div>


    <div class="right-panel">
        <img src="{{asset('spamsharkadmin/images/custom/shark.png')}}" alt="Shark Icon" class="shark-icon"> </div>
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>