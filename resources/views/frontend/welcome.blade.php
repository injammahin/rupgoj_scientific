@extends('frontend.app')
@section('title', 'Welcome to Ambala IT')
@section('content')
    <div class=" main-wrapper bg-white">
        <div class="home ">
            <div><div class="bg-image  home-image" 
                style="background-image: url('{{asset('/img/home/home-hero-for web.png')}}');
                       height: 100vh">
                       <div class="container home_heading">@if (isset($video) && $video->video_text)
                     {!! $video->video_text !!}
                    @else
                        <p class="hero-description mt-2"> Default video description goes here.</p>
                    @endif</div>
                </div> 
        </div>
        <div class="container">
           
                <!-- About Section -->
                <div class="about top ambala-section" data-aos="fade-up" data-aos-duration="1000">
                    <div>
                        <div class="row align-items-center">
                
                            <!-- Text Column -->
                            <div class="col-lg-6 col-md-12 font">
                                <div>
                                    <div class="wow fadeInUp" data-wow-delay=".1s">
                                        {{-- <span class="custom_heading">About Ambala IT</span> --}}
                                    </div>
                                    <h3 class="rp_heading text-nowrap" style="text-align: left !important;">Why Choose us</h3>
                                    <!-- Check if 'about_text' is available -->
                                    @if (!empty($aboutContent) && !empty($aboutContent->about_text))
                                        <div class="rp_paragraph">
                                            {!! $aboutContent->about_text !!}
                                        </div>
                                    @else
                                        <div class="ambala_paragraph">
                                            <p class="ambala_paragraph mb-4">
                                                No content available at the moment.
                                            </p>
                                        </div>
                                    @endif
                                </div>
                            </div>
                
                            <!-- Image Column -->
                            <div class="image-column col-md-6 col-sm-12">
                                <div class="inner-column parallax-image">
                                    <div class="image">
                                        <img src="{{ asset('/img/home/about.webp') }}" alt="About Us Image" class="about-img" style="height: 400px !imporrtant;width:auto;">
                                    </div>
                                </div>
                            </div>
                
                        </div>
                    </div>
                </div>
                <script>
                    document.addEventListener('DOMContentLoaded', function () {
                   const observerOptions = {
                       threshold: 0.1
                   };
               
                   const fadeInObserver = new IntersectionObserver((entries) => {
                       entries.forEach(entry => {
                           if (entry.isIntersecting) {
                               entry.target.classList.add('visible');
                           } else {
                               entry.target.classList.remove('visible');
                           }
                       });
                   }, observerOptions);
               
                   const contentColumn = document.querySelector('.fade-in-left');
                   const imageColumn = document.querySelector('.parallax-image');
               
                   if (contentColumn) {
                       fadeInObserver.observe(contentColumn);
                   }
               
                   if (imageColumn) {
                       fadeInObserver.observe(imageColumn);
                   }
               
                   // Parallax effect for the image
                   window.addEventListener('scroll', function () {
                       const scrollY = window.scrollY || window.pageYOffset;
                       const image = document.querySelector('.parallax-image img');
               
                       if (image) {
                           const parallaxFactor = 0.1; // Adjust this to make the effect stronger or weaker.
                           image.style.transform = `translateY(${scrollY * parallaxFactor}px)`;
                       }
                   });
                   });
                </script>
             <style>
                   /* Styling for Section Title with Underline */
                   .services-section h2 {
                       font-size: 2.5rem;
                       font-weight: bold;
                       color: #123456;
                       position: relative;
                       margin-bottom: 1rem;
                       text-transform: uppercase;
                   }
           
                   .services-section h2::after {
                       content: '';
                       display: block;
                       width: 50px;
                       height: 3px;
                       background-color: #123456; /* Blue underline */
                       margin: 0.5rem auto;
                   }
           
                   /* Card styling */
                   .service-card {
                       border: 5px solid black;
                       background: #f7f7f7;
                       border-radius: 10px;
                       box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                       transition: transform 0.3s ease, box-shadow 0.3s ease;
                       min-height: 28rem;
                       overflow: hidden;
                       position: relative;
                   }
           
                   .service-card:hover {
                       transform: translateY(-10px);
                       box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
                   }
           
                   /* Icon styling */
                   .icon-wrapper {
                       width: 90px;
                       height: 90px;
                       background-color: #98c1d9;
                       border-radius: 50%;
                       display: flex;
                       align-items: center;
                       justify-content: center;
                       color: #ffffff;
                       font-size: 2rem;
                       position: absolute;
                       top: -80px;
                       left: 34%;
                       transform: translateX(-50%);
                       transition: transform 0.3s ease-out;
                   }
           
                   /* Headline styling */
                   .card-title {
                       color: #123456;
                       font-size: 1.25rem;
                       font-weight: bold;
                       margin-top: 60px; /* Space for the icon */
                   }
           
                   /* Fade-in animation for cards */
                   .fade-in {
                       opacity: 0;
                       transform: translateY(30px);
                       transition: opacity 1s ease, transform 1s ease;
                   }
           
                   .fade-in.visible {
                       opacity: 1;
                       transform: translateY(0);
                   }
           
                   /* Slide animations */
                   .fade-in-left {
                       transform: translateX(-30px);
                   }
           
                   .fade-in-right {
                       transform: translateX(30px);
                   }
           
                   .fade-in-down {
                       transform: translateY(30px);
                   }
           
                   /* Additional style for parallax effect */
                   .parallax-icon {
                       transition: transform 0.3s ease-out;
                   }
                   .services-section  .card-title {
                       color: #123456 !important;
                       font-size: 1.25rem;
                       font-weight: bold;
                    margin-top: 7rem;
                    }
                    .services-section p {
                     margin: 13px 0 14px !important;
                     }
             </style>
           <section class="container pt-3 mb-3 services-section">
               <h2 class="rp_heading text-center">Our Services</h2>
               <div class="row pt-5 mt-3">
                   <!-- Card 1 - Slide from Left -->
                   <div class="col-lg-4 col-sm-6 mb-4 fade-in fade-in-left">
                       <div class="service-card p-4 text-center">
                           <div class="icon-wrapper parallax-icon">
                               <i class="fas fa-user-cog"></i>
                           </div>
                           <div class="card-body">
                               <h3 class="card-title">Technical Support</h3>
                               <p>Our technical team can be contacted round the clock. RUPGONJ SCIENTIFICS has a team of highly skilled engineers, consultants, and experts to provide technical support.</p>
                           </div>
                       </div>
                   </div>
                   <!-- Card 2 - Slide from Down -->
                   <div class="col-lg-4 col-sm-6 mb-4 fade-in fade-in-down">
                       <div class="service-card p-4 text-center">
                           <div class="icon-wrapper parallax-icon">
                               <i class="fas fa-camera"></i>
                           </div>
                           <div class="card-body">
                               <h3 class="card-title">Usability Testing</h3>
                               <p>
                                Since the qualities of products are vital to our customers’ success, and also a key determinant of our own success, we are committed to quality in all aspects of our activities. RUPGONJ SCIENTIFICS commitment to supply the highest standards of quality products.</p>
                           </div>
                       </div>
                   </div>
                   <!-- Card 3 - Slide from Right -->
                   <div class="col-lg-4 col-sm-6 mb-4 fade-in fade-in-right">
                       <div class="service-card p-4 text-center">
                           <div class="icon-wrapper parallax-icon">
                               <i class="fas fa-chart-line"></i>
                           </div>
                           <div class="card-body">
                               <h3 class="card-title">SEO Optimization</h3>
                               <p>We don’t sell only products, we also provide a compact solution</p>
                           </div>
                       </div>
                   </div>
               </div>
           </section>
           <script>
               document.addEventListener('DOMContentLoaded', function () {
                   const observerOptions = {
                       threshold: 0.3 // Trigger the animations when 30% of the element is visible
                   };
           
                   const fadeInObserver = new IntersectionObserver((entries) => {
                       entries.forEach(entry => {
                           if (entry.isIntersecting) {
                               entry.target.classList.add('visible');
                           } else {
                               entry.target.classList.remove('visible');
                           }
                       });
                   }, observerOptions);
           
                   const fadeInElements = document.querySelectorAll('.fade-in');
                   fadeInElements.forEach(element => fadeInObserver.observe(element));
           
                   // Parallax effect for icons
                   window.addEventListener('scroll', function () {
                       const scrollY = window.scrollY || window.pageYOffset;
                       const parallaxIcons = document.querySelectorAll('.parallax-icon');
           
                       parallaxIcons.forEach(icon => {
                           const parallaxFactor = 0.1; // Adjust this to make the effect stronger or weaker
                           icon.style.transform = `translateY(${scrollY * parallaxFactor}px)`;
                       });
                   });
               });
           </script>
            <!-- partner-->
                <div class="main-section ambala-section" data-aos="fade-left" data-aos-duration="1000">
                    <div>
                        <div class=" text-center mb-5">
                            <h3 class="rp_heading ">Our Partners</h3>
                            <p class="ambala_sub_heading ">Our trusted partner in driving innovation with cutting-edge
                                customized
                                software solutions.

                            </p>
                        </div>
                        <div class=" partners">
                            <div class="row justify-content-center text-center">
                                @foreach ($partners as $partner)
                                    <div class="col-lg-2 col-md-4 col-sm-4 col-6 mb-4">
                                        <div class="client-card">
                                            <img src="{{ asset('media/partners/' . $partner->image) }}"
                                                style="height: auto;width:auto !important;" alt="{{ $partner->name }}">
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            
            <!-- revirew-->
                <div class="about ambala-section" data-aos="fade-right" data-aos-duration="1000">
                    <div class="main-section">
                        <div class="">
                            <div class=" text-center mb-5">
                                <h3 class="ambala_heading ">Testimonials from Our Respected Clients
                                </h3>
                                <p class="ambala_sub_heading ">Trusted by leading brands, we deliver exceptional software
                                    solutions that drive results.

                                </p>
                            </div>
                        </div>
                        <div class="container customr">
                            <div class="owl-carousel owl-theme unique-testimonial-carousel">
                                @foreach ($reviews as $review)
                                    <div class="item">
                                        <div class="unique-testimonial-block d-flex flex-column justify-content-between">
                                            <span class="alt-font quote">“</span>
                                            <p class="review-text">{!! $review->text !!}</p>
                                            <div class="d-flex align-items-center justify-content-center author-info">
                                                <img class="img-fluid rounded-circle me-3"
                                                    src="{{ asset('media/review/' . $review->image) }}"
                                                    alt="{{ $review->author }}" style="width: 50px; height: 50px;">
                                                <div>
                                                    <h6 class="mb-0 font-weight-bold">{{ $review->author }}</h6>
                                                    <small>{{ $review->role }}</small>
                                                    @if ($review->video_url)
                                                        @php
                                                            // Convert the YouTube URL to an embeddable format
                                                            $embedUrl = str_replace(
                                                                ['youtu.be/', 'watch?v='],
                                                                'www.youtube.com/embed/',
                                                                $review->video_url,
                                                            );
                                                        @endphp
                                                        <i class="fa fa-play-circle play-icon-center"
                                                            style="cursor: pointer; color: #FF0000; font-size: 1.2rem;"
                                                            onclick="playReviewVideo('{{ $embedUrl }}')"></i>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                    </div>
                </div>
                @foreach ($reviews as $review)
                    @if ($review->video_url)
                        @php
                            // Convert the YouTube URL to an embeddable format
                            $embedUrl = str_replace('youtu.be/', 'www.youtube.com/embed/', $review->video_url);
                            $embedUrl = str_replace('watch?v=', 'embed/', $embedUrl);
                        @endphp
                        <div class="modal fade" id="youtubeModal{{ $review->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="youtubeModalLabel{{ $review->id }}" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="" style="background: #000!important;">
                                        <div class="embed-responsive embed-responsive-16by9">
                                            <iframe class="embed-responsive-item" src="{{ $embedUrl }}"
                                                allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                    <!-- Video Modal -->
                    <div class="modal fade" id="reviewVideoModal" tabindex="-1" role="dialog"
                        aria-labelledby="reviewVideoModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="text-center">
                                    <iframe id="reviewVideoIframe" width="100%" height="500" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <script>
                    // Function to play video in the modal
                    function playReviewVideo(videoUrl) {
                        const reviewVideoIframe = document.getElementById('reviewVideoIframe');

                        // Set the video URL with autoplay enabled
                        reviewVideoIframe.src = `${videoUrl}?autoplay=1&rel=0`;

                        // Show the modal
                        $('#reviewVideoModal').modal('show');

                        // Clear the video iframe when the modal is closed
                        $('#reviewVideoModal').on('hidden.bs.modal', function() {
                            reviewVideoIframe.src = ''; // Clear the src to stop the video
                        });
                    }

                    // Initialize the review carousel (if using Owl Carousel)
                    $(document).ready(function() {
                        $(".unique-testimonial-carousel").owlCarousel({
                            loop: true,
                            margin: 10,
                            nav: false,
                            center: true,
                            items: 1,
                            dots: true,
                            autoplay: true,
                            autoplayTimeout: 3000,
                            smartSpeed: 700,
                            responsive: {
                                0: {
                                    items: 1
                                },
                                600: {
                                    items: 3
                                },
                                1000: {
                                    items: 3
                                }
                            }
                        });
                    });
                </script>
           

            <div class="industries-section ambala-section bg-white pt-0 pb-0 text-center" data-aos="fade-up"
                data-aos-duration="1000">
                <div>
                    <div class=" text-center mb-5">
                        <h3 class="ambala_heading ">Industry we serve</h3>
                        <p class="ambala_sub_heading ">We are committed to transforming industries with unique
                            customized
                            software solutions

                        </p>
                    </div>

                    <div class="industries-row justify-content-center">
                        <div class="col-lg-2 col-md-4 col-sm-4 col-6 ">
                            <div class="industry-icon-wrap">
                                <i class="fas fa-university industry-icon"></i>
                                <p>Finance & Banking</p>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-4 col-6 ">
                            <div class="industry-icon-wrap">
                                <i class="fas fa-shopping-cart industry-icon"></i>
                                <p>E-commerce</p>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-4 col-6">
                            <div class="industry-icon-wrap">
                                <i class="fas fa-network-wired industry-icon"></i>
                                <p>Telco</p>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-4 col-6 ">
                            <div class="industry-icon-wrap">
                                <i class="fas fa-city industry-icon"></i>
                                <p>Real Estate</p>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-4 col-6 ">
                            <div class="industry-icon-wrap">
                                <i class="fas fa-laptop-code industry-icon"></i>
                                <p>Software</p>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-4 col-6 ">
                            <div class="industry-icon-wrap">
                                <i class="fas fa-heartbeat industry-icon"></i>
                                <p>Health & Fitness</p>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-4 col-6 ">
                            <div class="industry-icon-wrap">
                                <i class="fas fa-utensils industry-icon"></i>
                                <p>Food & Drink</p>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-4 col-6 ">
                            <div class="industry-icon-wrap">
                                <i class="fas fa-music industry-icon"></i>
                                <p>Music</p>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-4 col-6 ">
                            <div class="industry-icon-wrap">
                                <i class="fas fa-tv industry-icon"></i>
                                <p>Media</p>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-4 col-6 ">
                            <div class="industry-icon-wrap">
                                <i class="fas fa-graduation-cap industry-icon"></i>
                                <p>Education</p>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-4 col-6 ">
                            <div class="industry-icon-wrap">
                                <i class="fas fa-plane-departure industry-icon"></i>
                                <p>Travel</p>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-4 col-sm-4 col-6 ">
                            <div class="industry-icon-wrap">
                                <i class="fas fa-store industry-icon"></i>
                                <p>Retail</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                <div class=" award bg-white ambala-section text-center " data-aos="fade-right" data-aos-duration="1000">
                    <div>
                        <div class=" text-center mb-5">
                            <h3 class="ambala_heading ">Innovative Tools for Superior Solutions</h3>
                            <p class="ambala_sub_heading ">Emphasize the tools that enhance our development processes and
                                deliver high-quality outcomes</p>
                        </div>
                    </div>
                    <div class="row text-center wow fadeInUp" data-wow-delay=".2s"
                        style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                        @foreach ($technologies as $technology)
                            <div class="col-6 col-md-2 border-end border-bottom">
                                <div class="py-4 img-hover">
                                    <div class="img-container">
                                        <img class="image-70px"
                                            src="{{ asset('media/technologies/' . $technology->image) }}"
                                            alt="{{ $technology->name }}">
                                        <div class="img-shade"></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                
           
        </div>

    @endsection
    <style>
        .title,
        .caption {
            color: white;
            /* Make sure the text is a visible color */
            font-size: 2rem;
            /* Adjust the size as needed */
            text-align: center;
            /* Center the text */
            position: relative;
            /* Ensure it stays inside the slider container */
            z-index: 10;
            /* Make sure the text is above other elements */
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            /* Add a dark overlay to improve text visibility */
            z-index: 5;
        }

        .slide-content {
            position: absolute;
            bottom: 20%;
            left: 50%;
            transform: translateX(-50%);
            z-index: 10;
            text-align: center;
        }
    </style>
