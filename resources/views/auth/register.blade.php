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
            background-color: white;
            overflow: hidden;
            font-family: Poppins, sans-serif;
        }
        .left-panel {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #ffffff;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
            z-index: 1;
        }
        .right-panel {
            flex: 1;
            background: linear-gradient(to right, rgba(0, 69, 111, 1), #004d4d);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            clip-path: polygon(0% 0%, 100% 0%, 100% 100%, 15% 100%);
            z-index: 0;
        }
        .shark-icon {
            width: 80%;
            max-width: 500px;
            height: auto;
            opacity: 0.8;
        }
        .register-form-container {
            width: 100%;
            max-width: 400px;
        }
        .form-label {
            font-weight: 500;
        }
        .btn-custom-signup {
            background-color: #008080;
            border-color: #008080;
            color: white;
            width: 100%;
        }
        .btn-custom-signup:hover {
            background-color: #006666;
            border-color: #006666;
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
        }.log-in{
            color: rgba(30, 74, 233, 1);
             text-decoration: none;
        }
        @media (max-width: 768px) {
            body {
                flex-direction: column;
                overflow: auto;
            }
            .left-panel, .right-panel {
                flex: none;
                width: 100%;
                min-height: 50vh;
            }
            .right-panel {
                display: none;
                clip-path: none;
            }
            .register-form-container {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="left-panel">
        <div class="register-form-container">
            <h2 class="mb-2">Hello!</h2>
            <p class="mb-4 text-muted">Sign Up to Get Started</p>

         <form method="POST" action="{{ route('register') }}">
    @csrf

    <div class="mb-3">
        <label for="first_name" class="form-label">First Name:</label>
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-person"></i></span>
            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="First name" value="{{ old('first_name') }}" required>
        </div>
        @error('first_name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Business Email:</label>
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-envelope"></i></span>
            <input type="email" class="form-control" id="email" name="email" placeholder="Your business email" value="{{ old('email') }}" required>
        </div>
        @error('email')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Password:</label>
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-lock"></i></span>
            <input type="password" class="form-control" id="password" name="password" placeholder="********" required>
        </div>
        @error('password')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirm Password:</label>
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-lock"></i></span>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="********" required>
        </div>
        @error('password_confirmation')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" id="termsCheckbox" required>
        <label class="form-check-label" for="termsCheckbox">
            <small>I accept the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>.</small>
        </label>
    </div>

    <div class="d-grid gap-2 mb-3">
        <button type="submit" class="btn btn-custom-signup">Sign up</button>
    </div>
     @if (Route::has('password.request'))
                <div class="text-center mb-3">
                    <a href="{{ route('password.request') }}" class="forgot-password log-in">Forgot Password?</a>
                </div>
            @endif
</form>
 <div  class="text-center  ">
                <p>Already have an account? <a href="{{route('login')}}" class="login-link log-in " style="margin-top: ">Log in</a></p>
            </div>
        </div>
    </div>

    <div class="right-panel">
        <img src="{{asset('spamsharkadmin/images/custom/shark.png')}}" alt="Shark Icon" class="shark-icon">
    </div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</body>
</html>
