@extends('frontend.app')
@section('title', 'Contact')

@section('content')
    <div class="banner-section">
        <div class="banner-wrapper">
            <img src="{{ $settings && $settings->contact_banner ? asset($settings->contact_banner) : asset('/img/placeholder/Placeholder image-banner.webp') }}"
                alt="Contact Banner" class="img-fluid">
            <div class="banner-overlay">
                <div class="banner-text">
                    <h1>Welcome to Ambala IT</h1>
                    <p>Innovative Solutions for a Digital World</p>
                </div>
            </div>
        </div>
    </div>


    <section class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="bg-white top ambala-section">
            <div class="row mt-n4">
                <!-- Card 1: Visit Our Office -->
                <div class="col-lg-4 col-md-6 mt-4">
                    <div class="card card-style07 py-2-8 px-1-6 bg-white wow fadeInUp card-equal-height"
                        data-wow-delay=".2s" style=" height: 300px!important;">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <div class="title-box mb-4">
                                <i class="fas fa-map-marker-alt"></i>
                                <div class="box-circle-large"></div>
                                <div class="box-circle-small"></div>
                            </div>
                            <p class="mb-3 text-center">Visit Our Office</p>
                            <p class="mb-0 w-100 text-center">House-67, Block-Ka,</p>
                            <p class="mb-0 w-100 text-center">Piciculture Housing Society, Shyamoli</p>
                            <p class="mb-0 w-100 text-center">Dhaka, Bangladesh</p>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Let's Talk -->
                <div class="col-lg-4 col-md-6 mt-4">
                    <div class="card card-style07 py-2-8 px-1-6 bg-white wow fadeInUp card-equal-height"
                        data-wow-delay=".4s">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <div class="title-box mb-4">
                                <i class="fas fa-comments"></i>
                                <div class="box-circle-large"></div>
                                <div class="box-circle-small"></div>
                            </div>
                            <p class="mb-3 text-center">Let's Talk</p>
                            <p class="mb-0 w-100 text-center">Phone: +8801708408686</p>
                            <p class="mb-0 w-100 text-center">Phone: +8801708408687</p>
                        </div>
                    </div>
                </div>

                <!-- Card 3: E-mail Us -->
                <div class="col-lg-4 col-md-12 mt-4">
                    <div class="card card-style07 py-2-8 px-1-6 bg-white wow fadeInUp card-equal-height"
                        data-wow-delay=".6s">
                        <div class="card-body d-flex flex-column justify-content-center">
                            <div class="title-box mb-4">
                                <i class="fas fa-envelope"></i>
                                <div class="box-circle-large"></div>
                                <div class="box-circle-small"></div>
                            </div>
                            <p class="mb-3 text-center">E-mail Us</p>
                            <p class="mb-0 w-100 text-center">contact@ambalait.com</p>
                            <p class="mb-0 w-100 text-center">info.ambalait@gmail.com</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row justify-content-center ambala-section">
            <div class="col-12 col-lg-10 wow fadeIn">

                <h3 class=" pt-0 pb-3 ambala_heading text-center">Get in Touch</h3>
                <p class="ambala_sub_heading mx-auto mb-0 pb-5">We're reachable via email and phone, and you can also
                    inquire
                    about our services using our
                    contact form.



                    Visit Our Office
                </p>

                {{-- @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif --}}

                <form action="{{ route('frontend.contact.store') }}" method="POST">
                    @csrf

                    <!-- Name Field -->
                    <div class="form-group">
                        <label for="name">Your Name <span class="text-danger">*</span></label>
                        <input class="form-control" id="name" type="text" name="name"
                            placeholder="Your name here" required>
                    </div>

                    <!-- Email Field -->
                    <div class="form-group">
                        <label for="email">Your Email <span class="text-danger">*</span></label>
                        <input class="form-control" type="email" name="email" placeholder="Your email here" required>
                    </div>

                    <!-- Subject Field -->
                    <div class="form-group">
                        <label for="subject">Your Subject <span class="text-danger">*</span></label>
                        <input class="form-control" type="text" name="subject" placeholder="Your subject here" required>
                    </div>

                    <!-- Message Field -->
                    <div class="form-group">
                        <label for="message">Message <span class="text-danger">*</span></label>
                        <textarea class="form-control" id="message" name="message" rows="4" placeholder="Your message here" required></textarea>
                    </div>

                    <!-- Math CAPTCHA -->
                    @php
                        $num1 = rand(1, 9);
                        $num2 = rand(1, 9);
                        session(['captcha_sum' => $num1 + $num2]); // Store the sum in session
                    @endphp

                    <div class="form-group">
                        <label for="captcha">What is {{ $num1 }} + {{ $num2 }}? <span
                                class="text-danger">*</span></label>
                        <input type="text" name="captcha" id="captcha" class="form-control" placeholder="Enter the sum"
                            required>
                        @if ($errors->has('captcha'))
                            <span class="text-danger">{{ $errors->first('captcha') }}</span>
                        @endif
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="butn mt-3">Submit</button>
                </form>
                <!-- end form here -->
            </div>
        </div>
        
    </section>
    <div class="map-container mt-4">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3648.762030137773!2d90.3665101145124!3d23.777356393325093!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c7b0bb17e183%3A0x2d6a3931f4b78f07!2sAmbala%20IT!5e0!3m2!1sen!2sbd!4v1630064309324!5m2!1sen!2sbd" 
            width="100%" 
            height="400" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy">
        </iframe>
    </div>

