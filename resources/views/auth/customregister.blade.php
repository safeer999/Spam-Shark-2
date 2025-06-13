<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Color Admin | Register v3</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    
    <link href="{{asset('admin6css/vendor.min.css')}}" rel="stylesheet" />
    <link href="{{asset('admin6css/default/app.min.css')}}" rel="stylesheet" />
    </head>
<body class='pace-top'>
    <div id="loader" class="app-loader">
        <span class="spinner"></span>
    </div>
    <div id="app" class="app">
        <div class="register register-with-news-feed">
            <div class="news-feed">
                <div class="news-image" style="background-image: url({{asset('admin6img/login-bg/login-bg-15.jpg')}}"></div>
                <div class="news-caption">
                    <h4 class="caption-title"><b>Color</b> Admin App</h4>
                    <p>
                        As a Color Admin app administrator, you use the Color Admin console to manage your organization’s account, such as add new users, manage security settings, and turn on the services you want your team to access.
                    </p>
                </div>
            </div>
            <div class="register-container">
                <div class="register-header mb-25px h1">
                    <div class="mb-1">Sign Up</div>
                    <small class="d-block fs-15px lh-16">Create your Color Admin Account. It’s free and always will be.</small>
                </div>
                <div class="register-content">
                    <form method="POST" action="{{ route('register') }}" class="fs-13px">
                        @csrf
                            
                        <div class="mb-3">
                            <label class="mb-2">First Name <span class="text-danger">*</span></label>
                            <input id="first_name" class="form-control fs-13px" type="text" name="first_name" value="{{ old('first_name') }}" required autofocus />
                            @error('first_name')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="mb-2">Last Name <span class="text-danger"></span></label>
                            <input id="last_name" class="form-control fs-13px" type="text" name="last_name" value="{{ old('last_name') }}" required />
                            @error('last_name')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="mb-2">Email <span class="text-danger">*</span></label>
                            <input id="email" class="form-control fs-13px" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" />
                            @error('email')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="mb-2">Phone</label>
                            <input id="phone" class="form-control fs-13px" type="text" name="phone" value="{{ old('phone') }}" />
                            @error('phone')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="mb-2">Address</label>
                            <input id="address" class="form-control fs-13px" type="text" name="address" value="{{ old('address') }}" />
                            @error('address')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="mb-2">Password <span class="text-danger">*</span></label>
                            <input id="password" class="form-control fs-13px" type="password" name="password" required autocomplete="new-password" />
                            @error('password')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label class="mb-2">Confirm Password <span class="text-danger">*</span></label>
                            <input id="password_confirmation" class="form-control fs-13px" type="password" name="password_confirmation" required autocomplete="new-password" />
                            @error('password_confirmation')
                                <div class="text-danger mt-2">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-check mb-4">
                            <input class="form-check-input" type="checkbox" value="" id="agreementCheckbox" />
                            <label class="form-check-label" for="agreementCheckbox">
                                By clicking Sign Up, you agree to our <a href="javascript:;">Terms</a> and that you have read our <a href="javascript:;">Data Policy</a>, including our <a href="javascript:;">Cookie Use</a>.
                            </label>
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="btn btn-theme d-block w-100 btn-lg h-45px fs-13px">Sign Up</button>
                        </div>
                        <div class="mb-4 pb-5">
                            Already a member? Click <a href="{{ route('login') }}">here</a> to login.
                        </div>
                        <hr class="bg-gray-600 opacity-2" />
                        <p class="text-center text-gray-600">
                            &copy; Color Admin All Right Reserved 2025
                        </p>
                    </form>
                </div>
                </div>
            </div>
        <div class="theme-panel">
            <a href="javascript:;" data-toggle="theme-panel-expand" class="theme-collapse-btn"><i class="fa fa-cog"></i></a>
            <div class="theme-panel-content" data-scrollbar="true" data-height="100%">
                <h5>App Settings</h5>
                
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
                <div class="theme-panel-divider"></div>
                
                <h5>Admin Design (6)</h5>
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
                <div class="theme-panel-divider"></div>
                
                <h5>Language Version (9)</h5>
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
                <div class="theme-panel-divider"></div>
                
                <h5>Frontend Design (5)</h5>
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
                <div class="theme-panel-divider"></div>
                
                <a href="https://seantheme.com/color-admin/documentation/" class="btn btn-dark d-block w-100 rounded-pill mb-10px" target="_blank"><b>Documentation</b></a>
                <a href="javascript:;" class="btn btn-default d-block w-100 rounded-pill" data-toggle="reset-local-storage"><b>Reset Local Storage</b></a>
            </div>
        </div>
        <a href="javascript:;" class="btn btn-icon btn-circle btn-theme btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>
        </div>
    <script src="{{asset('admin6js/vendor.min.js')}}" type="321e355e1fb377be504c9231-text/javascript"></script>
    <script src="{{asset('admin6js/app.min.js')}}" type="321e355e1fb377be504c9231-text/javascript"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-Y3Q0VGQKY3" type="321e355e1fb377be504c9231-text/javascript"></script>
    <script type="321e355e1fb377be504c9231-text/javascript">
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
    
        gtag('config', 'G-Y3Q0VGQKY3');
    </script>
<script src="../../../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js" data-cf-settings="321e355e1fb377be504c9231-|49" defer></script><script defer src="https://static.cloudflareinsights.com/beacon.min.js/vcd15cbe7772f49c399c6a5babf22c1241717689176015" integrity="sha512-ZpsOmlRQV6y907TI0dKBHq9Md29nnaEIPlkf84rnaERnq6zvWvPUqr2ft8M1aS28oN72PdrCzSjY4U6VaAw1EQ==" data-cf-beacon='{"rayId":"942344699a2ea41c","version":"2025.4.0-1-g37f21b1","r":1,"serverTiming":{"name":{"cfExtPri":true,"cfL4":true,"cfSpeedBrain":true,"cfCacheStatus":true}},"token":"4db8c6ef997743fda032d4f73cfeff63","b":1}' crossorigin="anonymous"></script>
</body>
 
</html>