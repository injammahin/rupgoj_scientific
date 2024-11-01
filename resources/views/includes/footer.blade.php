<section id="footer" class="terms dark-background footer_main">
    <div class="container p-4 footer-top">
        <div class="row gy-4 d-flex align-items-start text-white">
            
            <!-- Important Links -->
            <div class="col-lg-4 col-md-6 footer-links">
                <h4 class="mb-3 text-nowrap">Important Links</h4>
                <ul class="list-unstyled">
                    <li><a href="{{ route('frontend.home') }}">Home</a></li>
                    <li><a href="{{ route('frontend.about') }}">Company Profile</a></li>
                    <li><a href="{{ route('frontend.services') }}">Services & Support</a></li>
                    <li><a href="{{ route('frontend.contact') }}">Contact Us</a></li>
                </ul>
            </div>

            <!-- Quick Contact -->
            <div class="col-lg-4 col-md-6">
                <h4 class="mb-3">Quick Contact</h4>
                <p><strong>Phone:</strong><br>+880 1717844659<br>+880 1715019666</p>
                <p><strong>Email:</strong><br>rupgonjscientifics@gmail.com<br>aftab@rupgonjscientifics.com<br>a.siddique727@gmail.com</p>
            </div>

            <!-- Address -->
            <div class="col-lg-4 col-md-6">
                <h4 class="mb-3">Address</h4>
                <p><strong>Registered Office:</strong><br>32, Shahid Nazrul Islam Sharak (Hatkhola), Dhaka-1203, Bangladesh.</p>
                <p><strong>Corporate Office:</strong><br>Zakaria Bhaban (3rd floor), 33/2, Shahid Nazrul Islam Sharak, Dhaka-1203.</p>
            </div>
        </div>

        <!-- Social Media Icons -->
        <div class="row justify-content-center mt-4">
            <div class="col-12 text-center">
                <div class="d-flex justify-content-center social-icons-container">
                    <a href="{{ $main_settings['facebook_url'] ?? '#' }}" target="_blank"><img src="{{ asset('img/icon/facebook.svg') }}" class="social-icon" alt="Facebook"></a>
                    <a href="{{ $main_settings['youtube_url'] ?? '#' }}" target="_blank"><img src="{{ asset('img/icon/YouTube_play_button.webp') }}" class="social-icon" alt="YouTube"></a>
                    <a href="{{ $main_settings['instagram_url'] ?? '#' }}" target="_blank"><img src="{{ asset('img/icon/instagram_logo_button.webp') }}" class="social-icon" alt="Instagram"></a>
                    <a href="{{ $main_settings['linkedin_url'] ?? '#' }}" target="_blank"><img src="{{ asset('img/icon/LinkedIn_icon.svg.png') }}" class="social-icon" alt="LinkedIn"></a>
                    <a href="{{ $main_settings['twitter_url'] ?? '#' }}" target="_blank"><img src="{{ asset('img/icon/twitter.svg') }}" class="social-icon" alt="Twitter"></a>
                </div>
            </div>
        </div>
    </div>

    <!-- Copyright Section -->
    <div class="copyright text-center center mt-4 text-white">
        <p>© 2021 All rights reserved by Rupgonj Scientifics. Designed & Developed by <span style="color: #FF4081 !important;">WebArc Bangladesh Limited</span>.</p>
    </div>
</section>

<!-- Footer Styles -->
<style>
    /* Main Footer Styling */
    #footer {
        background-color: #0b3357 !important; /* Dark Blue */
        color: #ffffff !important;
        padding-top: 2rem;
    }

    /* Headings */
    #footer h4 {
        color: #ffffff !important;
        font-weight: bold !important;
        border-bottom: 2px solid #ffffff !important;
        padding-bottom: 0.3rem !important;
        margin-bottom: 1rem !important;
    }
     #footer h4 {
        color: #ffffff !important;
        font-weight: bold !important;
        border-bottom: 2px solid #ffffff !important;
        padding-bottom: 0.3rem !important;
        margin-bottom: 1rem !important;
    }
    #footer strong {
        color: #ffffff !important;
        font-weight: bold !important;
        border-bottom: 2px solid #ffffff !important;
        padding-bottom: 0.3rem !important;
    }

    /* Paragraph and Link Styling */
    #footer p,
    #footer a {
        color: #ffffff !important;
        font-size: 0.9rem !important;
        margin: 0 !important;
        line-height: 1.8 !important;
    }

    #footer a:hover {
        color: #FF4081 !important; /* Highlight color on hover */
        text-decoration: none !important;
    }

    /* Footer Links Styling */
    .footer-links ul {
        list-style: none !important;
        padding: 0 !important;
    }

    .footer-links li {
        margin-bottom: 0.5rem !important;
    }

    /* Social Icons */
    .social-icons-container {
        gap: 15px !important;
    }

    .social-icon {
        width: 40px !important;
        height: 40px !important;
        border-radius: 50% !important;
        object-fit: cover !important;
        transition: transform 0.3s ease, filter 0.3s ease !important;
        filter: grayscale(100%) !important;
        background: white !important;
        padding: 5px !important;
    }

    .social-icon:hover {
        transform: scale(1.1) !important;
        filter: grayscale(0%) !important;
    }

    /* Divider */
    .footer-divider {
        background-color: #ffffff !important;
        height: 1px !important;
        width: 100% !important;
        margin: 1.5rem 0 !important;
    }

    /* Copyright Section */
    .copyright {
        background-color: #001b36 !important;
        padding: 10px 0 !important;
        font-size: 0.85rem !important;
    }
</style>
