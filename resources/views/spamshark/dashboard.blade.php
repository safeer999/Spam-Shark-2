<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />

    <!-- theme meta -->
    <meta name="theme-name" content="quixlab" />

    <title>
        Quixlab - Bootstrap Admin Dashboard Template by Themefisher.com
    </title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png')}}" />
    <!-- Pignose Calender -->
    <link href="{{asset('spamsharkadmin/plugins/pg-calendar/css/pignose.calendar.min.css')}}" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />
    <!-- Chartist -->
    <link rel="stylesheet" href="{{asset('spamsharkadmin/plugins/chartist/css/chartist.min.css')}}" />
    <link rel="stylesheet" href="{{asset('spamsharkadmin/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css')}}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom Stylesheet -->
    <link href="{{asset('spamsharkadmin/css/style.css')}}" rel="stylesheet" />
    <link href="{{asset('spamsharkadmin/css/custom.css')}}" rel="stylesheet" />
</head>

<body>
    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">
        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
            <div class="brand-logo">
                <a href="index.html">
                    <b class="logo-abbr"><img style="height: 30px; width: 50px" src="{{asset('spamsharkadmin/images/custom/logo.png')}}" alt="img-fluid " /> </b>
                    <span class="logo-compact"><img style="height: 30px; width: 75px" src="{{asset('spamsharkadmin/images/custom/logo.png')}}" alt="img-fluid " /></span>
                    <span class="brand-title">
                        <img style="height: 30px; width: 150px" src="{{asset('spamsharkadmin/images/custom/logo.png')}}" class="img-fluid mb-3"
                            alt="" />
                          
                    </span>
                </a>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
        <div class="header ">
            <div class="header-content clearfix ">
                <div class="nav-control">
                    <div class="hamburger ">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">
                    <div class="input-group icons">
                        <div class="active-title nav-title">
                            <span class="mt-xl-2 d-none d-sm-block">Email Verification</span>
                            <!-- Email Credits Progress Bar Centered -->
                        </div>
                    </div>
                </div>
                <div class="header-right row">
                    <div class="email-credits-wrapper mx-xl-3 mt-xl-4 mt-xxl-4 mt-md-4 mt-sm- px-xl-3"
                        style="min-width: 200px">
                        <div class="d-flex justify-content-between align-items-center "
                            style="margin-bottom: 2px; line-height: 1">
                            <span class="small d-none d-sm-block">Email credits</span>
                            <span class="fw-bold text-dark d-none  d-sm-block " style="font-size: 0.85rem">40/100</span>
                        </div>
                        <div class="progress d-none d-sm-block" style="height: 6px; margin: 0">
                            <div class="progress-bar bg-success d-none  d-sm-block" role="progressbar" style="width: 40%"
                                aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>

                    <ul class="clearfix">
                        <li class="icons dropdown px-xl-4 ">
                            <a href="javascript:void(0)" data-toggle="dropdown">
                                <i class="fa-solid fa-bell  d-none d-sm-block" style="color: black"></i>
                            </a>
                            <div class="drop-down dropdown-menu dropdown-notfication">
                                <div class="dropdown-content-heading d-flex justify-content-between">
                                    <span class="">2 New Notifications</span>
                                    <a href="javascript:void()" class="d-inline-block">
                                        <span class="badge badge-pill gradient-2">5</span>
                                    </a>
                                </div>
                            </div>
                        </li>

                        <li class="icons dropdown px-xl-4">
                            <div class="user-img position-relative" data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img class="" src="{{asset('spamsharkadmin/images/user/1.png')}}" height="40" width="40" alt=""
                                    data-toggle="dropdown" />
                            </div>
                            <h data-toggle="dropdown" class="active-title c-pointer mr-xl-3 px-xl-3 d-none d-sm-block">Admin Users</h>
                            <i class="fa fa-angle-down f-s-14 c-pointer" aria-hidden="true" data-toggle="dropdown"></i>

                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="app-profile.html"><i class="icon-user"></i>
                                                <span>Profile</span></a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <i class="icon-envelope-open"></i> <span>Inbox</span>
                                                <div class="badge gradient-3 badge-pill gradient-1">
                                                    3
                                                </div>
                                            </a>
                                        </li>

                                        <hr class="my-2" />
                                        <li>
                                            <a href="page-lock.html"><i class="icon-lock"></i> <span>Lock
                                                    Screen</span></a>
                                        </li>
                                        <li>
                                            <a href="page-login.html"><i class="icon-key"></i> <span>Logout</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="nk-sidebar">
            <div class="nk-nav-scroll px-xl-3 " >
                <ul class="metismenu mt-lg-3" id="menu">
                    <li  class="mega-menu mega-menu-sm">
                        <a style="background-color: rgba(208, 255, 247, 1)" class="" href="/index.html" aria-expanded="false">
                            <i style="color: rgba(0, 164, 128, 1)" class="fa-solid fa-envelope"></i><span
                                style="color: rgba(0, 164, 128, 1)" class="nav-text">Email Verification</span>
                        </a>
                    </li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="" href="/credit.html" aria-expanded="false">
                            <i class="fa-regular fa-credit-card"></i><span class="nav-text">Credit Balance</span>
                        </a>
                    </li>
                    <li class="mega-menu mega-menu-sm">
                        <a class="" href="/buycredit.html" aria-expanded="false">
                            <i class="fa-solid fa-sack-dollar"></i><span class="nav-text">Buy Credits</span>
                        </a>
                    </li>

                    <li>
                        <a class="" href="/api.html" aria-expanded="false">
                            <i class="fa-solid fa-plug-circle-bolt"></i><span class="nav-text">API </span>
                        </a>
                    </li>
                      <li class="language-selector-bottom border-top pt-3 pb-3 " style="margin-top: 500px;font-weight: 400;color: bl;">
                <div class="d-flex align-items-center px-3"> <i class="fa-solid fa-globe me-2"></i> <select class="form-select form-select-sm border-0  text-dark nav-text pe-4" id="languageSelect">
                        <option value="en">English</option>
                        <option value="ur">Urdu</option>
                        </select>
                </div>
            </li>
                </ul>
            </div>
           
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
   <div class="content-body px-xl-5">
    <div class="my-4">
        <h2 class="text-second"><strong class="text-first">Protect</strong> your email!</h2>
        <p>Send emails to real contacts only to protect your email reputation and increase the</p>
        <p style="line-height: 1px;">success of your campaigns.</p>
    </div>

    <div class="card-body shadow-lg rounded">
        <div class="card rounded">
            <div class="row row-button">
                <div class="single">
                    <button class="btn tab-btn active" data-target="tab-single">
                        <i class="fa-solid fa-at"></i> SINGLE EMAIL
                    </button>
                </div>
                <div class="file">
                    <button class="btn tab-btn " data-target="tab-file">
                        <i class="fa-solid fa-file-arrow-up"></i> FILE UPLOAD
                    </button>
                </div>
                <div class="paste">
                    <button class="btn tab-btn" data-target="tab-paste">
                        <i class="fa-solid fa-bars"></i> PASTE EMAIL LIST
                    </button>
                </div>
                <div class="integration">
                    <button class="btn tab-btn" data-target="tab-integration">
                        <i class="fa-solid fa-gear"></i> INTEGRATION
                    </button>
                </div>
            </div>
        </div>

        <!-- Tabs Content -->
        <div class="tab-content ">
    <div id="tab-single" class="tab-pane active  mt-xl-5">
        <div class="text-center mb-4">
            <img src="{{asset('spamsharkadmin/images/custom/singleemail.png')}}" class="img-fluid" style="max-width: 450px;" alt="Email Verification Result Mockup">
        </div>
        <p class="text-center center lead ">Enter an email address and click "Verify".</p>
        <div class="row justify-content-center  ">
            <div class="col-sm-10 col-md-8 col-lg-7 col-xl-6 ">
                <form>
                    <div class="mb-3"> <input type="email" class="form-control form-control-lg rounded custom-input" placeholder="E.g. example@gmail.com" aria-label="Email address" aria-describedby="verify-button">
                    </div>
                    <button class="btn btn-lg w-100 rounded  verify text-white justify-content-center" type="submit" id="verify-button">
                        <i class="fa-solid fa-check-circle me-2 text-white"></i> Verify
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
            <div id="tab-file" class="tab-pane mt-xl-5 ">
    <div class="text-center mb-4 justify-content-center align-items-center">
        <img src="{{asset('spamsharkadmin/images/custom/bulkemail.png')}}" class="img-fluid" style="max-width: 450px;" alt="Email Verification Result Mockup">
    </div>
    <p class="text-center center lead ">Drag & Drop Your File Here</p>

    <div class="row justify-content-center ">
        <div class="col-sm-10 col-md-8 col-lg-7 col-xl-6 ">
            <form>
                <div class="mb-3">
                    <p class="text-center">(.txt / .csv / .xlsx)</p> </div>
                <button class="btn btn-lg w-100 rounded verify custom-gradient-button custom-button-shadow text-white" type="submit" id="verify-button">
                    <i class="fa-solid fa-plus me-2 text-white"></i> Select File
                </button>
            </form>
        </div>
    </div>
