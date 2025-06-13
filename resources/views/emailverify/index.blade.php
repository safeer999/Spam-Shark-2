@extends('layouts.app')

@section('content')
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            margin-top: 2rem;
            box-shadow: 0 .125rem .25rem rgba(0,0,0,.075);
        }
        .list-group-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .status-badge {
            font-weight: normal;
        }
        .list-group-item{
            font-size: 14px
        }
        /* Custom badge styles for various statuses */
        .badge.bg-success-custom {
            background: rgba(150, 226, 37, 0.288) !important;
            color: green !important;
        }
        .badge.bg-danger-custom {
            background: rgba(255, 0, 0, 0.2) !important;
            color: red !important;
        }
        .badge.bg-warning-custom {
            background: rgba(255, 165, 0, 0.2) !important;
            color: orange !important;
        }
        .badge.bg-info-custom {
            background: rgba(0, 123, 255, 0.2) !important;
            color: blue !important;
        }
        .badge.bg-secondary-custom {
            background: rgba(108, 117, 125, 0.2) !important;
            color: grey !important;
        }
        /* Add some specific styles for the check/times icons */
        .status-badge .fas.fa-check {
            color: green;
        }
        .status-badge .fas.fa-times {
            color: red;
        }
        .status-badge .fas.fa-question {
            color: grey;
        }
        .status-badge .fas.fa-user-tag {
            color: blue; /* For role-based */
        }
        .status-badge .fas.fa-lock {
            color: green; /* For SSL enabled */
        }
        .status-badge .fas.fa-unlock {
            color: red; /* For SSL not enabled */
        }
    </style>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-xl-6">
                @if (isset($result))
                    {{-- Define a variable for "email is active and reachable" condition --}}
                    @php
                        $isOverallEmailActiveAndReachable = (
                            $result['syntax'] === '✅ Safe' &&
                            $result['ssl'] === '✅ SSL Enabled' &&
                            !$result['disposable'] && // null means 'No' for disposable
                            $result['catch_all'] === '✅ Not Catch-All' &&
                            !$result['role_based'] // null means 'No' for role-based
                            // SMTP check is intentionally skipped as per instruction for this overall status
                        );

                        // Determine the text and badge class for the "Email Status" badge based on the overall condition
                        $emailStatusText = $isOverallEmailActiveAndReachable ? '✅ Active & Reachable' : '⚠️ Has Issues';
                        $emailStatusBadgeClass = $isOverallEmailActiveAndReachable ? 'bg-success-custom' : 'bg-danger-custom';
                    @endphp

                    <div class="card">
                        <div class="card-header bg-light pt-3 pb-3">
                            <h5 class="mb-0">Email Verification Result</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item py-3">
                                Email Address
                                <div>
                                    <a href="mailto:{{ $result['email'] }}" class="text-decoration-none">{{ $result['email'] }}</a>
                                </div>
                            </li>
                            <li class="list-group-item py-3">
                                Email Status
                                <div>
                                    <i class="fas fa-info-circle text-info me-2" data-bs-toggle="tooltip" data-bs-placement="top" title="More info on Email Statuses"></i>
                                    {{-- The "Email Status" badge now uses your custom logic --}}
                                    <span class="badge {{ $emailStatusBadgeClass }} status-badge">
                                        {{ $emailStatusText }}
                                    </span>
                                </div>
                            </li>
                            <li class="list-group-item py-3">
                                Email Syntax Format
                                <div>
                                    <span class="badge {{ $result['syntax'] === '✅ Safe' ? 'bg-success-custom' : 'bg-danger-custom' }} status-badge">
                                        <i class="fas {{ $result['syntax'] === '✅ Safe' ? 'fa-check' : 'fa-times' }} me-1"></i>{{ str_replace(['✅ ', '❌ '], '', $result['syntax']) }}
                                    </span>
                                </div>
                            </li>
                            <li class="list-group-item py-3">
                                Mailbox Server Status (SMTP)
                                <div>
                                    <span class="badge {{
                                        $result['smtp'] === '📥 Deliverable' ? 'bg-success-custom' :
                                        ($result['smtp'] === '🚫 Undeliverable' || $result['smtp'] === '🚫 Connection Failed' || $result['smtp'] === '🚫 SMTP Fail' ? 'bg-danger-custom' :
                                        ($result['smtp'] === '📥 Inbox Full' ? 'bg-warning-custom' : 'bg-secondary-custom'))
                                    }} status-badge">
                                        <i class="fas {{ $result['smtp'] === '📥 Deliverable' ? 'fa-check' : ($result['smtp'] === '🚫 Undeliverable' || $result['smtp'] === '🚫 Connection Failed' || $result['smtp'] === '🚫 SMTP Fail' ? 'fa-times' : 'fa-question') }} me-1"></i>{{ $result['smtp'] }}
                                    </span>
                                </div>
                            </li>
                            <li class="list-group-item py-3">
                                Catch-All Status
                                <div>
                                    <span class="badge {{
                                        $result['catch_all'] === '🟠 Catch-All' ? 'bg-warning-custom' :
                                        ($result['catch_all'] === '✅ Not Catch-All' ? 'bg-success-custom' : 'bg-secondary-custom')
                                    }} status-badge">
                                        {{ $result['catch_all'] }}
                                    </span>
                                </div>
                            </li>
                            <li class="list-group-item py-3">
                                Disposable Email
                                <div>
                                    <span class="badge {{ $result['disposable'] ? 'bg-danger-custom' : 'bg-success-custom' }} status-badge">
                                        <i class="fas {{ $result['disposable'] ? 'fa-times' : 'fa-check' }} me-1"></i>{{ $result['disposable'] ? 'Yes' : 'No' }}
                                    </span>
                                </div>
                            </li>
                            <li class="list-group-item py-3">
                                Spam Trap
                                <div>
                                    <span class="badge {{ $result['spam_trap'] ? 'bg-danger-custom' : 'bg-success-custom' }} status-badge">
                                        <i class="fas {{ $result['spam_trap'] ? 'fa-times' : 'fa-check' }} me-1"></i>{{ $result['spam_trap'] ? 'Yes' : 'No' }}
                                    </span>
                                </div>
                            </li>
                            <li class="list-group-item py-3">
                                Role-Based Email
                                <div>
                                    <span class="badge {{ $result['role_based'] ? 'bg-info-custom' : 'bg-success-custom' }} status-badge">
                                        <i class="fas {{ $result['role_based'] ? 'fa-user-tag' : 'fa-check' }} me-1"></i>{{ $result['role_based'] ? 'Yes' : 'No' }}
                                    </span>
                                </div>
                            </li>
                            <li class="list-group-item py-3">
                                SSL Enabled
                                <div>
                                    <span class="badge {{ $result['ssl'] === '✅ SSL Enabled' ? 'bg-success-custom' : 'bg-danger-custom' }} status-badge">
                                        <i class="fas {{ $result['ssl'] === '✅ SSL Enabled' ? 'fa-lock' : 'fa-unlock' }} me-1"></i>{{ str_replace(['✅ ', '❌ '], '', $result['ssl']) }}
                                    </span>
                                </div>
                            </li>
                            <li class="list-group-item py-3">
                                Domain
                                <div>
                                    <span>{{ explode('@', $result['email'])[1] }}</span>
                                </div>
                            </li>
                            <li class="list-group-item py-3">
                                Verification Timestamp
                                <div>
                                    <span>{{ $result['timestamp'] }}</span>
                                </div>
                            </li>
                        </ul>
                        <div class="card-footer {{ $isOverallEmailActiveAndReachable ? 'bg-success-subtle border-success text-success' : 'bg-danger-subtle border-danger text-danger' }} py-3">
                            <i class="fas fa-exclamation-circle me-2"></i>
                            @if($isOverallEmailActiveAndReachable)
                                Email is active and reachable.
                            @else
                                This email might have issues.
                            @endif
                            <a href="#" class="alert-link {{ $isOverallEmailActiveAndReachable ? 'text-success' : 'text-danger' }} text-decoration-none">More information on Email Statuses.</a>
                        </div>
                    </div>
                @else
                    {{-- This block displays when no result is available (e.g., initial page load) --}}
                    <div class="card">
                        <div class="card-header bg-light pt-3 pb-3">
                            <h5 class="mb-0">Single Email Verification</h5>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Enter an email address to verify its status.</p>
                            {{-- You would place your form here, e.g.: --}}
                            {{-- <form action="{{ route('verify.email.submit') }}" method="POST">
                                @csrf
                                <div class="input-group mb-3">
                                    <input type="email" name="email" class="form-control" placeholder="Enter email to verify" required>
                                    <button class="btn btn-primary" type="submit">Verify</button>
                                </div>
                                @error('email')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </form> --}}
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-xl-6"></div>
        </div>
    </div>

    <script>
        // Initialize Bootstrap tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
@endsection