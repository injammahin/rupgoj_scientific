@extends('frontend.app')
@section('title', 'About Us')

@section('content')

    <div class="banner-section">
        <div class="banner-wrapper">
            {{-- Show Product Banner from Settings --}}
            <img src="{{ $settings && $settings->about_banner ? asset($settings->about_banner) : asset('/img/placeholder/Placeholder image-banner.webp') }}"
                alt="about Banner" class="img-fluid">
            <div class="banner-overlay">
                <div class="banner-text">
                    <h1>Welcome to Ambala IT</h1>
                    <p>Innovative Solutions for a Digital World</p>
                </div>
            </div>
        </div>
    </div>

    <div class="about container">
        <div class="about top ambala-section " data-aos="fade-up" data-aos-duration="1000">
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
                                <img src="{{ asset('/img/home/Untitled design (2).png') }}" alt="About Us Image" class="about-img spinning-image">
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

        <div class="about ambala-section" data-aos="fade-down" data-aos-duration="1000">
            <div class="container">
                <div class="row  center text-center">
                    <!-- Tech Partners -->
                    <div class="col-md-4 col-lg-2 mb-4 wow fadeInUp" data-wow-delay=".2s">
                        <div class="icon mb-3">
                            <i class="fas fa-handshake fa-3x"></i>
                        </div>
                        <h3 class="ambala_heading mb-0">
                            <span class="countup">{{ $statistics['Tech Partners']->value ?? 0 }}</span>+
                        </h3>
                        <p class="center ambala_padding">Tech Partners</p>
                    </div>
                    <!-- Second Item -->
                    <div class="col-md-4 col-lg-2 mb-4 wow fadeInUp" data-wow-delay=".4s">
                        <div class="icon mb-3">
                            <i class="fas fa-clock fa-3x "></i>
                        </div>
                        <h3 class="ambala_heading mb-0 h1"><span
                                class="countup">{{ \Carbon\Carbon::now()->year - 2016 }}</span>+</h3>
                        <p class="center ambala_padding">Years of Experience</p>
                    </div>

                    <!-- Countries Served -->
                    <div class="col-md-4 col-lg-2 mb-4 wow fadeInUp" data-wow-delay=".4s">
                        <div class="icon mb-3">
                            <i class="fas fa-globe fa-3x"></i>
                        </div>
                        <h3 class="ambala_heading mb-0 h1">
                            <span class="countup">{{ $statistics['Countries Served']->value ?? 0 }}</span>+
                        </h3>
                        <p class="center ambala_padding">Countries Served</p>
                    </div>

                    <!-- IT Professionals -->
                    <div class="col-md-4 col-lg-2 mb-4 wow fadeInUp" data-wow-delay=".6s">
                        <div class="icon mb-3">
                            <i class="fas fa-user-tie fa-3x"></i>
                        </div>
                        <h3 class="ambala_heading mb-0 h1">
                            <span class="countup">{{ $statistics['IT Professionals']->value ?? 0 }}</span>+
                        </h3>
                        <p class="center ambala_padding">IT Professionals</p>
                    </div>

                    <!-- Projects Completed -->
                    <div class="col-md-4 col-lg-2 mb-4 wow fadeInUp" data-wow-delay=".8s">
                        <div class="icon mb-3">
                            <i class="fas fa-check-circle fa-3x"></i>
                        </div>
                        <h3 class="ambala_heading mb-0 h1">
                            <span class="countup">{{ $statistics['Projects Completed']->value ?? 0 }}</span>%
                        </h3>
                        <p class="center ambala_padding">Projects Completed</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="about  ambala-section " data-aos="fade-left" data-aos-duration="1000">
            @if (isset($aboutContent) && $aboutContent->vision_text)
                <div class="row align-items-center d-flex align-items-start">
                    <div class="col-lg-6 text-start wow fadeInLeft">
                        <img src="{{ $aboutContent->vision_image ? asset('uploads/about/' . $aboutContent->vision_image) : asset('/img/placeholder/Placeholder image.webp') }}"
                            alt="Vision Image" class="img-fluid vision-mission-img rounded shadow">
                    </div>
                    <div class="col-lg-6 wow fadeInRight mt-5">
                        <div class="ps-sm-4 ps-xl-5">
                            <h3 class=" text-start rp_heading" style="text-align: left !important;">Our Vision</h3>
                            <div class="ambala_paragraph font">
                                <p class="ambala_paragraph mb-4 ">
                                    {!! $aboutContent->vision_text !!}

                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if (isset($aboutContent) && $aboutContent->mission_text)
                <div class="row align-items-center text-start mt-5">
                    <div class="col-lg-6 wow fadeInLeft order-2 order-lg-1">
                        <div>
                            <h3 class=" text-start rp_heading" style="text-align: left !important;" >Our Mission</h3>
                            <div class="ambala_paragraph font ">
                                <p class="ambala_paragraph mb-4 ">
                                    {!! $aboutContent->mission_text !!}

                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 text-end pb-3 pb-lg-0 wow fadeInRight order-1 order-lg-2">
                        <img src="{{ $aboutContent->mission_image ? asset('uploads/about/' . $aboutContent->mission_image) : asset('/img/placeholder/Placeholder image.webp') }}"
                            alt="Mission Image" class="img-fluid rounded vision-mission-img shadow">
                    </div>
                </div>
            @endif
        </div>
         <!-- revirew-->
         <style>
            /* Styling the Testimonial Section */
            .about {
                padding: 50px 0;
                overflow: hidden;
            }
    
            .rp_heading {
                font-size: 2.5rem;
                font-weight: bold;
                color: #4CAF50; /* Green heading */
            }
    
            .ambala_sub_heading {
                font-size: 1.1rem;
                color: #666;
                margin-bottom: 2rem;
            }
    
            /* Carousel styling */
            .unique-testimonial-carousel .item {
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 20px;
            }
    
            .unique-testimonial-block {
                max-width: 600px;
                background-color: #fff;
                border-radius: 15px;
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
                padding: 30px;
                position: relative;
                overflow: hidden;
                transition: transform 0.3s;
                z-index: 1;
            }
    
            .unique-testimonial-block:hover {
                transform: scale(1.05);
                box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
            }
    
            .quote {
                font-size: 3rem;
                color: #4CAF50;
                position: absolute;
                top: 10px;
                left: 20px;
                opacity: 0.1;
                z-index: -1;
            }
    
            .review-text {
                font-size: 1rem;
                color: #333;
                margin-bottom: 20px;
                line-height: 1.6;
            }
    
            .author-info h6 {
                margin: 0;
                font-weight: bold;
            }
    
            .author-info small {
                color: #777;
            }
    
            /* Play button styling */
            .play-icon-center {
                cursor: pointer;
                color: #FF0000;
                font-size: 1.4rem;
                margin-left: 10px;
                transition: transform 0.3s;
            }
    
            .play-icon-center:hover {
                transform: scale(1.2);
            }
    
            /* Parallax effect */
            .about {
                background-attachment: fixed;
                background-size: cover;
            }
    
            /* Animation effects */
            [data-aos="fade-right"] {
                transform: translateX(-50px);
                opacity: 0;
                transition: all 1s ease;
            }
    
            [data-aos="fade-right"].aos-animate {
                transform: translateX(0);
                opacity: 1;
            }
    </style> 
    <div class="about ambala-section bg-white" data-aos="fade-right" data-aos-duration="1000">
        <div class="container">
            <div class="text-center mb-5">
                <h3 class="rp_heading">Testimonials from Our Respected Clients</h3>
                <p class="ambala_sub_heading">Trusted by leading brands, we deliver exceptional software solutions that drive results.</p>
            </div>
            <div class="unique-testimonial-carousel owl-carousel owl-theme">
                @foreach ($reviews as $review)
                    <div class="item" data-aos="fade-up" data-aos-duration="1000">
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
                                            $embedUrl = str_replace(['youtu.be/', 'watch?v='], 'www.youtube.com/embed/', $review->video_url);
                                        @endphp
                                        <i class="fa fa-play-circle play-icon-center" onclick="playReviewVideo('{{ $embedUrl }}')"></i>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    
    <!-- Video Modal -->
    <div class="modal fade" id="reviewVideoModal" tabindex="-1" role="dialog" aria-labelledby="reviewVideoModalLabel" aria-hidden="true">
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
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init();
    
        // Function to play video in the modal
        function playReviewVideo(videoUrl) {
            const reviewVideoIframe = document.getElementById('reviewVideoIframe');
            reviewVideoIframe.src = `${videoUrl}?autoplay=1&rel=0`;
            $('#reviewVideoModal').modal('show');
    
            $('#reviewVideoModal').on('hidden.bs.modal', function () {
                reviewVideoIframe.src = '';
            });
        }
    
        // Initialize the Owl Carousel for testimonials
        $(document).ready(function () {
            $(".unique-testimonial-carousel").owlCarousel({
                loop: true,
                margin: 20,
                nav: false,
                center: true,
                items: 1,
                dots: true,
                autoplay: true,
                autoplayTimeout: 4000,
                smartSpeed: 800,
                responsive: {
                    0: { items: 1 },
                    600: { items: 2 },
                    1000: { items: 3 }
                }
            });
        });
    </script>
    @endsection

    @section('scripts')
        <script>
            AOS.init({
                duration: 1200,
            });

            // Count Up Animation
            $('.countup').each(function() {
                $(this).prop('Counter', 0).animate({
                    Counter: $(this).text()
                }, {
                    duration: 4000,
                    easing: 'swing',
                    step: function(now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            });
        </script>
    @endsection
