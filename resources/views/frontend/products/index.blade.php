@extends('frontend.app')
@section('title', 'Products')

@section('content')


    <div class="banner-section">
        <div class="banner-wrapper">
            <img src="{{ $settings && $settings->product_banner ? asset($settings->product_banner) : asset('/img/placeholder/Placeholder image-banner.webp') }}"
                alt="Product Banner" class="img-fluid">
            <div class="banner-overlay">
                <div class="banner-text">
                    <h1>Our Products</h1>
                    <p>Explore our innovative and high-quality products</p>
                </div>
            </div>
        </div>
    </div>


    <section class=" container">
        <div>
            @if (isset($new_products) && count($new_products) > 0)
                <div class="text-center pt-5 pb-5">
                    <h3 class="center ambala_heading ">Our Range of Products</h3>
                    <p class="ambala_sub_heading">Discover the perfect solution for your needs with our extensive range of
                        products.</p>
                </div>
                <div class=" product row product-row">
                    @foreach ($new_products as $index => $new_product)
                        <div class="row align-items-start  bg-white ambala-section wow fadeInUp"
                            data-wow-delay="{{ $index * 0.2 }}s">
                            @if ($index % 2 == 0)
                                <div class="col-lg-5">
                                    <div class="image-wrapper">
                                        <img src="{{ asset('media/new_product/thumbs/' . $new_product->thumb_image) }}"
                                            alt="{{ $new_product->name }}" class="product-img">
                                    </div>
                                </div>
                                <div class="col-lg-7">
                                    <h3 class="ambala_heading">{{ $new_product->name }}</h3>
                                    <p class="ambala_paragraph">
                                        {{ Str::limit(strip_tags($new_product->short_description), 300) }}
                                    </p>
                                    <a href="{{ route('frontend.product.details', $new_product->slug) }}"
                                        class="butn read_more">Read More</a>
                                </div>
                            @else
                                <div class="col-lg-5 order-lg-2 ">
                                    <div class="image-wrapper">
                                        <img src="{{ asset('media/new_product/thumbs/' . $new_product->thumb_image) }}"
                                            alt="{{ $new_product->name }}" class="product-img">
                                    </div>
                                </div>
                                <div class="col-lg-7 order-lg-1">
                                    <h3 class="ambala_heading">{{ $new_product->name }}</h3>
                                    <p class="ambala_paragraph">
                                        {{ Str::limit(strip_tags($new_product->short_description), 300) }}</p>
                                    <a href="{{ route('frontend.product.details', $new_product->slug) }}"
                                        class="butn read_more">Read More</a>

                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>
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
