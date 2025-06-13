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
    
	  <!-- START Previous template all css  -->

		<link href="{{asset('admin6css/custom.css')}}" rel="stylesheet" />
        
 <link href="{{asset('spamsharkadmin/plugins/tables/css/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet">



   
   
	


	<!-- ================== BEGIN core-css ==================
	 -->
	

	<!-- End Previous template all css  -->

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
      <!-- BEGIN #header -->
	@include('layouts.components.top_header')
		<!-- END #header -->
        <!--**********************************
            Nav header end
        ***********************************-->

        <!--**********************************
            Header start
        ***********************************-->
       
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
      <!-- BEGIN #sidebar -->
	@include('layouts.components.sidebar')
		<!-- END #sidebar -->
        <!--**********************************
            Sidebar end
        ***********************************-->

        <!--**********************************
            Content body start
        ***********************************-->
   <div class="content-body ">


    	@yield('content')
		
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

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const newPasswordField = document.getElementById('password');
        const confirmPasswordField = document.getElementById('password_confirmation');
        const passwordRequirements = document.getElementById('password-requirements');
        const confirmPasswordMatch = document.getElementById('confirm-password-match');

        const lengthCheck = document.getElementById('length-check');
        const uppercaseCheck = document.getElementById('uppercase-check');
        const lowercaseCheck = document.getElementById('lowercase-check');
        const numberCheck = document.getElementById('number-check');
        const specialCheck = document.getElementById('special-check');

        function updateRequirement(element, isValid) {
            const icon = element.querySelector('i');
            if (isValid) {
                icon.classList.remove('fa-times', 'text-danger');
                icon.classList.add('fa-check', 'text-success');
            } else {
                icon.classList.remove('fa-check', 'text-success');
                icon.classList.add('fa-times', 'text-danger');
            }
        }

        function checkPasswordRequirements() {
            const password = newPasswordField.value;

            // Length
            const hasLength = password.length >= 8;
            updateRequirement(lengthCheck, hasLength);

            // Uppercase
            const hasUppercase = /[A-Z]/.test(password);
            updateRequirement(uppercaseCheck, hasUppercase);

            // Lowercase
            const hasLowercase = /[a-z]/.test(password);
            updateRequirement(lowercaseCheck, hasLowercase);

            // Number
            const hasNumber = /[0-9]/.test(password);
            updateRequirement(numberCheck, hasNumber);

            // Special Character (Common special characters)
            const hasSpecial = /[!@#$%^&*()]/.test(password);
            updateRequirement(specialCheck, hasSpecial);
        }

        function checkConfirmPassword() {
            const password = newPasswordField.value;
            const confirmPassword = confirmPasswordField.value;
            const passwordsMatch = password === confirmPassword && confirmPassword !== '';

            const icon = confirmPasswordMatch.querySelector('i');
            if (passwordsMatch) {
                icon.classList.remove('fa-times', 'text-danger');
                icon.classList.add('fa-check', 'text-success');
                confirmPasswordMatch.textContent = 'Passwords match'; // Update text
            } else {
                icon.classList.remove('fa-check', 'text-success');
                icon.classList.add('fa-times', 'text-danger');
                confirmPasswordMatch.textContent = 'Passwords do not match'; // Update text
            }
        }

        newPasswordField.addEventListener('input', function() {
            checkPasswordRequirements();
            checkConfirmPassword(); // Also check confirm password when new password changes
        });

        confirmPasswordField.addEventListener('input', checkConfirmPassword);

        // Initial checks on page load (if fields might have pre-filled values)
        checkPasswordRequirements();
        checkConfirmPassword();
    });
</script>
 <script src="{{asset('spamsharkadmin/plugins/tables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('spamsharkadmin/plugins/tables/js/datatable/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('spamsharkadmin/plugins/tables/js/datatable-init/datatable-basic.min.js')}}"></script>
  
 
    <script>
