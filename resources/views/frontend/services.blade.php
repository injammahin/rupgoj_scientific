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
<section class="service ">
    <div class="container pt-4 pb-0">
        <div class="row align-items-center  ambala-section" data-aos="fade-up" data-aos-duration="1000">
            <div class="col-lg-5">
                <div class="image-wrapper">
                    <img src="{{ asset('/img/services/Service-webp/Software-Development-service-ambalait-company.webp') }}"
                    alt="Adaptive Software Development" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="card-body">
                    <h3 class="ambala_heading">Software Development</h3>
                    <p class="ambala_paragraph">Our Adaptive Software Development service focuses on delivering robust,
                        scalable,
                        and custom software solutions tailored to your business needs. From conceptualization to
                        deployment,
                    we provide end-to-end development services.</p>
                    <a href="{{ route('frontend.services.adaptive-software-development') }}"
                    class="butn  read_more">Read More</a>
                </div>
            </div>
        </div>
        <div class="row align-items-center  ambala-section" data-aos="fade-right" data-aos-duration="1000">
            <div class="col-lg-5 order-lg-2">
                <div class="image-wrapper">
                    <img src="{{ asset('/img/services/Service-webp/Web-Application-Development-service-ambalait-company.webp') }}"
                    alt="Web-Application-Development-service.jpg" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-7 order-lg-1">
                <div class="card-body">
                    <h3 class="ambala_heading">Web Development </h3>
                    <p class="ambala_paragraph">We build dynamic, interactive, and user-friendly web applications to
                        enhance your
                        digital presence. Our team specializes in front-end and back-end development to create
                        seamless
                    experiences for users.</p>
                    <a href="{{ route('frontend.services.web-application-development-services') }}"
                    class="butn read_more">Read More</a>
                </div>
            </div>
        </div>

        <!-- Service 3: Mobile App Development -->
        <div class="row align-items-center  ambala-section" data-aos="fade-left" data-aos-duration="1000">

            <div class="col-lg-5">
                <div class="image-wrapper">
                    <img src="{{ asset('/img/services/Service-webp/mobile-app-development-ambalait-agency.webp') }}"
                    alt="Web-Application-Development-service.jpg" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="card-body">
                    <h3 class="ambala_heading">Mobile App Development</h3>
                    <p class="ambala_paragraph">Our Mobile App Development service is designed to create
                        high-performance,
                        feature-packed mobile applications for both iOS and Android platforms. We focus on creating
                    intuitive user experiences.</p>
                    <a href="{{ route('frontend.services.mobile-app-development') }}" class="butn read_more">Read
                    More</a>
                </div>
            </div>
        </div>

        <!-- Service 4: Cybersecurity Services -->
        <div class="row align-items-center  ambala-section" data-aos="fade-down" data-aos-duration="1000">

            <div class="col-lg-5 order-lg-2">
                <div class="image-wrapper">
                    <img src="{{ asset('/img/services/Service-webp/cybersecurity-service-ambalait-company.webp') }}"
                    alt="Web-Application-Development-service.jpg" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-7 order-lg-1">
                <div class="card-body">
                    <h3 class="ambala_heading">Cybersecurity Services</h3>
                    <p class="ambala_paragraph">We offer comprehensive cybersecurity services to protect your business
                        from cyber
                        threats. Our solutions include risk assessment, vulnerability management, and incident
                        response to
                    safeguard your digital assets.</p>
                    <a href="{{ route('frontend.services.cybersecurity-companies') }}" class="butn read_more">Read
                    More</a>
                </div>
            </div>
        </div>

        <!-- Service 5: QA Testing -->
        <div class="row align-items-center  ambala-section " data-aos="fade-up" data-aos-duration="1000">
            <div class="col-lg-5">
                <div class="image-wrapper">
                    <img src="{{ asset('/img/services/Service-webp/Quality-tasting-ambalait-company.webp') }}"
                    alt="Web-Application-Development-service.jpg" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="card-body">
                    <h3 class="ambala_heading">QA Testing</h3>
                    <p class="ambala_paragraph">Ensure your software is bug-free and meets the highest quality standards
                        with our
                        QA Testing services. Our team employs manual and automated testing techniques for optimal
                    performance.</p>
                    <a href="{{ route('frontend.services.software-quality-and-assurance') }}"
                    class="butn read_more">Read More</a>
                </div>
            </div>
        </div>

        <!-- Service 6: ERP Solution -->
        <div class="row align-items-center  ambala-section" data-aos="fade-right" data-aos-duration="1000">
            <div class="col-lg-5 order-lg-2">
                <div class="image-wrapper">
                    <img src="{{ asset('/img/services/Service-webp/ERP-solution-service-ambalait-company.webp') }}"
                    alt="Web-Application-Development-service.jpg" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-7 order-lg-1">
                <div class="card-body">
                    <h3 class="ambala_heading">ERP Solution</h3>
                    <p class="ambala_paragraph">Optimize your business processes with our ERP Solution. We provide
                        customized ERP
                        systems to streamline your operations, enhance productivity, and improve decision-making
                    capabilities.</p>
                    <a href="{{ route('frontend.services.enterprise-resource-planning-systems') }}"
                    class="butn read_more">Read More</a>
                </div>
            </div>
        </div>

        <!-- Service 7: API Development and Integration -->
        <div class="row align-items-center ambala-section" data-aos="fade-left" data-aos-duration="1000">
            <div class="col-lg-5">
                <div class="image-wrapper">
                    <img src="{{ asset('/img/services/Service-webp/API-Development-service-ambalait-company.webp') }}"
                    alt="Web-Application-Development-service.jpg" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="card-body">
                    <h3 class="ambala_heading">API Development </h3>
                    <p class="ambala_paragraph">We offer API Development and Integration services to enhance your
                        software
                        capabilities and enable seamless communication between different platforms and applications.
                    </p>
                    <a href="{{ route('frontend.services.api-development') }}" class="butn read_more">Read
                    More</a>
                </div>
            </div>
        </div>

        <!-- Service 8: UI/UX Design Services -->
        <div class="row align-items-center  ambala-section" data-aos="fade-down" data-aos-duration="1000">
            <div class="col-lg-5 order-lg-2">
                <div class="image-wrapper">
                    <img src="{{ asset('/img/services/Service-webp/UI-UX-design- service-ambalait-company.webp') }}"
                    alt="Web-Application-Development-service.jpg" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-7 order-lg-1">
                <div class="card-body">
                    <h3 class="ambala_heading">UI/UX Design </h3>
                    <p class="ambala_paragraph">Create a stunning and user-friendly interface with our UI/UX Design
                        Services. Our
                    experts design intuitive and visually appealing interfaces to enhance user experience.</p>
                    <a href="{{ route('frontend.services.uiux-design-agencies') }}" class="butn read_more">Read
                    More</a>
                </div>
            </div>
        </div>

        <!-- Service 9: IT Consulting Services -->
        <div class="row align-items-center  ambala-section " data-aos="fade-up" data-aos-duration="1000">
            <div class="col-lg-5">
                <div class="image-wrapper">
                    <img src="{{ asset('/img/services/Service-webp/IT-Consulting-service-ambalait-company.webp') }}"
                    alt="Web-Application-Development-service.jpg" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="card-body">
                    <h3 class="ambala_heading">IT Consulting </h3>
                    <p class="ambala_paragraph">Our IT Consulting Services help businesses to leverage technology for
                        growth. We
                        provide expert guidance on IT strategy, infrastructure, and operations to optimize
                    efficiency.</p>
                    <a href="{{ route('frontend.services.it-consulting-services') }}" class="butn read_more">Read
                    More</a>
                </div>
            </div>
        </div>

        <!-- Service 10: Digital Transformation -->
        <div class="row align-items-center ambala-section" data-aos="fade-right" data-aos-duration="1000">
            <div class="col-lg-5 order-lg-2">
                <div class="image-wrapper">
                    <img src="{{ asset('/img/services/Service-webp/DIgital-Transformation-service-ambalait-company.webp') }}"
                    alt="Web-Application-Development-service.jpg" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-7 order-lg-1">
                <div class="card-body">
                    <h3 class="ambala_heading">Digital Transformation</h3>
                    <p class="ambala_paragraph">Embrace the digital age with our Digital Transformation services. We
                        help
                        you to
                    reimagine your business processes and models using the latest digital technologies.</p>
                    <a href="{{ route('frontend.services.digital-transformation') }}" class="butn read_more">Read
                    More</a>
                </div>
            </div>
        </div>

        <!-- Service 11: E-commerce Development -->
        <div class="row align-items-center  ambala-section " data-aos="fade-left" data-aos-duration="1000">
            <div class="col-lg-5">
                <div class="image-wrapper">
                    <img src="{{ asset('/img/services/Service-webp/E-commerce-Development-ambalait-company.webp') }}"
                    alt="Web-Application-Development-service.jpg" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-7">
                <div class="card-body">
                    <h3 class="ambala_heading">E-commerce Development</h3>
                    <p class="ambala_paragraph">Boost your online sales with our E-commerce Development services. We
                        build
                        scalable, secure, and high-performing e-commerce platforms tailored to your business goals.
                    </p>
                    <a href="{{ route('frontend.services.build-ecommerce-websites') }}" class="butn read_more">Read
                    More</a>
                </div>
            </div>
        </div>

        <!-- Service 12: Digital Marketing Services -->
        <div class="row align-items-center  ambala-section " data-aos="fade-down" data-aos-duration="1000">
            <div class="col-lg-5 order-lg-2">
                <div class="image-wrapper">
                    <img src="{{ asset('/img/services/Service-webp/Digital-marketing-service-ambalait-company.webp') }}"
                    alt="Web-Application-Development-service.jpg" class="img-fluid">
                </div>
            </div>
            <div class="col-lg-7 order-lg-1">
                <div class="card-body">
                    <h3 class="ambala_heading">Digital Marketing </h3>
                    <p class="ambala_paragraph">Expand your brand's reach and drive traffic with our Digital Marketing
                        Services. We
                        provide SEO, PPC, Social Media Marketing, and Content Marketing to achieve your marketing
                    objectives.</p>
                    <a href="{{ route('frontend.services.digital-marketing-agency') }}" class="butn read_more">Read
                    More</a>
                </div>
            </div>
        </div>
    </div>

    <div align="center" class="mb-5">
        <a href="{{ route('frontend.contract_us') }}" class="butn btn-danger text-center mt-3">Free Quote</a>
    </div>


    <style type="text/css">
        .ambala-section {
            padding-top: 0px;
            padding-bottom: 2.5rem !important;
        }
        @media (min-width: 992px) {
            .col-lg-5 {
                flex: 0 0 auto;
                height: auto !important; 
                width: 41.666667%;
            }
        }
    </style>
    @endsection




    @section('scripts')

    @endsection
    <style>
        .service-details {
            padding: 3rem 0;
            background-color: #f8f9fa;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 2rem;
        }

        .service-details h3 {
            font-size: 2rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 1rem;
        }

        /* .service-details p {
            font-size: 1.1rem;
            line-height: 1.6;
            color: #555;
            margin-bottom: 1.5rem;
        } */

        .image-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            max-width: 100%;
            overflow: hidden;
        }

        .service-img {
            /* width: 700px !important;
            height: 450px !important; */
            /* Set a max height to make all images uniform */
            object-fit: cover;
            /* Ensures images cover the defined area without stretching */
            border-radius: 10px;
        }

        .wow {
            visibility: hidden;
        }

        .fadeInUp {
            animation-name: fadeInUp;
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translate3d(0, 40px, 0);
            }

            to {
                opacity: 1;
                transform: none;
            }
        }

    </style>

