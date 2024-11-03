@extends('frontend.app')

@section('title', $mainProduct->name . ' - Sub Products')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4 text-center">{{ $mainProduct->name }} - Sub Products</h1>
    <div class="row">
        @foreach ($subProducts as $subProduct)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-lg border-0 rounded parallax-card fade-in-effect">
                    <!-- Thumbnail Image -->
                    <div class="parallax-image-wrapper">
                        @if ($subProduct->thumb_image && file_exists(public_path('media/new_product/thumbs/' . $subProduct->thumb_image)))
                            <img src="{{ asset('media/new_product/thumbs/' . $subProduct->thumb_image) }}" class="card-img-top img-fluid rounded-top parallax-image" alt="{{ $subProduct->name }}">
                        @else
                            <img src="{{ asset('media/default-thumb.png') }}" class="card-img-top img-fluid rounded-top parallax-image" alt="Default Thumbnail">
                        @endif
                    </div>

                    <div class="card-body text-center">
                        <!-- Sub-Product Name and Short Description -->
                        <h5 class="card-title text-truncate">{{ $subProduct->name }}</h5>
                        <div class="card-text summernote-content">
                            {!! Str::limit(strip_tags($subProduct->short_description), 150, '...') !!}
                        </div>
                        <a href="{{ route('frontend.product.details', $subProduct->slug) }}" class="btn btn-primary mt-3">View Product</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

@section('styles')
<style>
    /* Styling for the card */
    .parallax-card {
        background: #f7f7f7;
        border-radius: 15px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        position: relative;
        overflow: hidden;
        min-height: 28rem;
    }

    .parallax-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
    }

    /* Parallax Image Wrapper */
    .parallax-image-wrapper {
        overflow: hidden;
        height: 200px;
        position: relative;
    }

    .parallax-image {
        transition: transform 0.5s ease-out;
        width: 100%;
        height: auto;
    }

    /* Card text styling */
    .card-title {
        font-weight: bold;
        color: #123456;
        font-size: 1.3rem;
        margin-top: 1rem;
    }

    .summernote-content {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        line-height: 1.5em;
        max-height: 4.5em; /* To show 3 lines of content */
    }

    /* Fade-in animation */
    .fade-in-effect {
        opacity: 0;
        transform: translateY(30px);
        transition: opacity 1s ease, transform 1s ease;
    }

    .fade-in-effect.visible {
        opacity: 1;
        transform: translateY(0);
    }
</style>
@endsection

@section('scripts')
<script>
    // Parallax and fade-in effects on scroll
    document.addEventListener('DOMContentLoaded', function () {
        // Fade-in Observer
        const fadeInObserverOptions = {
            threshold: 0.2 // Trigger fade-in when 20% of element is visible
        };

        const fadeInObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                } else {
                    entry.target.classList.remove('visible');
                }
            });
        }, fadeInObserverOptions);

        const fadeInElements = document.querySelectorAll('.fade-in-effect');
        fadeInElements.forEach(element => fadeInObserver.observe(element));

        // Parallax Effect on Scroll
        window.addEventListener('scroll', function () {
            const scrollY = window.scrollY || window.pageYOffset;
            const parallaxImages = document.querySelectorAll('.parallax-image');

            parallaxImages.forEach(image => {
                const parallaxFactor = 0.2; // Adjust this to control the strength of the parallax effect
                image.style.transform = `translateY(${scrollY * parallaxFactor}px)`;
            });
        });
    });
</script>
@endsection