document.addEventListener('DOMContentLoaded', function() {
    function startCountdown(durationInSeconds, displayElementId) {
        let timer = durationInSeconds;
        const display = document.getElementById(displayElementId);

        if (!display) {
            console.error('Timer display element not found:', displayElementId);
            return;
        }

        // Get the span elements within the timer display
        const hoursSpan = display.querySelector('[data-unit="h"]');
        const minutesSpan = display.querySelector('[data-unit="m"]');
        const secondsSpan = display.querySelector('[data-unit="s"]');
        const msSpan = display.querySelector('[data-unit="ms"]');

        let interval = setInterval(function() {
            if (timer < 0) {
                clearInterval(interval);
                display.innerHTML = 'Expired!'; // Or any other message
                return;
            }

            const hours = Math.floor(timer / 3600);
            const minutes = Math.floor((timer % 3600) / 60);
            const seconds = Math.floor(timer % 60);

            // Simulate milliseconds (since actual JS timers aren't precise enough for true ms countdown)
            // This will give a single last digit that changes every 100ms
            const millisecondsDigit = Math.floor((performance.now() / 100) % 10);

            function updateAndAnimate(span, newValue) {
                const currentValue = span.textContent;
                const newFormattedValue = newValue.toString().padStart(2, '0'); // Pad with 0 for h, m, s

                if (currentValue !== newFormattedValue) {
                    span.textContent = newFormattedValue;
                    span.classList.add('changed');
                    // Remove animation class after it completes
                    span.addEventListener('animationend', () => {
                        span.classList.remove('changed');
                    }, { once: true });
                }
            }

            // Update hours, minutes, seconds
            updateAndAnimate(hoursSpan, hours);
            updateAndAnimate(minutesSpan, minutes);
            updateAndAnimate(secondsSpan, seconds);

            // Milliseconds digit (doesn't need padding)
            const currentMs = msSpan.textContent;
            const newMs = millisecondsDigit.toString();
            if (currentMs !== newMs) {
                msSpan.textContent = newMs;
                msSpan.classList.add('changed');
                msSpan.addEventListener('animationend', () => {
                    msSpan.classList.remove('changed');
                }, { once: true });
            }


            timer--; // Decrement the main timer every second
        }, 1000); // Update every second
    }

    // --- How to use it ---
    // Calculate your end time: e.g., 3 hours, 16 minutes, 27 seconds from now
    // Get the current time
    const now = new Date();
    // Set the end time (e.g., 3 hours 16 minutes 27 seconds from a specific point)
    // For demonstration, let's set an end time 3 hours, 16 minutes, 27 seconds from when the page loads
    const initialHours = 3;
    const initialMinutes = 16;
    const initialSeconds = 27;

    const totalDurationInSeconds = (initialHours * 3600) + (initialMinutes * 60) + initialSeconds;

    // Start the countdown for the "Extra Verification Credits" card
    startCountdown(totalDurationInSeconds, 'extraVerificationTimer');

    // If you have other timers, call startCountdown for each one with its own ID and duration
    // startCountdown(anotherDuration, 'anotherTimerId');
});
</script>
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
<script>
  document.getElementById('verify-form').addEventListener('submit', function (e) {
    e.preventDefault();

    const email = document.getElementById('email-input').value;
    document.getElementById('modal-email').textContent = email;

    // Simulate API verification (you can replace this part with real fetch)
    // Show modal with sample data
    const modal = new bootstrap.Modal(document.getElementById('resultModal'));
    modal.show();
  });
