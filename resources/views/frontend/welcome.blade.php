@extends('frontend.app')
@section('title', 'Welcome to Ambala IT')
@section('content')
    <div class=" main-wrapper bg-white">
        <div>
                <div class="hero-section shape_rotated mb-1 pb-1 ">
                    <div class="third-shape"></div>
                    <div class="fourth-shape"></div>
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6 text-start ">
                                <h1 class="ambala_heading2">
                                    Best <span class="ambala_heading"
                                        style="font-size: 2.1rem !important;padding: 0px;">Software Development</span>
                                    <span class="highlight-black">Company</span> for the Next
                                    <span class="highlight-green"> Generation Dreams</span>
                                </h1>
                                <div class="font hero-description mt-2">
                                    @if (isset($video) && $video->video_text)
                                        {!! $video->video_text !!}
                                    @else
                                        <p class="hero-description mt-2"> Default video description goes here.</p>
                                    @endif
                                </div>
                            </div>
                            @if ($video)
                                @php
                                    $embedUrl = str_replace('youtu.be/', 'www.youtube.com/embed/', $video->video_url);
                                    $embedUrl = str_replace('watch?v=', 'embed/', $embedUrl);
                                @endphp
                                <div class="col-lg-6 position-relative">
                                    <div class="video-container">
                                        <img src="{{ $video->video_thumbnail ? asset('media/sliders/' . $video->video_thumbnail) : asset('/img/placeholder/Placeholder image.webp') }}"
                                            alt="Team Working" class="img-fluid video-thumbnail">
                                        <div class="play-button" onclick="playWelcomeVideo('{{ $embedUrl }}')">
                                            <i class="fas fa-play"></i>
                                        </div>
                                        <div class="experience-badge floating-element floating-2 d-none d-lg-block">
                                            <span>{{ \Carbon\Carbon::now()->year - 2016 }}+</span>
                                            <p class="cl-white">Years of Experience</p>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <p class="text-center">No video available.</p>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="welcomeVideoModal" tabindex="-1" role="dialog"
                    aria-labelledby="welcomeVideoModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="text-center">
                                <iframe id="welcomeVideoIframe" width="100%" height="500" frameborder="0"
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                    allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                    function playWelcomeVideo(videoUrl) {
                        const welcomeVideoModal = document.getElementById('welcomeVideoModal');
                        const welcomeVideoIframe = document.getElementById('welcomeVideoIframe');

                        // Set the video URL with autoplay enabled
                        welcomeVideoIframe.src = videoUrl + '?autoplay=1';

                        // Show the modal
                        $('#welcomeVideoModal').modal('show');
                    }

                    // Clear the video iframe when the modal is closed
                    $('#welcomeVideoModal').on('hidden.bs.modal', function() {
                        const welcomeVideoIframe = document.getElementById('welcomeVideoIframe');
                        welcomeVideoIframe.src = ''; // Clear the src to stop the video
                    });
                </script>
                <script>
                    function playVideo() {
                        const videoModal = document.getElementById('videoModal');
                        const videoIframe = document.getElementById('videoIframe');
                        const videoUrl = 'https://www.youtube.com/embed/your-video-id'; // Replace with your video URL
                        videoIframe.src = videoUrl;
                        videoModal.style.display = 'flex';
                    }

                    function closeVideo() {
                        const videoModal = document.getElementById('videoModal');
                        const videoIframe = document.getElementById('videoIframe');
                        videoModal.style.display = 'none';
                        videoIframe.src = ''; // Stop the video when the modal is closed
                    }
                </script>
          
        </div>
        <div class="container">
           
                <!-- About Section -->
                <div class="about top ambala-section " data-aos="fade-up" data-aos-duration="1000">
                    <div>
                        <div class="row align-items-center">

                            <!-- Text Column -->
                            <div class="col-lg-6 col-md-12 font">
                                <div>
                                    <div class="wow fadeInUp" data-wow-delay=".1s">
                                        {{-- <span class="custom_heading">About Ambala IT</span> --}}
                                    </div>
                                    <h3 class="ambala_heading text-nowrap" style="text-align: left;">We are the next
                                        generation of the business world. </h3>
                                    <!-- Check if 'about_text' is available -->
                                    @if (!empty($aboutContent) && !empty($aboutContent->about_text))
                                        <div class="ambala_paragraph">
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

                            <!-- Video Column -->
                            <div class="col-lg-6 col-md-12 pb-5">
                                <div class="experience-image-wrapper position-relative">
                                    {{-- <img src="{{ asset('img/home/ambalait-about-us-image-video.webp') }}" alt="home about image"> --}}
                                    <video autoplay muted loop class="img-fluid">
                                        <source src="{{ asset('/img/home/ambalait-about-us-homepage-video.mp4') }}"
                                            type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
             {{-- service section --}}
             <section class="container pt-3 mb-3">
                 <h2 class="h3 block-title text-center">What we do<small>Whatever we do, we do with your end user in mind </small></h2>
                 <div class="row pt-5 mt-30">
                     <div class="col-lg-4 col-sm-6 mb-30 pb-5">
                         <a class="card" href="#">
                             <div class="box-shadow bg-white rounded-circle mx-auto text-center" style="width: 90px; height: 90px; margin-top: -45px;"><i class="fa fa-user fa-3x head-icon"></i></div>
                             <div class="card-body text-center">
                                 <h3 class="card-title pt-1">UX Prototyping</h3>
                                 <p class="card-text text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p><span class="text-sm text-uppercase font-weight-bold">Learn More&nbsp;<i class="fe-icon-arrow-right"></i></span>
                             </div>
                         </a>
                     </div>
                   
                     <div class="col-lg-4 col-sm-6 mb-30 pb-5">
                         <a class="card" href="#">
                             <div class="box-shadow bg-white rounded-circle mx-auto text-center" style="width: 90px; height: 90px; margin-top: -45px;"><i class="fa fa-camera fa-3x head-icon"></i></div>
                             <div class="card-body text-center">
                                 <h3 class="card-title pt-1">Usability Testing</h3>
                                 <p class="card-text text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p><span class="text-sm text-uppercase font-weight-bold">Learn More&nbsp;<i class="fe-icon-arrow-right"></i></span>
                             </div>
                         </a>
                     </div>
                     <div class="col-lg-4 col-sm-6 mb-30 pb-5">
                         <a class="card" href="#">
                             <div class="box-shadow bg-white rounded-circle mx-auto text-center" style="width: 90px; height: 90px; margin-top: -45px;"><i class="fa fa-image fa-3x head-icon"></i></div>
                             <div class="card-body text-center">
                                 <h3 class="card-title pt-1">SEO Optimization</h3>
                                 <p class="card-text text-sm">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p><span class="text-sm text-uppercase font-weight-bold">Learn More&nbsp;<i class="fe-icon-arrow-right"></i></span>
                             </div>
                         </a>
                     </div>
                 </div>
             </section>
             <style>
                .card::after {
                    display: block;
                    position: absolute;
                    bottom: -10px;
                    left: 20px;
                    width: calc(100% - 40px);
                    height: 35px;
                    background-color: #fff;
                    -webkit-box-shadow: 0 19px 28px 5px rgba(64,64,64,0.09);
                    box-shadow: 0 19px 28px 5px rgba(64,64,64,0.09);
                    content: '';
                    z-index: -1;
                }
                a.card {
                    text-decoration: none;
                }
                
                .card {
                    position: relative;
                    border: 0;
                    border-radius: 0;
                    background-color: #fff;
                    -webkit-box-shadow: 0 12px 20px 1px rgba(64,64,64,0.09);
                    box-shadow: 0 12px 20px 1px rgba(64,64,64,0.09);
                }
                
                .card {
                    position: relative;
                    display: -webkit-box;
                    display: -ms-flexbox;
                    display: flex;
                    -webkit-box-orient: vertical;
                    -webkit-box-direction: normal;
                    -ms-flex-direction: column;
                    flex-direction: column;
                    min-width: 0;
                    word-wrap: break-word;
                    background-color: #fff;
                    background-clip: border-box;
                    border: 1px solid rgba(0,0,0,0.125);
                    border-radius: .25rem;
                }
                
                .box-shadow {
                    -webkit-box-shadow: 0 12px 20px 1px rgba(64,64,64,0.09) !important;
                    box-shadow: 0 12px 20px 1px rgba(64,64,64,0.09) !important;
                }
                
                .ml-auto, .mx-auto {
                    margin-left: auto !important;
                }
                .mr-auto, .mx-auto {
                    margin-right: auto !important;
                }
                .rounded-circle {
                    border-radius: 50% !important;
                }
                .bg-white {
                    background-color: #fff !important;
                }
                
                .ml-auto, .mx-auto {
                    margin-left: auto !important;
                }
                
                .mr-auto, .mx-auto {
                    margin-right: auto !important;
                }
                .d-block {
                    display: block !important;
                }
                img, figure {
                    max-width: 100%;
                    height: auto;
                    vertical-align: middle;
                }
                
                .card-text {
                    padding-top: 12px;
                    color: #8c8c8c;
                }
                
                .text-sm {
                    font-size: 12px !important;
                }
                p, .p {
                    margin: 0 0 16px;
                }
                
                .card-title {
                    margin: 0;
                    font-family: "Montserrat",sans-serif;
                    font-size: 18px;
                    font-weight: 900;
                }
                
                .pt-1, .py-1 {
                    padding-top: .25rem !important;
                }
                
                .head-icon{
                    margin-top:18px;
                    color:#FF4500
                }
            </style>
           {{-- service section --}}
           <h1 class="ambala_heading">our searvices</h1>
            <!-- partner-->
                <div class="main-section ambala-section" data-aos="fade-left" data-aos-duration="1000">
                    <div>
                        <div class=" text-center mb-5">
                            <h3 class="ambala_heading ">Our Partners</h3>
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
