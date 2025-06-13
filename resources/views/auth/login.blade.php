<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from seantheme.com/color-admin/admin/html/login_v3.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 May 2025 11:34:37 GMT -->
<head>
	<meta charset="utf-8" />
	<title>SpamShark | Login v3</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN core-css ================== -->
	<link href="{{asset('admin6css/vendor.min.css')}}" rel="stylesheet" />
	<link href="{{asset('admin6css/default/app.min.css')}}" rel="stylesheet" />
	<!-- ================== END core-css ================== -->
</head>
<body class='pace-top'>
	<!-- BEGIN #loader -->
	<div id="loader" class="app-loader">
		<span class="spinner"></span>
	</div>
	<!-- END #loader -->

	<!-- BEGIN #app -->
	<div id="app" class="app">
		<!-- BEGIN login -->
		<div class="login login-with-news-feed">
			<!-- BEGIN news-feed -->
			<div class="news-feed">
				<div class="news-image" style="background-image: url({{asset('spamsharkadmin/images/custom/sharkimage.png')}})"></div>
				<div class="news-caption">
					
					<p>
					
					</p>
				</div>
			</div>
			<!-- END news-feed -->
			
			<!-- BEGIN login-container -->
			<div class="login-container">
				<!-- BEGIN login-header -->
				<div class="login-header mb-30px">
					<div class="brand">
						<div class="d-flex align-items-center">
							<span class="logo"></span>
					
						
							<b>Spam</b> Shark
						</div>
						
					</div>
					<div class="icon">
						<i class="fa fa-sign-in-alt"></i>
					</div>
				</div>
				<!-- END login-header -->
				
			<div class="login-content">
    <form method="POST" action="{{ route('login') }}" class="fs-13px">
        @csrf

        <x-auth-session-status class="mb-4" :status="session('status')" />

        <div class="form-floating mb-15px">
            <input type="email" name="email" id="email" class="form-control h-45px fs-13px" placeholder="Email Address" value="{{ old('email') }}" required autofocus autocomplete="username" />
            <label for="email" class="d-flex align-items-center fs-13px text-gray-600">Email Address</label>
            @error('email')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-floating mb-15px">
            <input type="password" class="form-control h-45px fs-13px" placeholder="Password" id="password" name="password" required autocomplete="current-password" />
            <label for="password" class="d-flex align-items-center fs-13px text-gray-600">Password</label>
            @error('password')
                <div class="text-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-check mb-30px">
            <input class="form-check-input" type="checkbox" name="remember" id="rememberMe" />
            <label class="form-check-label" for="rememberMe">
                Remember Me
            </label>
        </div>

        <div class="mb-15px">
            <button type="submit" class="btn btn-theme d-block h-45px w-100 btn-lg fs-14px">Sign me in</button>
        </div>

        {{-- You can uncomment this if you want to include the "Forgot your password?" link --}}
        {{-- @if (Route::has('password.request'))
            <div class="text-center mb-15px">
                <a href="{{ route('password.request') }}" class="text-primary fs-13px">Forgot your password?</a>
            </div>
        @endif --}}

        <div class="mb-40px pb-40px text-dark">
            Not a member yet? Click <a href="{{route('register')}}" class="text-primary">here</a> to register.
        </div>
        <hr class="bg-gray-600 opacity-2" />
        
    </form>