</script>




    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#taskTable').DataTable();
        });
    </script>





  <script>
        // Select all card items
        const allCardItems = document.querySelectorAll('.card-item');
        const totalCards = allCardItems.length;
        let cardsPerPage = parseInt(document.getElementById('cards-per-page-select').value); // Initial value from select
        let currentPage = 1;

        // Store Chart instances to destroy them if needed for dynamic updates
        const charts = {};

        function createDonutChart(canvasId, dataValues) {
            const ctx = document.getElementById(canvasId);
            if (!ctx) return;

            const totalEmails = dataValues.reduce((sum, val) => sum + val, 0);

            if (charts[canvasId]) {
                charts[canvasId].destroy();
            }

            const newChart = new Chart(ctx.getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Deliverable', 'Undeliverable', 'Catch-all', 'Unknown'],
                    datasets: [{
                        data: dataValues,
                        backgroundColor: ['#8bc34a', '#f4511e', '#fbc02d', '#607d8b'],
                        borderWidth: 0,
                        cutout: '70%',
                    }]
                },
                options: {
                    responsive: false,
                    plugins: {
                        legend: { display: false },
                        tooltip: {
                            enabled: true,
                            callbacks: {
                                label: function(context) {
                                    const label = context.label || '';
                                    const value = context.parsed || 0;
                                    const percentage = ((value / totalEmails) * 100).toFixed(2);
                                    return label + ': ' + value + ' (' + percentage + '%)';
                                }
                            }
                        }
                    },
                    cutoutPercentage: 70,
                }
            });
            charts[canvasId] = newChart;
        }

        function showPageCards() {
            let actualCardsPerPage = cardsPerPage === 'all' ? totalCards : cardsPerPage;
            const startIndex = (currentPage - 1) * actualCardsPerPage;
            const endIndex = startIndex + actualCardsPerPage;

            allCardItems.forEach((card, index) => {
                if (index >= startIndex && index < endIndex) {
                    card.classList.remove('hidden');
                    const deliverable = parseInt(card.dataset.deliverable);
                    const undeliverable = parseInt(card.dataset.undeliverable);
                    const catchall = parseInt(card.dataset.catchall);
                    const unknown = parseInt(card.dataset.unknown);
                    const canvasId = `donutChart-${index}`;
                    createDonutChart(canvasId, [deliverable, undeliverable, catchall, unknown]);
                } else {
                    card.classList.add('hidden');
                    const canvasId = `donutChart-${index}`;
                    if (charts[canvasId]) {
                        charts[canvasId].destroy();
                        delete charts[canvasId];
                    }
                }
            });
            updatePaginationInfo(); // Update the "1-5 of 5" text
            updatePaginationButtons();
        }

        function updatePaginationInfo() {
            let actualCardsPerPage = cardsPerPage === 'all' ? totalCards : cardsPerPage;
            const startIndex = (currentPage - 1) * actualCardsPerPage;
            const endIndex = Math.min(startIndex + actualCardsPerPage, totalCards);

            const paginationInfoSpan = document.getElementById('pagination-info');
            if (totalCards === 0) {
                paginationInfoSpan.textContent = `0-0 of 0`;
            } else {
                paginationInfoSpan.textContent = `${startIndex + 1}-${endIndex} of ${totalCards}`;
            }

            // Hide/show pagination prev/next buttons if "All" is selected
            const paginationNav = document.querySelector('.pagination');
            if (cardsPerPage === 'all') {
                paginationNav.style.display = 'none';
            } else {
                paginationNav.style.display = 'flex'; // Use flex to center with justify-content-center
            }
        }


        function updatePaginationButtons() {
            let actualCardsPerPage = cardsPerPage === 'all' ? totalCards : cardsPerPage;
            const totalPages = Math.ceil(totalCards / actualCardsPerPage);
            const prevBtn = document.getElementById('prev-page-btn');
            const nextBtn = document.getElementById('next-page-btn');

            if (prevBtn) {
                if (currentPage <= 1) {
                    prevBtn.classList.add('disabled');
                } else {
                    prevBtn.classList.remove('disabled');
                }
            }

            if (nextBtn) {
                if (currentPage >= totalPages) {
                    nextBtn.classList.add('disabled');
                } else {
                    nextBtn.classList.remove('disabled');
                }
            }
        }

        document.addEventListener('DOMContentLoaded', () => {
            showPageCards(); // Show the first page of cards initially

            document.getElementById('cards-per-page-select').addEventListener('change', (e) => {
                const newCardsPerPage = e.target.value;
                if (newCardsPerPage === 'all') {
                    cardsPerPage = 'all';
                } else {
                    cardsPerPage = parseInt(newCardsPerPage);
                }
                currentPage = 1; // Reset to first page whenever cards per page changes
                showPageCards();
            });

            document.getElementById('prev-page-btn').addEventListener('click', (e) => {
                e.preventDefault();
                if (currentPage > 1) {
                    currentPage--;
                    showPageCards();
                }
            });

            document.getElementById('next-page-btn').addEventListener('click', (e) => {
                e.preventDefault();
                let actualCardsPerPage = cardsPerPage === 'all' ? totalCards : cardsPerPage;
                const totalPages = Math.ceil(totalCards / actualCardsPerPage);
                if (currentPage < totalPages) {
                    currentPage++;
                    showPageCards();
                }
            });
        });
    </script>
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</body>

</html>