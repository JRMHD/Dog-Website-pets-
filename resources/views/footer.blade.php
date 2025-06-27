<section class="stats_news_combo_section">
    <!-- NEWSLETTER SECTION -->
    <div class="newsletter_section">
        <div class="container">
            <div class="newsletter_box position-relative">
                <div class="row">
                    <div class="col-lg-5 col-md-5 col-sm-12 col-12 order-md-1 order-2">
                        <figure class="newsletter_image mb-0 position-absolute">
                            <img src="/assets/images/newsletter_image.png" alt="" class="img-fluid">
                        </figure>
                    </div>
                    <div class="col-lg-7 col-md-7 col-sm-12 col-12 order-md-2 order-1">
                        <div class="newsletter_content">
                            <h6>Stay Connected</h6>
                            <h2>Subscribe for Dog Care Tips & Updates from Gibmarnel</h2>

                            <form id="subscribeForm" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="col-lg-12">
                                        <input type="email" name="email" id="emailadd" class="form-control"
                                            placeholder="Enter Your Email:" required>
                                        <div class="input-group-append form-button">
                                            <button class="default-btn" id="submitbtn" type="submit">Subscribe
                                                Now</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div id="subscribe-spinner" style="display:none; text-align:center; margin-top:10px;">
                                <div class="spinner"
                                    style="width:30px; height:30px; border:4px solid #ccc; border-top-color:#007bff; border-radius:50%; animation:spin 0.8s linear infinite;">
                                </div>
                            </div>
                            <div id="subscribe-message" style="margin-top:10px;"></div>

                            <style>
                                @keyframes spin {
                                    to {
                                        transform: rotate(360deg);
                                    }
                                }
                            </style>

                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                            <script>
                                $('#subscribeForm').on('submit', function(e) {
                                    e.preventDefault();
                                    $('#subscribe-message').html('');
                                    $('#subscribe-spinner').show();
                                    $('#submitbtn').prop('disabled', true);

                                    $.ajax({
                                        url: "{{ route('subscribe') }}",
                                        method: "POST",
                                        data: $(this).serialize(),
                                        success: function(res) {
                                            $('#subscribe-spinner').hide();
                                            $('#submitbtn').prop('disabled', false);
                                            $('#subscribe-message').html('<span style="color:green;">' + res.message +
                                                '</span>');
                                            $('#subscribeForm')[0].reset();
                                        },
                                        error: function(xhr) {
                                            $('#subscribe-spinner').hide();
                                            $('#submitbtn').prop('disabled', false);
                                            let errors = xhr.responseJSON.errors || {};
                                            let msg = errors.email ? errors.email[0] : 'An error occurred.';
                                            $('#subscribe-message').html('<span style="color:red;">' + msg + '</span>');
                                        }
                                    });
                                });
                            </script>
                        </div>
                    </div>
                </div>
                <figure class="newsletter_yellow_shape mb-0 position-absolute left_right_shape">
                    <img src="assets/images/newsletter_yellow_shape.png" alt="" class="img-fluid">
                </figure>
            </div>
            <figure class="newsletter_purple_foot mb-0 position-absolute top_bottom_shape">
                <img src="assets/images/newsletter_purple_foot.png" alt="" class="img-fluid">
            </figure>
            <figure class="newsletter_green_foot mb-0 position-absolute top_bottom_shape">
                <img src="assets/images/newsletter_green_foot.png" alt="" class="img-fluid">
            </figure>
        </div>
    </div>
