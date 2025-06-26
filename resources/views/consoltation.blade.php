<section class="consultation_section">
    <div class="container">
        <!-- Alert messages -->
        <div class="alert alert-success" id="successAlert" style="display: none;">
            <button type="button" class="alert-close" onclick="closeAlert('successAlert')">&times;</button>
            <span id="successMessage"></span>
        </div>

        <div class="alert alert-error" id="errorAlert" style="display: none;">
            <button type="button" class="alert-close" onclick="closeAlert('errorAlert')">&times;</button>
            <span id="errorMessage"></span>
        </div>

        <div class="row position-relative" data-aos="fade-up">
            <div class="col-lg-7 col-md-12 col-sm-12 col-12">
                <div class="consultation_content">
                    <h6>Book a consultation</h6>
                    <h2>Schedule Your Visit to Gibmarnel Today!</h2>
                    <p class="text-white mb-4">Whether you're looking for a new puppy, need professional training,
                        or want breeding consultation, we're here to help. Book your appointment to discuss your
                        specific needs with our experienced team.</p>

                    <form id="consultationForm">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group mb-0">
                                    <label class="text-white">Your Name: <span class="text-danger">*</span></label>
                                    <input type="text" name="fname" id="fname" class="form-control"
                                        placeholder="Ex. John Andrew" required>
                                    <div class="invalid-feedback" id="fname-error"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group mb-0 form_style">
                                    <label class="text-white">Phone number: <span class="text-danger">*</span></label>
                                    <input type="text" name="phone" id="phonenum" class="form-control"
                                        placeholder="+ 254 712 345 678" required>
                                    <div class="invalid-feedback" id="phone-error"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group mb-0">
                                    <label class="text-white">Email Address: <span class="text-danger">*</span></label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        placeholder="john@example.com" required>
                                    <div class="invalid-feedback" id="email-error"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group mb-0 form_style">
                                    <label class="text-white">Dog's Age (if applicable):</label>
                                    <select name="dog_age" id="dog_age" class="form-control">
                                        <option value="">Select Age Range</option>
                                        <option value="puppy">Puppy (0-6 months)</option>
                                        <option value="young">Young (6 months - 2 years)</option>
                                        <option value="adult">Adult (2-7 years)</option>
                                        <option value="senior">Senior (7+ years)</option>
                                        <option value="looking">Looking for a puppy</option>
                                    </select>
                                    <div class="invalid-feedback" id="dog_age-error"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group mb-0">
                                    <label class="text-white">Preferred Date: <span class="text-danger">*</span></label>
                                    <input type="date" name="date" id="birthdate" class="calender form-control"
                                        required>
                                    <div class="invalid-feedback" id="date-error"></div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group mb-0 form_style">
                                    <label class="text-white">Preferred Time: <span class="text-danger">*</span></label>
                                    <input type="time" name="time" id="clock" class="clock form-control"
                                        required>
                                    <div class="invalid-feedback" id="time-error"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group mb-0">
                                    <label class="text-white">Service Interest: <span
                                            class="text-danger">*</span></label>
                                    <select name="service" id="service" class="form-control" required>
                                        <option value="">Select Service</option>
                                        <option value="breeding">Quality Dog Breeding - Puppy Purchase</option>
                                        <option value="training">Dog Training (All Ages)</option>
                                        <option value="walking">Professional Dog Walking</option>
                                        <option value="consultation">Breeding Consultation</option>
                                        <option value="multiple">Multiple Services</option>
                                    </select>
                                    <div class="invalid-feedback" id="service-error"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group mb-0">
                                    <label class="text-white">Additional Information:</label>
                                    <textarea name="message" id="message" class="form-control" rows="3"
                                        placeholder="Tell us about your specific needs, dog breed preferences, training goals, or any questions you have..."></textarea>
                                    <div class="invalid-feedback" id="message-error"></div>
                                </div>
                            </div>
                        </div>

                        <!-- Bot Protection Quiz Section -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="quiz-section">
                                    <div class="quiz-question" id="quizQuestion">
                                        Loading verification question...
                                    </div>
                                    <div class="form-group mb-0">
                                        <input type="text" name="quiz_answer" id="quiz_answer"
                                            class="form-control" placeholder="Your answer..." required>
                                        <div class="invalid-feedback" id="quiz_answer-error"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="btn_wrapper">
                            <button type="submit" name="submitnow" id="submit_now" class="default-btn">
                                <span id="buttonText">Book Consultation</span>
                                <span id="loadingSpinner" style="display: none;">
                                    <i class="fas fa-spinner fa-spin"></i> Booking...
                                </span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 col-md-12 col-sm-12 col-12"></div>
            <figure class="consultation_left_top_shape mb-0 position-absolute left_right_shape">
                <img src="assets/images/consultation_top_left_shape.png" alt="" class="img-fluid">
            </figure>
        </div>
        <figure class="consultation_left_shape mb-0 position-absolute top_bottom_shape">
            <img src="assets/images/consultation_left_shape.png" alt="" class="img-fluid">
        </figure>
    </div>

    <!-- Loading overlay -->
    <div class="loading-overlay" id="loadingOverlay">
        <div class="loading-spinner"></div>
    </div>
