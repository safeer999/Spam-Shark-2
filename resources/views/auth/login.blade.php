<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            height: 100vh;
            display: flex;
            background-color:white; /* Light background for the whole page */
            font-family: poppins;
        }
        .left-panel {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #ffffff; /* White background for the login form */
            padding: 30px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
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
        .shark-icon {
            width: 80%; /* Adjust size as needed */
            max-width: 500px;
            height: auto;
            opacity: 0.8; /* Slightly transparent */
        }
        .login-form-container {
            width: 100%;
            max-width: 400px; /* Limit form width */
        }
        .form-label {
            font-weight: 500;
        }
        .btn-custom-login {
            background-color: rgba(0, 164, 128, 1); /* Teal color for login button */
            border-color: #008080;
            color: white;
            width: 100%;
        }
        .btn-custom-login:hover {
            background-color: #006666;
            border-color: #006666;
        }
        .forgot-password, .signup-link {
            color: #008080;
            text-decoration: none;
        }
        .forgot-password:hover, .signup-link:hover {
            text-decoration: underline;
        }
        .checkbox-label {
            font-size: 0.9rem;
        }.sign-up{
			color: rgba(30, 74, 233, 1); 
		}

        /* Responsive adjustments */
        @media (max-width: 768px) {
            body {
                flex-direction: column;
            }
            .left-panel, .right-panel {
                flex: none;
                width: 100%;
                min-height: 50vh; /* Give some height on small screens */
            }
            .right-panel {
                display: none; /* Hide shark panel on small screens for simplicity if desired, or adjust size */
            }
            .login-form-container {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
 <div class="left-panel">
    <div class="login-form-container">
        <h2 class="mb-3">Hello Again!</h2>
        <p class="mb-4 text-muted">Welcome Back</p>

        <form method="POST" action="{{ route('login') }}" class="fs-13px">
            @csrf

            <x-auth-session-status class="mb-4" :status="session('status')" />

            <div class="mb-3">
                <label for="email" class="form-label">Email address:</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input type="email" name="email" id="email" class="form-control" placeholder="e.g. example@gmail.com" value="{{ old('email') }}" required autofocus autocomplete="username">
                </div>
                @error('email')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-lock"></i></span>
                    <input type="password" class="form-control" id="password" name="password" placeholder="********" required autocomplete="current-password">
                </div>
                @error('password')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3 form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label" for="remember">Keep logged in</label>
            </div>

            <div class="d-grid gap-2 mb-3">
                <button type="submit" class="btn btn-custom-login">Login</button>
            </div>

            @if (Route::has('password.request'))
                <div class="text-center mb-3">
                    <a href="{{ route('password.request') }}" class="forgot-password sign-up">Forgot Password?</a>
                </div>
            @endif
        </form>

        <div class="text-center mt-4">
            <p>Don't you have an account? 
                <a href="{{ route('register') }}" class="signup-link sign-up">Sign up</a>
            </p>
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