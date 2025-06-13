@extends('layouts.app')

@section('content')

<div class="content-body px-3 px-md-4 px-xl-5">
    <div class="my-4">
        <h2 class="text-second">
            <strong class="text-first">BUY</strong> CREDITS
        </h2>
    </div>

    <div class="row gx-4 mb-4 text-center justify-content-center col-xl-8">
        <div class="col-12  col-md-6 my-3">
            <div class="custom-card top-left-card h-100">
                <img src="/images/custom/coin.png" alt="" class="img-fluid card-img-top-custom">
                <h1 class="text-white mt-xl-3">Evergreen Promotion</h1>
                <h5 class="text-white">Buy at least 5,000,000 credits & </h5>
                <h5 class="text-white mb-xl-3">get 1 million credits for free.</h5>
                <h2 class="text-white mb-xl-5">+1 MILLION <span style="font-size: 20px; font-family: poppins;"> EXTRA FOR FREE</span> </h2>
            </div>
        </div>
        <div class="col-12 col-md-6 my-3">
            <div class="custom-card top-right-card h-100">
                <img src="/images/custom/coin.png" alt="" class="img-fluid card-img-top-custom">
                <h1 class="text-white mt-xl-3 ">Extra Verification</h1>
                <h1 class="text-white">Credits</h1>
                <h3 class="text-white">You get up to 30% extra credits</h3>
                <h3 class="text-white"> for free. Expires soon.</h3>
                <p class="timer-display" id="extraVerificationTimer">
                    <span class="timer-val" data-unit="h">00</span><span class="timer-unit">ʰ</span>
                    <span class="timer-val" data-unit="m">00</span><span class="timer-unit">ᵐ</span>
                    <span class="timer-val" data-unit="s">00</span><span class="timer-unit">ˢ</span>
                    <span class="timer-val small-ms" data-unit="ms">0</span>
                </p>
            </div>
        </div>
    </div>

    <div class="row gx-4 gy-4 bottom-cards text-center justify-content-center col-xl-8">
        <div class="col-12  col-sm-6 col-md-6 col-lg-6 mb-md-3 mb-sm-5 mc-xs-3 ">
            <div class="normal-card h-100">
                <h1 style="color: rgba(0, 164, 128, 1);">10,000</h1>
                <span style="color: black;">Email Verification Credits</span>
                <h3 style="color: rgba(0, 0, 0, 1);font-weight: 700; font-family: poppins;">Only 37 USD</h3>
                <button class="btn btn-lg w-100 rounded verify custom-gradient-button custom-button-shadow text-white" type="submit" id="verify-button">
                    <i class="fa-solid fa-plus me-2 text-white"></i> Buy Credits
                </button>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-md-3 mb-sm-5 mc-xs-3">
            <div class="normal-card h-100">
                <h1 style="color: rgba(0, 164, 128, 1);">10,000</h1>
                <span style="color: black;">Email Verification Credits</span>
                <h3 style="color: rgba(0, 0, 0, 1);font-weight: 700; font-family: poppins;">Only 37 USD</h3>
                <button class="btn btn-lg w-100 rounded verify custom-gradient-button custom-button-shadow text-white" type="submit" id="verify-button">
                    <i class="fa-solid fa-plus me-2 text-white"></i> Buy Credits
                </button>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-md-3 mb-sm-5 mc-xs-3">
            <div class="normal-card h-100">
                <h1 style="color: rgba(0, 164, 128, 1);">10,000</h1>
                <span style="color: black;">Email Verification Credits</span>
                <h3 style="color: rgba(0, 0, 0, 1);font-weight: 700; font-family: poppins;">Only 37 USD</h3>
                <button class="btn btn-lg w-100 rounded verify custom-gradient-button custom-button-shadow text-white" type="submit" id="verify-button">
                    <i class="fa-solid fa-plus me-2 text-white"></i> Buy Credits
                </button>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-md-3 mb-sm-5 mc-xs-3">
            <div class="normal-card h-100">
                <h1 style="color: rgba(0, 164, 128, 1);">10,000</h1>
                <span style="color: black;">Email Verification Credits</span>
                <h3 style="color: rgba(0, 0, 0, 1);font-weight: 700; font-family: poppins;">Only 37 USD</h3>
                <button class="btn btn-lg w-100 rounded verify custom-gradient-button custom-button-shadow text-white" type="submit" id="verify-button">
                    <i class="fa-solid fa-plus me-2 text-white"></i> Buy Credits
                </button>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-md-3 mb-sm-5 mc-xs-3">
            <div class="normal-card h-100">
                <h1 style="color: rgba(0, 164, 128, 1);">10,000</h1>
                <span style="color: black;">Email Verification Credits</span>
                <h3 style="color: rgba(0, 0, 0, 1);font-weight: 700; font-family: poppins;">Only 37 USD</h3>
                <button class="btn btn-lg w-100 rounded verify custom-gradient-button custom-button-shadow text-white" type="submit" id="verify-button">
                    <i class="fa-solid fa-plus me-2 text-white"></i> Buy Credits
                </button>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-md-3 mb-sm-5 mc-xs-3">
            <div class="normal-card h-100">
                <h1 style="color: rgba(0, 164, 128, 1);">10,000</h1>
                <span style="color: black;">Email Verification Credits</span>
                <h3 style="color: rgba(0, 0, 0, 1);font-weight: 700; font-family: poppins;">Only 37 USD</h3>
                <button class="btn btn-lg w-100 rounded verify custom-gradient-button custom-button-shadow text-white" type="submit" id="verify-button">
                    <i class="fa-solid fa-plus me-2 text-white"></i> Buy Credits
                </button>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-md-3 mb-sm-5 mc-xs-3">
            <div class="normal-card h-100">
                <h1 style="color: rgba(0, 164, 128, 1);">10,000</h1>
                <span style="color: black;">Email Verification Credits</span>
                <h3 style="color: rgba(0, 0, 0, 1);font-weight: 700; font-family: poppins;">Only 37 USD</h3>
                <button class="btn btn-lg w-100 rounded verify custom-gradient-button custom-button-shadow text-white" type="submit" id="verify-button">
                    <i class="fa-solid fa-plus me-2 text-white"></i> Buy Credits
                </button>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-md-3 mb-sm-5 mc-xs-3">
            <div class="normal-card h-100">
                <h1 style="color: rgba(0, 164, 128, 1);">10,000</h1>
                <span style="color: black;">Email Verification Credits</span>
                <h3 style="color: rgba(0, 0, 0, 1);font-weight: 700; font-family: poppins;">Only 37 USD</h3>
                <button class="btn btn-lg w-100 rounded verify custom-gradient-button custom-button-shadow text-white" type="submit" id="verify-button">
                    <i class="fa-solid fa-plus me-2 text-white"></i> Buy Credits
                </button>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-md-3 mb-sm-5 mc-xs-3">
            <div class="normal-card h-100">
                <h1 style="color: rgba(0, 164, 128, 1);">10,000</h1>
                <span style="color: black;">Email Verification Credits</span>
                <h3 style="color: rgba(0, 0, 0, 1);font-weight: 700; font-family: poppins;">Only 37 USD</h3>
                <button class="btn btn-lg w-100 rounded verify custom-gradient-button custom-button-shadow text-white" type="submit" id="verify-button">
                    <i class="fa-solid fa-plus me-2 text-white"></i> Buy Credits
                </button>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-md-3 mb-sm-5 ">
            <div class="normal-card h-100">
                <h1 style="color: rgba(0, 164, 128, 1);">10,000</h1>
                <span style="color: black;">Email Verification Credits</span>
                <h3 style="color: rgba(0, 0, 0, 1);font-weight: 700; font-family: poppins;">Only 37 USD</h3>
                <button class="btn btn-lg w-100 rounded verify custom-gradient-button custom-button-shadow text-white" type="submit" id="verify-button">
                    <i class="fa-solid fa-plus me-2 text-white"></i> Buy Credits
                </button>
            </div>
        </div>
        <div class="col-12 col-sm-6 col-md-4 col-lg-6 mb-md-3 mb-sm-5 mc-xs-3">
            <div class="normal-card h-100">
                <h1 style="color: rgba(0, 164, 128, 1);">10,000</h1>
                <span style="color: black;">Email Verification Credits</span>
                <h3 style="color: rgba(0, 0, 0, 1);font-weight: 700; font-family: poppins;">Only 37 USD</h3>
                <button class="btn btn-lg w-100 rounded verify custom-gradient-button custom-button-shadow text-white" type="submit" id="verify-button">
                    <i class="fa-solid fa-plus me-2 text-white"></i> Buy Credits
                </button>
            </div>
        </div>
    </div>
</div>



      

@endsection