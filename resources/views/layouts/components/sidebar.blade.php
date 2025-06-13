<div class="nk-sidebar ">
    <div class="nk-nav-scroll px-xl-3">
        <ul class="metismenu mt-lg-3" id="menu">
            <li class="mega-menu mega-menu-sm ">
                <a class="" href="#" aria-expanded="false">
                   <i class="fa-solid fa-envelope"></i><span class="nav-text">Email Verification</span>
                </a>
                <ul aria-expanded="false" class="collapse">
                    <li class="">
                        <a class="text-dark" href="{{route('dashboard')}}">
                           <i class="fa-solid fa-check"></i> Email Verification
                        </a>
                    </li>
                    <li style="color:black" class="">
                        <a class="text-dark" href="{{route('tasksresult.index')}}">
                            <i class="fa-solid fa-list-check"></i>
                            Tasks and Results
                        </a>
                    </li>
                </ul>
                </li>
            <li class="mega-menu mega-menu-sm">
                <a class="" href="{{route('credit.index')}}" aria-expanded="false">
                    <i class="fa-regular fa-credit-card"></i><span class="nav-text">Credit Balance</span>
                </a>
            </li>
            <li class="mega-menu mega-menu-sm">
                <a class="" href="{{route('buycredit.index')}}" aria-expanded="false">
                    <i class="fa-solid fa-sack-dollar"></i><span class="nav-text">Buy Credits</span>
                </a>
            </li>
            <li>
                <a class="" href="{{route('api.index')}}" aria-expanded="false">
                    <i class="fa-solid fa-plug-circle-bolt"></i><span class="nav-text">API </span>
                </a>
            </li>
             <li>
                <a class="" href="{{route('cards.index')}}" aria-expanded="false">
                    <i class="fa-solid fa-plug-circle-bolt"></i><span class="nav-text">Cards </span>
                </a>
            </li>
            <li class="language-selector-bottom border-top pt-3 pb-3" style="margin-top: 500px;font-weight: 400;color: bl;">
                <div class="d-flex align-items-center px-3"> <i class="fa-solid fa-globe me-2"></i>
                    <select class="form-select form-select-sm border-0 text-dark nav-text pe-4" id="languageSelect">
                        <option value="en">English</option>
                       
                    </select>
                </div>
            </li>
        </ul>
    </div>
</div>






