


<section id="terms" class="terms dark-background footer_main">
    <div class="container p-4 footer-top ">
        <div class="row gy-4 footer-second d-flex align-items-start">
            <div class="   rounded col-lg-4 col-md-4 footer-links ">
                <h4><u>Our Latest Products</u></h4>
                <ul>
                    @foreach ($latestProducts as $product)
                        <li class="text-nowrap"><a
                                href="{{ route('frontend.product.details', $product->slug) }}">{{ $product->name }}</a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class=" rounded col-lg-4 col-md-4 footer-links">
                <h4><u>Our Services</u></h4>
                <ul>
                    <li><a href="{{ route('frontend.services.digital-transformation') }}">Digital Transformation</a>
                    </li>
                    <li><a href="{{ route('frontend.services.uiux-design-agencies') }}">UI/UX Design Services</a></li>
                    <li><a href="{{ route('frontend.services.api-development') }}">API Development and Integration</a>
                    </li>
                    <li><a href="{{ route('frontend.services.mobile-app-development') }}">Mobile App Development</a>
                    </li>
                    <li><a href="{{ route('frontend.services.build-ecommerce-websites') }}">E-Commerce Development</a>
                    </li>
                </ul>
            </div>


            <div class=" rounded col-lg-3 col-md-3  footer-links">
                <h4><u>Useful Links</u></h4>
                <ul>
                    <li><a href="{{ route('frontend.home') }}">Home</a></li>
                    <li><a href="{{ route('frontend.about') }}">About us</a></li>
                    <li><a href="{{ route('frontend.services') }}">Services</a></li>
                    <li><a href="{{ route('frontend.terms-of-service') }}">Terms of service</a></li>
                    <li><a href="{{ route('frontend.privacy-policy') }}">Privacy policy</a></li>
                </ul>
            </div>
            <div class="row justify-content-center col-lg-1 col-md-1">
                <div class="col-12 text-center p-2">
                    <div class="d-flex flex-column align-items-center social-icons-container">
                        @if (isset($main_settings['facebook_url']))
                            <a href="{{ $main_settings['facebook_url'] }}" class="my-2" target="_blank">
                                <img src="{{ asset('img/icon/facebook.svg') }}" alt="Facebook" class="social-icon">
                            </a>
                        @endif
                        @if (isset($main_settings['youtube_url']))
                            <a href="{{ $main_settings['youtube_url'] }}" class="my-2" target="_blank">
                                <img src="{{ asset('/img/icon/YouTube_play_button.webp') }}" alt="YouTube"
                                    class="social-icon">
                            </a>
                        @endif
                        @if (isset($main_settings['instagram_url']))
                            <a href="{{ $main_settings['instagram_url'] }}" class="my-2" target="_blank">
                                <img src="{{ asset('/img/icon/instagram_logo_button.webp') }}" alt="Instagram"
                                    class="social-icon">
                            </a>
                        @endif
                        @if (isset($main_settings['linkedin_url']))
                            <a href="{{ $main_settings['linkedin_url'] }}" class="my-2" target="_blank">
                                <img src="{{ asset('img/icon/LinkedIn_icon.svg.png') }}" alt="LinkedIn"
                                    class="social-icon">
                            </a>
                        @endif
                        @if (isset($main_settings['twitter_url']))
                            <a href="{{ $main_settings['twitter_url'] }}" class="my-2" target="_blank">
                                <img src="{{ asset('img/icon/twitter.svg') }}" alt="Twitter" class="social-icon">
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Copyright Section -->
    <div class=" center copyright text-center mt-0 mb-0">
        <p style=" center   font-size: .9rem !important;text-align:center!important;">© <span>Copyright</span> <span
                class="px-1 sitename">{{ $main_settings['site_name'] ?? 'Your Website Name' }}</span>
            <span>All
                Rights
                Reserved</span>
        </p>
    </div>
</section>



<style>
    .background-img {
        background-image: url("{{ asset('img/map/location-map-ambala-it-ltd.webp') }}") !important;
        padding-top: 0px;
        margin-top: 0px;
        background-repeat: no-repeat;
        background-size: 100% 100%;
        position: relative;
        padding: 116px !important;
    }

    .footer-text {
        margin: 0;
        padding: 0;
        width: 100%;
    }

    .london,
    .dhaka,
    .ghana {

        background-color: rgba(0, 0, 0, 0.6);
        padding: 15px;
        /* border-radius: 8px; */
        white-space: nowrap;
        margin: 0;
    }

    .london {
        padding-left: 10px !important;
        padding-top: 14rem !important;
        padding-bottom: 1rem !important;
        left: 0;
        z-index: 2;
    }

    .ghana {
        padding-top: 14rem !important;
        padding-bottom: 1rem !important;
        right: 0;
    }

    .dhaka {
        padding-bottom: 13rem !important;
        right: 0;
        z-index: 1;
    }

    .double-underline {
        position: relative;
        display: inline-block;
    }

    .double-underline:after {
        content: "";
        position: absolute;
        left: 0;
        bottom: -5px;
        /* Adjust this value to position the second underline */
        width: 100%;
        height: 2px;
        /* Adjust thickness */
        border-bottom: 2px double #fff;
        /* Double underline */
    }

    @media (max-width: 992px) {

        .london,
        .dhaka,
        .ghana {
            padding-top: 8rem !important;
            padding-bottom: 1rem !important;
            margin: 0 auto;
            text-align: center;
        }
    }

    @media (max-width: 768px) {

        .london,
        .dhaka,
        .ghana {
            width: 80%;
            margin: 10px auto;
            text-align: center;
            padding-right: 55px !important;
        }
    }

    @media (max-width: 576px) {

        .london,
        .dhaka,
        .ghana {
            width: 100%;
            margin: 0px auto;
            text-align: center;
            margin-bottom: 0px !important;
            padding-top: 23px !important;
            background-color: rgb(0 0 0 / 94%) !important;

        }

        .background-img {
            background-image: url(http://192.168.1.150/ambalaitweb/nur/public/img/demo/ambalait-office-world-map (1).jpg) !important;
            padding-top: 0px;
            margin-top: 0px;
            background-repeat: no-repeat;
            background-size: 100% 100%;
            position: relative;
            padding: 116px !important;
            margin-bottom: 25px;
        }
    }

    .shadow {
        box-shadow: 1px 0rem 0rem rgba(0, 0, 0, 0.15) !important;
    }

    .social-icons-container {
        display: flex;
        flex-direction: column;
        /* Stack icons vertically */
        align-items: center;
        /* Center the icons horizontally */
        /* gap: 10px; */
        /* Adds space between icons */
    }

    .social-icon {
        width: 40px;
        height: 35px;
        border-radius: 50%;
        object-fit: cover;
        transition: transform 0.3s ease;
        filter: grayscale(100%);
    }

    .social-icon:hover {
        transform: scale(1.1);
        filter: grayscale(0%);
    }


    .shadow-left {
        position: relative;
    }

    .shadow-left::before {
        content: '';
        position: absolute;
        left: -5px;
        top: 0;
        height: 97%;
        border-radius: 101px;
        width: .5px;
        background: #2125293b;
    }

    @media (max-width: 576px) {
        .social-icons-container {
            flex-direction: row !important;
            /* Change to horizontal layout on mobile */
            justify-content: center !important;
            /* Center the icons horizontally */
        }

        .social-icon {
            margin: 0 5px !important;
            /* Adds horizontal spacing between icons */
        }
    }

    .terms ul {
        padding-left: 0rem !important;
    }
</style>
