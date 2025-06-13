@extends('layouts.app')

@section('content')
<style>
     .email-tag-input {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 8px; /* Space between tags */
        padding: 0.75rem 1rem; /* Adjust padding to match form-control-lg */
        min-height: calc(2.875rem + 2px); /* Roughly matches height of form-control-lg */
    }

    .email-tag-input .email-tag {
        display: inline-flex;
        align-items: center;
        background-color: #e2e6ea; /* Light gray background for tags */
        border-radius: 5px;
        padding: 0.2em 0.6em;
        font-size: 0.9em;
        line-height: 1;
        white-space: nowrap;
    }

    .email-tag-input .email-tag .remove-tag {
        margin-left: 8px;
        cursor: pointer;
        font-weight: bold;
        color: #6c757d; /* Darker gray for close icon */
    }

    .email-tag-input .email-input-field {
        flex-grow: 1;
        border: none;
        outline: none;
        background-color: transparent;
        padding: 0; /* Remove default input padding */
        font-size: 1rem; /* Match parent font size */
        height: auto; /* Allow input to grow with content if needed */
        min-width: 100px; /* Ensure input is wide enough even with many tags */
    }

    .email-tag-input .email-input-field::placeholder {
        color: #6c757d;
    }
    .file-drop-zone {
        min-height: 150px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        transition: background-color 0.3s ease;
    }
 
    .btn-custom{
        background-color:#00456F;
        color:white;
    }

    .card-custom {
        border: 1px solid #ced4da;
        border-top: 5px solid rgba(0, 164, 128, 1); /* Green border top for the highlighted line */
        border-radius: 0.5rem;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 800px; /* Adjust max-width as needed */
    }
    .card-header-custom-image-style { /* Custom class for header */
        background-color:rgba(240, 240, 240, 1); /* Green background from image */
        border-bottom: none; /* No border bottom */
        padding: 1rem 1.5rem;
        font-weight: bold;
        color: #ffffff; /* White text for header */
    }
    .card-header-custom-image-style .modal-title {
        font-weight: 700;
        color: rgba(0, 0, 0, 1) !important; /* Ensure title is white */
    }
    .card-header-custom-image-style .btn-close {
        filter: invert(1) grayscale(100%) brightness(200%); /* Make close button white */
    }
    .list-group-item-custom { /* Original class, keep if needed elsewhere */
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.75rem 1.5rem;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
    }
    .list-group-item-custom-no-border { /* New class for no bottom border */
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.75rem 1.5rem;
        border-bottom: none; /* Remove border */
    }
    .list-group-item-custom:last-child,
    .list-group-item-custom-no-border:last-child {
        border-bottom: none;
    }
    .status-badge {
        background-color: #d1e7dd; /* Light green */
        color:rgba(0, 164, 128, 1); /* Dark green text */
        padding: 0.35em 0.65em;
        border-radius: 0.375rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 0.3rem;
    }
    .status-badge.webmail {
        background-color: #e0f7fa; /* Light cyan */
        color: #006064; /* Dark cyan text */
    }
    .status-badge.invalid {
        background-color: #f8d7da; /* Light red */
        color: #721c24; /* Dark red */
    }
    .status-badge.undeliverable {
        background-color: #fce8e6; /* Light orange-red */
        color: #d84315; /* Orange-red */
    }
    .status-badge.disposable {
        background-color: #fff3cd; /* Light yellow */
        color: #856404; /* Dark yellow */
    }
    .status-badge.spam-trap {
        background-color: #ffe0b2; /* Light orange */
        color: #e65100; /* Dark orange */
    }
    .status-badge.role-based {
        background-color: #e3f2fd; /* Light blue */
        color: #1565c0; /* Dark blue */
    }
    .status-badge.catch-all {
        background-color: #ffe0b2; /* Light orange */
        color: #ef6c00; /* Dark orange */
    }
    .status-badge.unknown {
        background-color: #e0e0e0; /* Light grey */
        color: #424242; /* Dark grey */
    }
    .info-message-image-style { /* Custom class for info message */
        background-color: #e6ffed; /* Even lighter green from image */
        color: rgba(0, 164, 128, 1); /* Green text from image */
        border: 1px solid #b3e6c3; /* Border from image */
        border-radius: 0.375rem;
        padding: 0.75rem 1.25rem;
        margin: 1rem 1.5rem; /* Adjust margin as needed */
        font-size: 0.9rem;
        text-align: center;
    }
    .info-message-image-style a {
        color:rgba(0, 164, 128, 1);
        font-weight: bold;
        text-decoration: underline;
    }
