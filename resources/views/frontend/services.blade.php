@extends('frontend.app')
@section('title', 'Service')

@section('content')

<div class="banner-section">
    <div class="banner-wrapper">
        <img src="{{ $settings && $settings->service_banner ? asset($settings->service_banner) : asset('/img/placeholder/Placeholder image-banner.webp') }}"
        alt="Service Banner" class="img-fluid">
        <div class="banner-overlay">
            <div class="banner-text">
                <h1>Welcome to Ambala IT</h1>
                <p>Innovative Solutions for a Digital World</p>
            </div>
        </div>
    </div>
</div>

<section class="container pt-5 services-section">
    <h2 class="rp_heading text-center">Our Services</h2>

    <!-- Service 1 - Technical Support -->
    <div class="service-row row my-5 align-items-center fade-in">
        <div class="col-md-6 text-center">
            <div class="icon-wrapper parallax-icon">
                <i class="fas fa-user-cog"></i>
            </div>
        </div>
        <div class="col-md-6">
            <h3 class="service-title">Technical Support</h3>
            <p class="service-description">Our technical team is available round the clock to support you. With a team of highly skilled engineers, consultants, and experts, RUPGONJ SCIENTIFICS ensures top-notch support for all your needs.</p>
            <p>We believe in maintaining a proactive approach, addressing potential issues before they impact your business operations.</p>
        </div>
    </div>

    <!-- Service 2 - Committed to Quality -->
    <div class="service-row row my-5 align-items-center fade-in">
        <div class="col-md-6 order-md-2 text-center">
            <div class="icon-wrapper parallax-icon">
                <i class="fa-solid fa-star"></i>
            </div>
        </div>
        <div class="col-md-6 order-md-1">
            <h3 class="service-title">Committed to Quality</h3>
            <p class="service-description">Quality is central to our operations. RUPGONJ SCIENTIFICS is dedicated to providing products that meet the highest standards, which are essential for our customers' success and our growth.</p>
            <p>Our commitment to quality permeates every level of our service, from product selection to customer support, ensuring that you receive only the best.</p>
        </div>
    </div>

    <!-- Service 3 - 2 in 1 Solution -->
    <div class="service-row row my-5 align-items-center fade-in">
        <div class="col-md-6 text-center">
            <div class="icon-wrapper parallax-icon">
                <i class="fa-regular fa-folder-open"></i>
            </div>
        </div>
        <div class="col-md-6">
            <h3 class="service-title">2 in 1 Solution</h3>
            <p class="service-description">We go beyond selling products by providing compact, integrated solutions tailored to your needs. Our solutions are designed to streamline your operations and improve efficiency.</p>
            <p>Whether you need standalone products or a comprehensive package, we adapt our offerings to meet your unique requirements, ensuring long-term satisfaction.</p>
        </div>
    </div>
</section>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const observerOptions = {
            threshold: 0.4 // Trigger animations when 40% of the element is visible
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
                const parallaxFactor = 0.1;
                icon.style.transform = `translateY(${scrollY * parallaxFactor}px)`;
            });
        });
    });
</script>
@endsection

<style>
    /* General Styling */
    .services-section {
        padding-top: 3rem;
        padding-bottom: 3rem;
    }

    .services-section h2 {
        font-size: 2.5rem;
        font-weight: bold;
        color: #123456;
        text-transform: uppercase;
        position: relative;
    }

    .services-section h2::after {
        content: '';
        display: block;
        width: 50px;
        height: 3px;
        background-color: #123456;
        margin: 0.5rem auto;
    }

    /* Service Row Styling */
    .service-row {
        padding: 2rem;
        background: rgba(255, 255, 255, 0.8);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .service-row:hover {
        transform: translateY(-10px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
    }

    /* Icon Wrapper */
    .icon-wrapper {
        width: 100px;
        height: 100px;
        background-color: #98c1d9;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #ffffff;
        font-size: 2.5rem;
        margin-bottom: 1rem;
        transition: transform 0.3s ease-out;
    }

    /* Service Titles and Descriptions */
    .service-title {
        color: #123456;
        font-size: 1.75rem;
        font-weight: bold;
    }

    .service-description {
        color: #555;
        font-size: 1.1rem;
        line-height: 1.6;
        margin-bottom: 1rem;
    }

    /* Fade-in Animation */
    .fade-in {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 1s ease, transform 1s ease;
    }

    .fade-in.visible {
        opacity: 1;
        transform: translateY(0);
    }

    /* Parallax Effect */
    .parallax-icon {
        transition: transform 0.3s ease-out;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .icon-wrapper {
            width: 80px;
            height: 80px;
            font-size: 2rem;
        }

        .service-title {
            font-size: 1.5rem;
        }
    }
</style>