</div>
		</div>
		<!-- END login -->
		
		<!-- BEGIN theme-panel -->
		<div class="theme-panel">
			<a href="javascript:;" data-toggle="theme-panel-expand" class="theme-collapse-btn"><i class="fa fa-cog"></i></a>
			<div class="theme-panel-content" data-scrollbar="true" data-height="100%">
				<h5>App Settings</h5>
				
				<!-- BEGIN theme-list -->
				<div class="theme-list">
					<div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-red" data-theme-class="theme-red" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Red">&nbsp;</a></div>
					<div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-pink" data-theme-class="theme-pink" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Pink">&nbsp;</a></div>
					<div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-orange" data-theme-class="theme-orange" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Orange">&nbsp;</a></div>
					<div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-yellow" data-theme-class="theme-yellow" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Yellow">&nbsp;</a></div>
					<div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-lime" data-theme-class="theme-lime" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Lime">&nbsp;</a></div>
					<div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-green" data-theme-class="theme-green" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Green">&nbsp;</a></div>
					<div class="theme-list-item active"><a href="javascript:;" class="theme-list-link bg-teal" data-theme-class="" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Default">&nbsp;</a></div>
					<div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-cyan" data-theme-class="theme-cyan" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Cyan">&nbsp;</a></div>
					<div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-blue" data-theme-class="theme-blue" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Blue">&nbsp;</a></div>
					<div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-purple" data-theme-class="theme-purple" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Purple">&nbsp;</a></div>
					<div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-indigo" data-theme-class="theme-indigo" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Indigo">&nbsp;</a></div>
					<div class="theme-list-item"><a href="javascript:;" class="theme-list-link bg-black" data-theme-class="theme-gray-600" data-toggle="theme-selector" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-container="body" data-bs-title="Black">&nbsp;</a></div>
				</div>
				<!-- END theme-list -->
				
				<div class="theme-panel-divider"></div>
				
				<div class="row mt-10px">
					<div class="col-8 control-label text-body fw-bold">
						<div>Dark Mode <span class="badge bg-primary ms-1 py-2px position-relative" style="top: -1px;">NEW</span></div>
						<div class="lh-14">
							<small class="text-body opacity-50">
								Adjust the appearance to reduce glare and give your eyes a break.
							</small>
						</div>
					</div>
					<div class="col-4 d-flex">
						<div class="form-check form-switch ms-auto mb-0">
							<input type="checkbox" class="form-check-input" name="app-theme-dark-mode" id="appThemeDarkMode" value="1" />
							<label class="form-check-label" for="appThemeDarkMode">&nbsp;</label>
						</div>
					</div>
				</div>
				
				<div class="theme-panel-divider"></div>
				
				<!-- BEGIN theme-switch -->
				<div class="row mt-10px align-items-center">
					<div class="col-8 control-label text-body fw-bold">Header Fixed</div>
					<div class="col-4 d-flex">
						<div class="form-check form-switch ms-auto mb-0">
							<input type="checkbox" class="form-check-input" name="app-header-fixed" id="appHeaderFixed" value="1" checked />
							<label class="form-check-label" for="appHeaderFixed">&nbsp;</label>
						</div>
					</div>
				</div>
				<div class="row mt-10px align-items-center">
					<div class="col-8 control-label text-body fw-bold">Header Inverse</div>
					<div class="col-4 d-flex">
						<div class="form-check form-switch ms-auto mb-0">
							<input type="checkbox" class="form-check-input" name="app-header-inverse" id="appHeaderInverse" value="1" />
							<label class="form-check-label" for="appHeaderInverse">&nbsp;</label>
						</div>
					</div>
				</div>
				<div class="row mt-10px align-items-center">
					<div class="col-8 control-label text-body fw-bold">Sidebar Fixed</div>
					<div class="col-4 d-flex">
						<div class="form-check form-switch ms-auto mb-0">
							<input type="checkbox" class="form-check-input" name="app-sidebar-fixed" id="appSidebarFixed" value="1" checked />
							<label class="form-check-label" for="appSidebarFixed">&nbsp;</label>
						</div>
					</div>
				</div>
				<div class="row mt-10px align-items-center">
					<div class="col-8 control-label text-body fw-bold">Sidebar Grid</div>
					<div class="col-4 d-flex">
						<div class="form-check form-switch ms-auto mb-0">
							<input type="checkbox" class="form-check-input" name="app-sidebar-grid" id="appSidebarGrid" value="1" />
							<label class="form-check-label" for="appSidebarGrid">&nbsp;</label>
						</div>
					</div>
				</div>
				<div class="row mt-10px align-items-center">
					<div class="col-8 control-label text-body fw-bold">Gradient Enabled</div>
					<div class="col-4 d-flex">
						<div class="form-check form-switch ms-auto mb-0">
							<input type="checkbox" class="form-check-input" name="app-gradient-enabled" id="appGradientEnabled" value="1" />
							<label class="form-check-label" for="appGradientEnabled">&nbsp;</label>
						</div>
					</div>
				</div>
				<!-- END theme-switch -->
				
				<div class="theme-panel-divider"></div>
				
				<h5>Admin Design (6)</h5>
				<!-- BEGIN theme-version -->
				<div class="theme-version">
					<div class="theme-version-item">
						<a href="index-2.html" class="theme-version-link active">
							<span style="background-image: url(../assets/img/theme/default.jpg);" class="theme-version-cover"></span>
						</a>
					</div>
					<div class="theme-version-item">
						<a href="https://seantheme.com/color-admin/admin/transparent/" class="theme-version-link">
							<span style="background-image: url(../assets/img/theme/transparent.jpg);" class="theme-version-cover"></span>
						</a>
					</div>
					<div class="theme-version-item">
						<a href="https://seantheme.com/color-admin/admin/apple/" class="theme-version-link">
							<span style="background-image: url(../assets/img/theme/apple.jpg);" class="theme-version-cover"></span>
						</a>
					</div>
					<div class="theme-version-item">
						<a href="https://seantheme.com/color-admin/admin/material/" class="theme-version-link">
							<span style="background-image: url(../assets/img/theme/material.jpg);" class="theme-version-cover"></span>
						</a>
					</div>
					<div class="theme-version-item">
						<a href="https://seantheme.com/color-admin/admin/facebook/" class="theme-version-link">
							<span style="background-image: url(../assets/img/theme/facebook.jpg);" class="theme-version-cover"></span>
						</a>
					</div>
					<div class="theme-version-item">
						<a href="https://seantheme.com/color-admin/admin/google/" class="theme-version-link">
							<span style="background-image: url(../assets/img/theme/google.jpg);" class="theme-version-cover"></span>
						</a>
					</div>
				</div>
				<!-- END theme-version -->
				
				<div class="theme-panel-divider"></div>
				
				<h5>Language Version (9)</h5>
				<!-- BEGIN theme-version -->
				<div class="theme-version">
					<div class="theme-version-item">
						<a href="index-2.html" class="theme-version-link active">
							<span style="background-image: url(../assets/img/version/html.jpg);" class="theme-version-cover"></span>
						</a>
					</div>
					<div class="theme-version-item">
						<a href="https://seantheme.com/color-admin/admin/ajax/" class="theme-version-link">
							<span style="background-image: url(../assets/img/version/ajax.jpg);" class="theme-version-cover"></span>
						</a>
					</div>
					<div class="theme-version-item">
						<a href="https://seantheme.com/color-admin/admin/angularjs/" class="theme-version-link">
							<span style="background-image: url(../assets/img/version/angular1x.jpg);" class="theme-version-cover"></span>
						</a>
					</div>
					<div class="theme-version-item">
						<a href="https://seantheme.com/color-admin/admin/angularjs19/" class="theme-version-link">
							<span style="background-image: url(../assets/img/version/angular10x.jpg);" class="theme-version-cover"></span>
						</a>
					</div>
					<div class="theme-version-item">
						<a href="https://seantheme.com/color-admin/admin/svelte/" class="theme-version-link">
							<span style="background-image: url(../assets/img/version/svelte.jpg);" class="theme-version-cover"></span>
						</a>
					</div>
					<div class="theme-version-item">
						<a href="javascript:alert('Laravel Version only available in downloaded version.');" class="theme-version-link">
							<span style="background-image: url(../assets/img/version/laravel.jpg);" class="theme-version-cover"></span>
						</a>
					</div>
					<div class="theme-version-item">
						<a href="javascript:alert('Django Version only available in downloaded version.');" class="theme-version-link">
							<span style="background-image: url(../assets/img/version/django.jpg);" class="theme-version-cover"></span>
						</a>
					</div>
					<div class="theme-version-item">
						<a href="https://seantheme.com/color-admin/admin/vue3/" class="theme-version-link">
							<span style="background-image: url(../assets/img/version/vuejs.jpg);" class="theme-version-cover"></span>
						</a>
					</div>
					<div class="theme-version-item">
						<a href="https://seantheme.com/color-admin/admin/react/" class="theme-version-link">
							<span style="background-image: url(../assets/img/version/reactjs.jpg);" class="theme-version-cover"></span>
						</a>
					</div>
					<div class="theme-version-item">
						<a href="javascript:alert('.NET Core MVC Version only available in downloaded version.');" class="theme-version-link">
							<span style="background-image: url(../assets/img/version/dotnet.jpg);" class="theme-version-cover"></span>
						</a>
					</div>
					<div class="theme-version-item">
						<a href="https://seantheme.com/color-admin/admin/nextjs/" class="theme-version-link">
							<span style="background-image: url(../assets/img/version/nextjs.jpg);" class="theme-version-cover"></span>
						</a>
					</div>
				</div>
				<!-- END theme-version -->
				
				<div class="theme-panel-divider"></div>
				
				<h5>Frontend Design (5)</h5>
				<!-- BEGIN theme-version -->
				<div class="theme-version">
					<div class="theme-version-item">
						<a href="https://seantheme.com/color-admin/frontend/one-page-parallax/" target="_blank" class="theme-version-link">
							<span style="background-image: url(../assets/img/theme/one-page-parallax.jpg);" class="theme-version-cover"></span>
						</a>
					</div>
					<div class="theme-version-item">
						<a href="https://seantheme.com/color-admin/frontend/e-commerce/" target="_blank" class="theme-version-link">
							<span style="background-image: url(../assets/img/theme/e-commerce.jpg);" class="theme-version-cover"></span>
						</a>
					</div>
					<div class="theme-version-item">
						<a href="https://seantheme.com/color-admin/frontend/blog/" target="_blank" class="theme-version-link">
							<span style="background-image: url(../assets/img/theme/blog.jpg);" class="theme-version-cover"></span>
						</a>
					</div>
					<div class="theme-version-item">
						<a href="https://seantheme.com/color-admin/frontend/forum/" target="_blank" class="theme-version-link">
							<span style="background-image: url(../assets/img/theme/forum.jpg);" class="theme-version-cover"></span>
						</a>
					</div>
					<div class="theme-version-item">
						<a href="https://seantheme.com/color-admin/frontend/corporate/" target="_blank" class="theme-version-link">
							<span style="background-image: url(../assets/img/theme/corporate.jpg);" class="theme-version-cover"></span>
						</a>
					</div>
				</div>
				<!-- END theme-version -->
				
				<div class="theme-panel-divider"></div>
				
				<a href="https://seantheme.com/color-admin/documentation/" class="btn btn-dark d-block w-100 rounded-pill mb-10px" target="_blank"><b>Documentation</b></a>
				<a href="javascript:;" class="btn btn-default d-block w-100 rounded-pill" data-toggle="reset-local-storage"><b>Reset Local Storage</b></a>
			</div>
		</div>
		<!-- END theme-panel -->
		<!-- BEGIN scroll-top-btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-theme btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>
		<!-- END scroll-top-btn -->
	</div>
	<!-- END #app -->
	
	<!-- ================== BEGIN core-js ================== -->
	<script src="{{asset('admin6js/vendor.min.js')}}" type="7409e8b63f96f8a5585653c4-text/javascript"></script>
	<script src="{{asset('admin6js/app.min.js')}}" type="7409e8b63f96f8a5585653c4-text/javascript"></script>
	<!-- ================== END core-js ================== -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-Y3Q0VGQKY3" type="7409e8b63f96f8a5585653c4-text/javascript"></script>
	<script type="7409e8b63f96f8a5585653c4-text/javascript">
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());
	
		gtag('config', 'G-Y3Q0VGQKY3');
	</script>
<script src="../../../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="7409e8b63f96f8a5585653c4-|49" defer></script><script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"94234467bc9297dc","version":"2025.4.0-1-g37f21b1","r":1,"serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"4db8c6ef997743fda032d4f73cfeff63","b":1}' crossorigin="anonymous"></script>
</body>

<!-- Mirrored from seantheme.com/color-admin/admin/html/login_v3.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 19 May 2025 11:34:37 GMT -->
</html>