</style>

<div class="content-body px-3 px-md-4 px-xl-5">
    <div class="my-4 text-start text-md-start">
        <h2 class="text-second"><strong class="text-first">Protect</strong> your email!</h2>
        <p class="p-tag">Send emails to real contacts only to protect your email reputation and increase the</p>
        <p class="p-tag">success of your campaigns.</p>
    </div>

    <div class="card-body shadow-lg rounded col-12 col-xl-8 card-border card-top-highlight ">
        <div class=" rounded button-four">
            <div class="row row-button justify-content-center flex-wrap">
                <div class="col-6 col-sm-auto mb-2 mb-sm-0">
                    <button class="btn tab-btn active" data-target="tab-single">
                        <i class="fa-solid fa-at"></i> SINGLE EMAIL
                    </button>
                </div>
                <div class="col-6 col-sm-auto mb-2 mb-sm-0">
                    <button class="btn tab-btn" data-target="tab-file">
                        <i class="fa-solid fa-file-arrow-up"></i> FILE UPLOAD
                    </button>
                </div>
                <div class="col-6 col-sm-auto">
                    <button class="btn tab-btn" data-target="tab-paste">
                        <i class="fa-solid fa-bars"></i> PASTE EMAIL LIST
                    </button>
                </div>
                <div class="col-6 col-sm-auto">
                    <button class="btn tab-btn" data-target="tab-integration">
                        <i class="fa-solid fa-gear"></i> INTEGRATION
                    </button>
                </div>
            </div>
        </div>

        <div class="tab-content">
            <div id="tab-single" class="tab-pane active mt-4 mt-sm-5">
                <div class="text-center mb-4">
                    <img src="{{asset('spamsharkadmin/images/custom/singleemail.png')}}" class="img-fluid" style="max-width: 450px;" alt="Email Verification Result Mockup">
                </div>
                <p class="text-center center lead">Enter an email address and click "Verify".</p>
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-10 col-md-8 col-lg-7 col-xl-6">
                        <form id="single-email-form" action="{{ route('single.verify') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input type="email" name="email" class="form-control form-control-lg rounded custom-input @error('email') is-invalid @enderror"
                                    placeholder="E.g. example@gmail.com" aria-label="Email address" required>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button id="verifyButton" class="btn btn-lg w-100 rounded verify text-white justify-content-center bg-primary"
                                type="submit">
                                {{-- We will dynamically update this span --}}
                                <span id="buttonContent">
                                    <i class="fa-solid fa-check-circle me-2 text-white"></i> Verify
                                </span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="modal fade" id="resultModal" tabindex="-1" aria-labelledby="resultModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered">
                    <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden card-custom">
                        <div class="modal-header py-3 card-header-custom-image-style">
                            <h5  class="modal-title fw-semibol  mt-xl-2" id="resultModalLabel">Email Verification Result</h5>
                            <button type="button" class="btn btn-outline-danger btn-md" data-bs-dismiss="modal">Close</button>
                        </div>
                        <div class="modal-body bg-white p-0">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item list-group-item-custom-no-border">
                                    <span >Email Address</span>
                                    <strong class="text-dark" id="modal-email"></strong>
                                </li>
                                <li class="list-group-item list-group-item-custom-no-border d-none">
                                    <span >Overall Status</span>
                                    <span id="modal-overall-status" class="status-badge"></span>
                                </li>
                                <li class="list-group-item list-group-item-custom-no-border">
                                    <span>Syntax Format</span>
                                    <btn id="modal-syntax" class="status-badge btn btn-outline-primary"></btn>
                                </li>
                                <li class="list-group-item list-group-item-custom-no-border">
                                    <span>Mailbox Server Status (SMTP)</span>
                                    <span id="modal-smtp" class="status-badge"></span>
                                </li>
                                <li class="list-group-item list-group-item-custom-no-border">
                                    <span>Catch-All Domain</span>
                                    <span id="modal-catch-all" class="status-badge"></span>
                                </li>
                                <li class="list-group-item list-group-item-custom-no-border">
                                    <span>SSL Enabled</span>
                                    <span id="modal-ssl" class="status-badge"></span>
                                </li>
                                <li class="list-group-item list-group-item-custom-no-border">
                                    <span>Disposable Email</span>
                                    <span id="modal-disposable" class="status-badge"></span>
                                </li>
                            </ul>
                            <div class="card-body">
                                <div class="info-message-image-style" id="status-info-message">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div id="tab-file" class="tab-pane mt-4 mt-sm-5">
                <div class="text-center mb-4 justify-content-center align-items-center">
                    <img src="{{asset('spamsharkadmin/images/custom/bulkemail.png')}}" class="img-fluid" style="max-width: 450px;" alt="Email Verification Result Mockup">
                </div>
             
              <div class="row justify-content-center">
    <div class="col-12 col-sm-10 col-md-8 col-lg-7 col-xl-6">
        <form action="{{ route('bulk.upload.verify') }}" method="POST" enctype="multipart/form-data" id="bulkUploadForm">
            @csrf
            <div class="mb-3 text-center">
              

                <div id="fileDropZone" class="file-drop-zone border border-2 border-dashed rounded p-5 mb-3 text-center">
                    <p class="text-muted mb-2">Drag & drop your file here, or</p>
                    <label for="email_csv" class="btn btn-md btn-custom d-inline-block">
                        <i class="fa-solid fa-cloud-arrow-up me-2"></i> Choose File
                    </label>
                    <input class="form-control d-none @error('email_csv') is-invalid @enderror"
                           type="file"
                           id="email_csv"
                           name="email_csv"
                           accept=".csv, .txt, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
                           required>
                    <p id="fileNameDisplay" class="mt-2 mb-0 text-truncate text-success" style="display: none;"></p>
                </div>
                {{-- Error message display --}}
                @error('email_csv')
                    <div class="invalid-feedback d-block mt-0"> {{-- d-block to ensure visibility --}}
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button class="btn btn-lg w-100 rounded verify custom-gradient-button custom-button-shadow text-white" type="submit" id="verify-button-file">
                <i class="fa-solid fa-plus me-2 text-white"></i> Process File
            </button>
        </form>
    </div>