@endsection

@section('scripts')
    <script>
        // Hide the success message after 3 seconds
        document.addEventListener('DOMContentLoaded', function() {
            const successAlert = document.querySelector('.alert-success');
            if (successAlert) {
                setTimeout(() => {
                    successAlert.style.transition = 'opacity 0.5s ease';
                    successAlert.style.opacity = '0';
                    setTimeout(() => successAlert.remove(), 500);
                }, 3000); // 3000ms = 3 seconds
            }
        });
    </script>
@endsection

<style>
   .card-style07 {
    background: linear-gradient(-45deg, #0161b069, rgb(5 165 81 / 0%)) !important;
    transition: transform 0.3s ease, background 0.3s ease;
}

    .card-style07:hover {
        background: linear-gradient(-45deg, #c1121e, rgb(19, 20, 20)) !important;
        transform: translateY(-10px);
    }

    .card-style07 i {
        color: #c1121f !important;
        transition: color 0.3s ease;
    }

    .card-style07:hover i {
        color: #ffffff !important;
    }

    .card-style07:hover p {
        color: #ffffff !important;
    }


    .card-body {
        padding: 1rem;
        background-color: rgba(255, 255, 255, 0);
    }

    .quform-element label {
        font-weight: bold;
        color: #d30b0b;
    }

    .quform-submit-inner .butn {
        background-color: #d30b0b;
        color: #ffffff;
        transition: background-color 0.3s ease;
    }

    .quform-submit-inner .butn:hover {
        background-color: #c1121f;
        color: #ffffff;
    }

    .card-body {
        padding: 1rem;
        background-color: #f8f9fa00 !important;
    }

    /* Additional styles to improve mobile responsiveness */
    .text-center {
        text-align: center !important;
    }

    .w-100 {
        width: 100% !important;
    }

    z @media (max-width: 767px) {
        .section-heading {
            font-size: 1.5rem;
        }

        .quform-elements .form-group label {
            font-size: 0.9rem;
        }

        .card-style07 {
            padding: 1rem !important;
        }

        .text-center {
            text-align: center !important;
        }
    }

    .row.justify-content-center {
        display: flex !important;
        justify-content: center !important;
        align-items: center !important;
    }

    .card-equal-height {
        min-height: 300px !important;
        /* You can adjust this value as needed */
    }

    .card-style07 .title-box {
        position: relative;
        padding: 19px 0;
        font-size: 60px;
        line-height: 1;
        width: 1em !important;
        margin-left: auto;
        margin-right: auto;
    }
</style>
