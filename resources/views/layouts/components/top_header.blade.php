 <div class="nav-header ">
            <div class="brand-logo">
                <a href="{{route('dashboard')}}">
                    <b class="logo-abbr"><img style="height: 30px; width: 50px" src="{{asset('spamsharkadmin/images/custom/logo.png')}}" alt="img-fluid " /> </b>
                    <span class="logo-compact"><img style="height: 30px; width: 75px" src="{{asset('spamsharkadmin/images/custom/logo.png')}}" alt="img-fluid " /></span>
                    <span class="brand-title">
                        <img style="height: 30px; width: 150px" src="{{asset('spamsharkadmin/images/custom/logo.png')}}" class="img-fluid mb-3"
                            alt="" />
                          
                    </span>
                </a>
            </div>
        </div> 
 
 <div class="header ">
              <div class="header-content clearfix ">
               
               
                <div class="nav-control">
                  
                      <h3 style="margin-left:0px;font-weight:700" class=" d-none d-sm-block mt-xl-2" >Email Verification</h3>
                    
                </div>
                <div class="header-right row">
                    <div class="email-credits-wrapper mx-xl-3 mt-xl-4 mt-xxl-4 mt-md-4 mt-sm- px-xl-3"
                        style="min-width: 300px">
                        <div class="d-flex justify-content-between align-items-center "
                            style="margin-bottom: 2px; line-height: 1">
                            <span style="font-size: 16px;font-weight:700" class="small d-none d-sm-block">Email credits</span>
                            <span style="font-size: 16px;font-weight:700" class="fw-bold text-dark d-none  d-sm-block " style="font-size: 0.85rem">40/100</span>
                        </div>
                        <div class="progress " style="height: 6px; margin: 0">
                            <div class="progress-bar bg-success " role="progressbar" style="width: 40%"
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

                        <li class="icons dropdown px-xl-4 mt-xl-1">
                            <div class="user-img position-relative" data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img style="mt-xl-3" class="" src="{{asset('spamsharkadmin/images/user/1.png')}}" height="30" width="40" alt=""
                                    data-toggle="dropdown" />
                            </div>
                            <h data-toggle="dropdown" class="active-title c-pointer mr-xl-3 px-xl-2 d-none d-sm-block">{{ Auth::user()->first_name ?? "Not Loginned"}}!</h>
                            <i class="fa fa-angle-down f-s-14 c-pointer" aria-hidden="true" data-toggle="dropdown"></i>

                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="{{route('profile.customedit')}}"><i class="icon-user"></i>
                                                <span>Edit Profile</span></a>
                                        </li>
                                       

                                        <hr class="my-2" />
                                        <li>
                                            <a href="{{route('profile.custompassedit')}}"><i class="icon-lock"></i> <span>Change
                                                    Password</span></a>
                                        </li>
                                        <li>
                                            <a href="{{route('profile.setting')}}"><i class="icon-key"></i> <span>Setting</span></a>
                                        </li>
										   <li>
										 
                                              <a type="submit" href="{{url('/admin/logouts')}}"><i class="icon-key"></i> <span>Logout</span></a>
										   
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>