</div>

            </div>

        <div id="tab-paste" class="tab-pane">
    <p class="text-center text-md-start lead mb-4 px-md-5" style="font-size: 19px;font-weight: 400;">
        @if(session('success'))
    <div class="alert alert-success mt-3">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger mt-3">
        {{ session('error') }}
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger mt-3">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        Enter an email address and hit **comma**, **Enter**, or **Return**. Once you've entered all emails, click "Start Verification".
    </p>
    <div class="col-12 col-md-9 col-lg-10 mx-auto">
        <div id="emailTagsContainer" class="form-control form-control-lg rounded email-tag-input" style="background-color: rgba(233, 235, 235, 1);">
   
            <input type="email" class="email-input-field" placeholder="E.g. oliver123@gmail.com, john_walter@gmail.com">
        </div>
        
    </div>
    <div class="row justify-content-center">
        <div class="col-12 col-sm-10 col-md-8 col-lg-7 col-xl-6 mt-3 mt-md-4">
           <form id="emailVerificationForm" action="{{ route('paste.verify') }}" method="POST">
                @csrf
                <input type="hidden" name="emails_to_verify" id="emailsToVerifyHidden">
                <button class="btn btn-lg w-100 rounded verify text-white" type="submit">
                    <i class="fa-solid fa-play me-2 text-white"></i> Start Verification
                </button>
            </form>
        </div>
    </div>