</div>
            <div id="tab-paste" class="tab-pane">
   

    <p class="text-start lead mb-4 ml-xl-5 mr-xl-5 " style="font-size: 19px;font-weight: 400;" >Enter an email address and hit coma, Enter or Return. Once you entered all emails, you want to verify, click "Start Verification".</p>
  <div class="col-12 col-md-9 col-lg-10 mx-auto"> <textarea style="background-color: rgba(233, 235, 235, 1);" class="form-control form-control-lg rounded custom-input-shadow" rows="8" placeholder="E.g. oliver123@gmail.com, john_walter@gmail.com"></textarea>
                    </div>
    <div class="row justify-content-center">
        <div  class="col-sm-10 col-md-8 col-lg-7 col-xl-6 mt-xl-3">
            <form >
              
                <button  class="btn btn-lg w-100 rounded verify  text-white" type="submit">
                    <i class="fa-solid fa-play me-2 text-white"></i>  Verify
                </button>
            </form>
        </div>
    </div>
</div>
           <div id="tab-integration" class="tab-pane">
  <div class="d-flex flex-column justify-content-center align-items-center text-center mt-xl-5" style="min-height: 300px;">
    <span>
      <i class="fa-solid fa-gears" style="font-size: 100px;color: black;"></i>
    </span>
    <p style="font-size: 48px; font-weight: 700; margin-top: 20px;">Coming Soon</p>
  </div>