</section>

<style>
    /* Loading spinner styles */
    .loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }

    .loading-spinner {
        width: 60px;
        height: 60px;
        border: 4px solid #f3f3f3;
        border-top: 4px solid #3498db;
        border-radius: 50%;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }

    /* Alert styles */
    .alert {
        padding: 15px;
        margin: 20px 0;
        border-radius: 5px;
        display: none;
        position: relative;
        animation: slideDown 0.3s ease-out;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .alert-success {
        background-color: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    .alert-error {
        background-color: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    .alert-close {
        position: absolute;
        top: 10px;
        right: 15px;
        font-size: 20px;
        font-weight: bold;
        cursor: pointer;
        color: inherit;
        background: none;
        border: none;
        opacity: 0.7;
    }

    .alert-close:hover {
        opacity: 1;
    }

    /* Quiz section styles */
    .quiz-section {
        background: rgba(255, 255, 255, 0.1);
        padding: 15px;
        border-radius: 5px;
        margin: 15px 0;
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .quiz-question {
        color: #fff;
        font-weight: bold;
        margin-bottom: 10px;
        font-size: 14px;
    }

    /* Form validation styles */
    .form-control.is-invalid {
        border-color: #dc3545 !important;
        box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25);
    }

    .invalid-feedback {
        display: block;
        color: #dc3545;
        font-size: 0.875em;
        margin-top: 5px;
        font-weight: 500;
    }

    /* Button loading state */
    .btn-loading {
        opacity: 0.6;
        cursor: not-allowed;
        pointer-events: none;
    }

    /* Required field indicator */
    .text-danger {
        color: #ff6b6b !important;
    }

    /* Enhanced form styling */
    .form-control:focus {
        border-color: #3498db;
        box-shadow: 0 0 0 0.2rem rgba(52, 152, 219, 0.25);
    }

    /* Button hover effect */
    .default-btn:hover:not(.btn-loading) {
        transform: translateY(-1px);
        transition: all 0.3s ease;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Set CSRF token for all AJAX requests
        const csrfToken = document.querySelector('meta[name="csrf-token"]');
        if (csrfToken) {
            window.csrfToken = csrfToken.getAttribute('content');
        }

        // Set minimum date to today
        const dateInput = document.getElementById('birthdate');
        const today = new Date().toISOString().split('T')[0];
        dateInput.setAttribute('min', today);

        // Load quiz question
        loadQuizQuestion();

        // Form submission handler
        const consultationForm = document.getElementById('consultationForm');
        if (consultationForm) {
            consultationForm.addEventListener('submit', handleFormSubmission);
        }
    });

    // Load quiz question from server
    function loadQuizQuestion() {
        fetch('/consultation/quiz-question', {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': window.csrfToken || ''
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data && data.question) {
                    document.getElementById('quizQuestion').textContent = data.question;
                } else {
                    // Fallback question
                    document.getElementById('quizQuestion').textContent = 'What is a young dog called?';
                }
            })
            .catch(error => {
                console.error('Error loading quiz question:', error);
                // Fallback question
                document.getElementById('quizQuestion').textContent = 'What is a young dog called?';
            });
    }

    // Handle form submission
    function handleFormSubmission(e) {
        e.preventDefault();

        // Clear previous errors
        clearErrors();

        // Show loading state
        showLoading();
        setButtonLoading(true);

        // Prepare form data
        const formData = new FormData(e.target);

        // Submit form via AJAX
        fetch('/consultation/store', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': window.csrfToken || ''
                }
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                hideLoading();
                setButtonLoading(false);

                if (data.success) {
                    showSuccessMessage(data.message);
                    resetForm();
                } else {
                    if (data.errors) {
                        showValidationErrors(data.errors);
                    } else {
                        showErrorMessage(data.message || 'An error occurred. Please try again.');
                    }
                }
            })
            .catch(error => {
                hideLoading();
                setButtonLoading(false);
                console.error('Error:', error);
                showErrorMessage('Network error. Please check your connection and try again.');
            });
    }

    // Show/hide loading overlay
    function showLoading() {
        const overlay = document.getElementById('loadingOverlay');
        if (overlay) {
            overlay.style.display = 'flex';
        }
    }

    function hideLoading() {
        const overlay = document.getElementById('loadingOverlay');
        if (overlay) {
            overlay.style.display = 'none';
        }
    }

    // Button loading state
    function setButtonLoading(isLoading) {
        const submitBtn = document.getElementById('submit_now');
        const buttonText = document.getElementById('buttonText');
        const loadingSpinner = document.getElementById('loadingSpinner');

        if (submitBtn && buttonText && loadingSpinner) {
            if (isLoading) {
                submitBtn.classList.add('btn-loading');
                submitBtn.disabled = true;
                buttonText.style.display = 'none';
                loadingSpinner.style.display = 'inline';
            } else {
                submitBtn.classList.remove('btn-loading');
                submitBtn.disabled = false;
                buttonText.style.display = 'inline';
                loadingSpinner.style.display = 'none';
            }
        }
    }

    // Reset form after successful submission
    function resetForm() {
        const form = document.getElementById('consultationForm');
        if (form) {
            form.reset();

            // Reset date minimum
            const dateInput = document.getElementById('birthdate');
            const today = new Date().toISOString().split('T')[0];
            dateInput.setAttribute('min', today);

            // Reload quiz question
            loadQuizQuestion();
        }
    }

    // Show success message
    function showSuccessMessage(message) {
        const alert = document.getElementById('successAlert');
        const messageSpan = document.getElementById('successMessage');

        if (alert && messageSpan) {
            messageSpan.textContent = message;
            alert.style.display = 'block';

            // Scroll to top to show alert
            scrollToTop();

            // Auto hide after 10 seconds
            setTimeout(() => {
                alert.style.display = 'none';
            }, 10000);
        }
    }

    // Show error message
    function showErrorMessage(message) {
        const alert = document.getElementById('errorAlert');
        const messageSpan = document.getElementById('errorMessage');

        if (alert && messageSpan) {
            messageSpan.textContent = message;
            alert.style.display = 'block';

            // Scroll to top to show alert
            scrollToTop();

            // Auto hide after 8 seconds
            setTimeout(() => {
                alert.style.display = 'none';
            }, 8000);
        }
    }

    // Close alert manually
    function closeAlert(alertId) {
        const alert = document.getElementById(alertId);
        if (alert) {
            alert.style.display = 'none';
        }
    }

    // Scroll to top smoothly
    function scrollToTop() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    }

    // Clear form errors
    function clearErrors() {
        const errorElements = document.querySelectorAll('.invalid-feedback');
        const inputElements = document.querySelectorAll('.form-control');

        errorElements.forEach(element => {
            element.textContent = '';
        });

        inputElements.forEach(element => {
            element.classList.remove('is-invalid');
        });
    }

    // Show validation errors
    function showValidationErrors(errors) {
        Object.keys(errors).forEach(field => {
            const errorElement = document.getElementById(field + '-error');
            const inputElement = document.getElementById(field) || document.querySelector(`[name="${field}"]`);

            if (errorElement && inputElement) {
                errorElement.textContent = errors[field][0];
                inputElement.classList.add('is-invalid');
            }
        });

        // Focus on first error field
        const firstErrorField = document.querySelector('.form-control.is-invalid');
        if (firstErrorField) {
            firstErrorField.focus();
            firstErrorField.scrollIntoView({
                behavior: 'smooth',
                block: 'center'
            });
        }
    }

    // Add real-time validation
    document.addEventListener('input', function(e) {
        if (e.target.classList.contains('form-control')) {
            // Remove error state when user starts typing
            if (e.target.classList.contains('is-invalid')) {
                e.target.classList.remove('is-invalid');
                const errorElement = document.getElementById(e.target.name + '-error');
                if (errorElement) {
                    errorElement.textContent = '';
                }
            }
        }
    });

    // Phone number formatting (optional enhancement)
    document.getElementById('phonenum')?.addEventListener('input', function(e) {
        let value = e.target.value.replace(/\D/g, '');
        if (value.length > 0) {
            if (value.startsWith('254')) {
                value = '+' + value;
            } else if (value.startsWith('0')) {
                value = '+254' + value.substring(1);
            } else if (!value.startsWith('+')) {
                value = '+254' + value;
            }
        }
        e.target.value = value;
    });
</script>