</div>

            <div id="tab-integration" class="tab-pane">
                <div class="d-flex flex-column justify-content-center align-items-center text-center mt-5" style="min-height: 300px;">
                    <span>
                        <i class="fa-solid fa-gears" style="font-size: 100px;color: black;"></i>
                    </span>
                    <p style="font-size: 48px; font-weight: 700; margin-top: 20px;">Coming Soon</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $('#single-email-form').on('submit', function(e) {
        e.preventDefault();

        const form = $(this);
        const url = form.attr('action');
        const formData = form.serialize();

        const verifyButton = $('#verifyButton');
        const buttonContent = $('#buttonContent'); // Now targets the span that holds text AND spinner

        $.ajax({
            url: url,
            method: 'POST',
            data: formData,
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            beforeSend: function() {
                // Change button content to spinner and "Verifying..."
                buttonContent.html('<span class="spinner-border spinner-border-sm me-2" role="status" aria-hidden="true"></span> Verifying...');
                verifyButton.prop('disabled', true); // Disable the button
            },
            success: function(response) {
                // Helper function to get class for badge based on text
                function getBadgeClass(text) {
                    if (!text) return 'status-badge unknown'; // Default for null/empty
                    const lowerText = text.toLowerCase();
                    if (lowerText.includes('safe') || lowerText.includes('enabled') || lowerText.includes('not catch-all') || lowerText.includes('deliverable') || lowerText.includes('valid')) {
                        return 'status-badge'; // Default green (for valid/safe)
                    } else if (lowerText.includes('invalid') || lowerText.includes('undeliverable') || lowerText.includes('connection failed')) {
                        return 'status-badge invalid';
                    } else if (lowerText.includes('disposable')) {
                        return 'status-badge disposable';
                    } else if (lowerText.includes('spam trap')) {
                        return 'status-badge spam-trap';
                    } else if (lowerText.includes('role-based')) {
                        return 'status-badge role-based';
                    } else if (lowerText.includes('catch-all') || lowerText.includes('inbox full')) {
                        return 'status-badge catch-all';
                    } else if (lowerText.includes('unknown') || lowerText.includes('no mx')) {
                        return 'status-badge unknown';
                    }
                    return 'status-badge'; // Fallback
                }

                // Fill modal values dynamically
                $('#modal-email').text(response.email);
                
                $('#modal-syntax').text(response.syntax).attr('class', getBadgeClass(response.syntax));
                $('#modal-smtp').text(response.smtp).attr('class', getBadgeClass(response.smtp));
                $('#modal-catch-all').text(response.catch_all).attr('class', getBadgeClass(response.catch_all));
                $('#modal-ssl').text(response.ssl).attr('class', getBadgeClass(response.ssl));
                $('#modal-disposable').text(response.disposable ? response.disposable : 'Not Disposable').attr('class', getBadgeClass(response.disposable));
                // Assuming you might have a spam_trap field in response
                $('#modal-spam-trap').text(response.spam_trap ? response.spam_trap : 'Not Spam Trap').attr('class', getBadgeClass(response.spam_trap));
                

                // Dynamically update the info message based on overall status
                let infoMessage = '';
                const overallStatus = response.status.toLowerCase();

                if (overallStatus.includes('safe') || overallStatus.includes('valid') || overallStatus.includes('deliverable')) {
                    infoMessage = 'This email address is **safe** and deliverable. You can confidently send emails to this address.';
                } else if (overallStatus.includes('invalid') || overallStatus.includes('undeliverable')) {
                    infoMessage = 'This email address is **invalid** or undeliverable. Sending emails to this address may harm your sender reputation.';
                } else if (overallStatus.includes('disposable')) {
                    infoMessage = 'This is a **disposable email address**. It is often used for temporary sign-ups and not recommended for long-term communication.';
                } else if (overallStatus.includes('spam trap')) {
                    infoMessage = 'This email address is a **spam trap**. Sending emails to it can severely damage your sender reputation.';
                } else if (overallStatus.includes('role-based')) {
                    infoMessage = 'This is a **role-based email address** (e.g., info@, admin@). These are generally not meant for personalized communication.';
                } else if (overallStatus.includes('catch-all')) {
                    infoMessage = 'This domain is a **catch-all**. While the email might be valid, it\'s difficult to determine if a specific inbox exists, increasing bounce risk.';
                } else if (overallStatus.includes('unknown') || overallStatus.includes('no mx')) {
                    infoMessage = 'The status of this email address is **unknown** or the domain has no MX records. Exercise caution when sending emails.';
                } else {
                    infoMessage = 'Email verification status: ' + response.status + '.';
                }

                $('#status-info-message').html(infoMessage + ' <a href="#">More information on Email Statuses.</a>');

                // Show modal
                $('#resultModal').modal('show');
            },
            error: function(xhr) {
                console.error("Error during AJAX call:", xhr);
                alert('Something went wrong. Please try again. Check console for more details.');
            },
            complete: function() {
                // Reset button content to original state and enable button
                buttonContent.html('<i class="fa-solid fa-check-circle me-2 text-white"></i> Verify');
                verifyButton.prop('disabled', false);
            }
        });
    });

    $('.btn-close, .btn-outline-danger').on('click', function() {
        $('#resultModal').modal('hide');
    });

    // Tab switching logic (keep existing)
    $('.tab-btn').on('click', function() {
        $('.tab-btn').removeClass('active');
        $(this).addClass('active');
        $('.tab-pane').removeClass('active');
        $($(this).data('target')).addClass('active');
    });
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const fileDropZone = document.getElementById('fileDropZone');
    const fileInput = document.getElementById('email_csv');
    const fileNameDisplay = document.getElementById('fileNameDisplay');
    const verifyButton = document.getElementById('verify-button-file');

    // Prevent default drag behaviors
    ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
        fileDropZone.addEventListener(eventName, preventDefaults, false);
        // Also for the body to prevent opening file in browser when dragged outside the drop zone
        document.body.addEventListener(eventName, preventDefaults, false);
    });

    function preventDefaults(e) {
        e.preventDefault();
        e.stopPropagation();
    }

    // Highlight drop zone when dragging over
    ['dragenter', 'dragover'].forEach(eventName => {
        fileDropZone.addEventListener(eventName, () => fileDropZone.classList.add('drag-over'), false);
    });

    ['dragleave', 'drop'].forEach(eventName => {
        fileDropZone.addEventListener(eventName, () => fileDropZone.classList.remove('drag-over'), false);
    });

    // Handle dropped files
    fileDropZone.addEventListener('drop', handleDrop, false);

    function handleDrop(e) {
        const dt = e.dataTransfer;
        const files = dt.files;
        handleFiles(files);
    }

    // Handle file input change (when "Choose File" is clicked)
    fileInput.addEventListener('change', function() {
        handleFiles(this.files);
    });

    function handleFiles(files) {
        if (files.length > 0) {
            const file = files[0];
            const allowedExtensions = ['.csv', '.txt', '.xlsx', '.xls']; // Added .xls for older Excel files
            const allowedMimeTypes = [
                'text/csv',
                'text/plain',
                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', // .xlsx
                'application/vnd.ms-excel' // .xls
            ];

            let isValidType = false;
            // Check by MIME type first if available
            if (file.type && allowedMimeTypes.includes(file.type)) {
                isValidType = true;
            } else { // Fallback to extension check if MIME type is generic or missing
                const fileExtension = '.' + file.name.split('.').pop().toLowerCase();
                if (allowedExtensions.includes(fileExtension)) {
                    isValidType = true;
                }
            }

            if (!isValidType) {
                fileNameDisplay.textContent = 'Invalid file type. Please upload .txt, .csv, or .xlsx.';
                fileNameDisplay.style.color = 'red';
                fileInput.value = ''; // Clear the input
                verifyButton.disabled = true; // Disable the submit button
                fileNameDisplay.style.display = 'block'; // Ensure message is visible
                return;
            }

            fileInput.files = files; // Assign files to the hidden input
            fileNameDisplay.textContent = `Selected: ${file.name}`;
            fileNameDisplay.style.color = 'green';
            fileNameDisplay.style.display = 'block';
            verifyButton.disabled = false; // Enable button if valid file selected
        } else {
            fileNameDisplay.textContent = '';
            fileNameDisplay.style.display = 'none';
            verifyButton.disabled = true; // Disable if no file
        }
    }

    // Initial state: disable button if no file selected by default when page loads
    if (fileInput.files.length === 0) {
        verifyButton.disabled = true;
    }
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const emailTagsContainer = document.getElementById('emailTagsContainer');
    const emailInputField = emailTagsContainer.querySelector('.email-input-field');
    const emailsToVerifyHidden = document.getElementById('emailsToVerifyHidden');
    const emailVerificationForm = document.getElementById('emailVerificationForm');

    let emailTags = []; // Array to store current email addresses

    // Function to update the hidden input field
    function updateHiddenInput() {
        emailsToVerifyHidden.value = emailTags.join(',');
    }

    // Function to render tags
    function renderTags() {
        // Clear existing tags (except the input field)
        const existingTags = emailTagsContainer.querySelectorAll('.email-tag');
        existingTags.forEach(tag => tag.remove());

        // Add tags to the container before the input field
        emailTags.forEach(email => {
            const tagDiv = document.createElement('div');
            tagDiv.classList.add('email-tag');
            tagDiv.innerHTML = `
                <span>${email}</span>
                <span class="remove-tag" data-email="${email}">&times;</span>
            `;
            emailTagsContainer.insertBefore(tagDiv, emailInputField);
        });

        updateHiddenInput();
    }

    // Handle input field key presses
    emailInputField.addEventListener('keydown', function(event) {
        if (event.key === 'Enter' || event.key === ',' || event.key === ' ') { // Space also triggers tag creation
            event.preventDefault(); // Prevent default form submission or adding space
            const email = this.value.trim();
            if (email && !emailTags.includes(email)) {
                // Basic email validation regex
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (emailRegex.test(email)) {
                    emailTags.push(email);
                    this.value = ''; // Clear input field
                    renderTags();
                } else {
                    // Optionally provide visual feedback for invalid email
                    this.style.borderColor = 'red';
                    setTimeout(() => {
                        this.style.borderColor = ''; // Reset after a short delay
                    }, 1000);
                }
            } else {
                this.value = ''; // Clear input even if empty or duplicate
            }
        } else if (event.key === 'Backspace' && this.value === '' && emailTags.length > 0) {
            // Remove last tag on backspace if input is empty
            emailTags.pop();
            renderTags();
        }
    });

    // Handle click on remove tag icon
    emailTagsContainer.addEventListener('click', function(event) {
        if (event.target.classList.contains('remove-tag')) {
            const emailToRemove = event.target.dataset.email;
            emailTags = emailTags.filter(email => email !== emailToRemove);
            renderTags();
        }
    });

    // Handle form submission to ensure hidden input is updated
    emailVerificationForm.addEventListener('submit', function() {
        // Ensure any unsaved text in the input field is added as a tag
        const email = emailInputField.value.trim();
        if (email && !emailTags.includes(email)) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (emailRegex.test(email)) {
                emailTags.push(email);
                renderTags(); // Re-render to include the last email before submission
            }
        }
        updateHiddenInput(); // Final update to ensure the hidden input is current
    });

    // Initialize the hidden input on load
    updateHiddenInput();
});
</script>

  <script>