</div>

        </div>
    </div>
</div>

        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->

        <!--**********************************
            Footer end
        ***********************************-->
    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <script src="{{asset('spamsharkadmin/plugins/common/common.min.js')}}"></script>
    <script src="{{asset('spamsharkadmin/js/custom.min.js')}}"></script>
    <script src="{{asset('spamsharkadmin/js/settings.js')}}"></script>
    <script src="{{asset('spamsharkadmin/js/gleek.js')}}"></script>
    <script src="{{asset('spamsharkadmin/js/styleSwitcher.js')}}"></script>

    <!-- Chartjs -->
    <script src="{{asset('spamsharkadmin/plugins/chart.js/Chart.bundle.min.js')}}"></script>
    <!-- Circle progress -->
    <script src="{{asset('spamsharkadmin/plugins/circle-progress/circle-progress.min.js')}}"></script>
    <!-- Datamap -->
    <script src="{{asset('spamsharkadmin/plugins/d3v3/index.js')}}"></script>
    <script src="{{asset('spamsharkadmin/plugins/topojson/topojson.min.js')}}"></script>
    <script src="{{asset('spamsharkadmin/plugins/datamaps/datamaps.world.min.js')}}"></script>
    <!-- Morrisjs -->
    <script src="{{asset('spamsharkadmin/plugins/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('spamsharkadmin/plugins/morris/morris.min.js')}}"></script>
    <!-- Pignose Calender -->
    <script src="{{asset('spamsharkadmin/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('spamsharkadmin/plugins/pg-calendar/js/pignose.calendar.min.js')}}"></script>
    <!-- ChartistJS -->
    <script src="{{asset('spamsharkadmin/plugins/chartist/js/chartist.min.js')}}"></script>
    <script src="{{asset('spamsharkadmin/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js')}}"></script>

    <script src="{{asset('spamsharkadmin/js/dashboard/dashboard-1.js')}}"></script>
<script>
document.querySelectorAll('.tab-btn').forEach(button => {
    button.addEventListener('click', () => {
        const target = button.getAttribute('data-target');

        // Remove active class from all buttons
        document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));

        // Add active to clicked button
        button.classList.add('active');

        // Hide all tab panes
        document.querySelectorAll('.tab-pane').forEach(pane => pane.classList.remove('active'));

        // Show the targeted tab
        document.getElementById(target).classList.add('active');
    });
});
</script>



</body>

</html>