</section>
<!-- FOOTER SECTION -->
<section class="footer-section">
    <div class="container">
        <div class="middle-portion">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-6 col-12">
                    <div class="about_col">
                        <a href="/">
                            <figure
                                style="background-color: #f8f9fa; padding: 8px 12px; border-radius: 8px; display: inline-block;">
                                <img src="/assets/images/footer_logo.png" alt="" class="img-fluid"
                                    style="height: 80px; width: auto;">
                            </figure>
                        </a>

                        <p>Gibmarnel offers expert dog and puppy services including training, breeding, and walking.
                            Whether you have a new puppy or an adult dog, we provide personalized care to ensure their
                            health, happiness, and good behavior.</p>

                        <div class="headphone_wrapper">
                            <figure class="mb-0">
                                <img src="/assets/images/footer_headphone.png" alt="" class="img-fluid">
                            </figure>
                            <div class="headphone_content">
                                <a href="tel:+254 743 136920" class="text-decoration-none d-block">+254 743 136920</a>
                                <span>Got Questions? Call us 24/7</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-12 d-lg-block d-none">
                    <div class="hours_col">
                        <h3>Working Hours</h3>
                        <ul class="list-unstyled">
                            <li>
                                <p>Monday – Friday</p>
                            </li>
                            <li>
                                <span>8:00 am – 6:00 pm</span>
                            </li>
                            <li>
                                <p>Saturday – Sunday</p>
                            </li>
                            <li>
                                <span>8:00 am – 6:00 pm</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6 col-12 d-md-block d-none">
                    <div class="links_col">
                        <h3>Navigation</h3>
                        <ul class="list-unstyled">
                            <li>
                                <i class="fa-solid fa-angle-right"></i>
                                <a href="/">Home</a>
                            </li>
                            <li>
                                <i class="fa-solid fa-angle-right"></i>
                                <a href="{{ route('about') }}">About Us</a>
                            </li>
                            <li>
                                <i class="fa-solid fa-angle-right"></i>
                                <a href="{{ route('services') }}">Services</a>
                            </li>
                            <li>
                                <i class="fa-solid fa-angle-right"></i>
                                <a href="{{ route('shop') }}">Our Shop</a>
                            </li>
                            <li>
                                <i class="fa-solid fa-angle-right"></i>
                                <a href="{{ route('blog.index') }}">Blogs</a>
                            </li>

                            {{-- <li>
                <i class="fa-solid fa-angle-right"></i>
                <a href="{{ route('gallery') }}">Gallery</a>
            </li> --}}

                            <!-- Authentication Links -->
                            @auth
                                <!-- User is logged in - Show Dashboard -->
                                <li>
                                    <i class="fa-solid fa-angle-right"></i>
                                    <a href="{{ route('dashboard') }}">Dashboard</a>
                                </li>
                            @else
                                <!-- User is not logged in - Show Login and Sign Up -->
                                <li>
                                    <i class="fa-solid fa-angle-right"></i>
                                    <a href="{{ route('login') }}">Login</a>
                                </li>
                                <li>
                                    <i class="fa-solid fa-angle-right"></i>
                                    <a href="{{ route('register') }}">Sign Up</a>
                                </li>
                            @endauth
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-4 col-sm-6 col-12 d-sm-block d-none">
                    <div class="contact_col">
                        <h3>Contact Us</h3>
                        <ul class="list-unstyled">
                            <li>
                                <p>Address:</p>
                            </li>
                            <li>
                                <span>Kenyatta Road,Nairobi,Kenya</span>
                            </li>
                            <li>
                                <p>Email:</p>
                            </li>
                            <li class="mail">
                                <a href="mailto:info@gibmarnel.com" class="text-decoration-none">info@gibmarnel.com</a>
                            </li>
                        </ul>
                        <ul class="list-unstyled">
                            <li class="icons"><a href="#"><i class="fa-brands fa-facebook-f hover-effect"
                                        aria-hidden="true"></i></a>
                            </li>
                            <li class="icons"><a href="#"><i class="fa-brands fa-twitter hover-effect"
                                        aria-hidden="true"></i></a></li>
                            <li class="icons"><a href="#"><i class="fa-brands fa-instagram mr-0 hover-effect"
                                        aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom-portion">
        <div class="col-12">
            <div class="copyright">
                <p>Copyright © {{ date('Y') }} {{ config('app.name') }} All rights reserved. | Designed and
                    Developed by <a href="https://jrmhd.tech/" target="_blank"
                        style="color: white; text-decoration: none;">Jrmhd Technologies</a></p>
            </div>
        </div>
    </div>
    <figure class="mb-0 footer_right_shape position-absolute top_bottom_shape">
        <img src="assets/images/footer_right_shape.png" alt="" class="img-fluid">
    </figure>
</section>