document.addEventListener('DOMContentLoaded', function () {
    const inputField = document.querySelector('.email-input-field');
    const container = document.getElementById('emailTagsContainer');
    const hiddenInput = document.getElementById('emailsToVerifyHidden');
    let emailList = [];

    function createTag(email) {
        const tag = document.createElement('span');
        tag.className = 'badge bg-secondary me-1 mb-1';
        tag.textContent = email;

        const close = document.createElement('span');
        close.textContent = ' ×';
        close.style.cursor = 'pointer';
        close.style.marginLeft = '6px';
        close.onclick = function () {
            container.removeChild(tag);
            emailList = emailList.filter(e => e !== email);
            updateHiddenInput();
        };

        tag.appendChild(close);
        container.insertBefore(tag, inputField);
    }

    function updateHiddenInput() {
        hiddenInput.value = emailList.join(',');
    }

    function processInput(value) {
        const emails = value.split(/[\s,;\n\r]+/);
        emails.forEach(email => {
            email = email.trim();
            if (email && validateEmail(email) && !emailList.includes(email)) {
                emailList.push(email);
                createTag(email);
            }
        });
        inputField.value = '';
        updateHiddenInput();
    }

    inputField.addEventListener('keydown', function (e) {
        if (e.key === 'Enter' || e.key === ',' || e.key === 'Tab') {
            e.preventDefault();
            processInput(inputField.value);
        }
    });

    function validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email.toLowerCase());
    }
});
</script>


@endsection