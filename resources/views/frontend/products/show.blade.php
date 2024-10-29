@extends('frontend.app')

@section('title', $new_product->name)

@section('content')
<style type="text/css">
    .product-details{
        box-shadow: none;
    }
    .ambala_heading{
        padding-bottom: 0px;
    }
    .product-details * {
        font-size: 16px !important;
    }
</style>
    <div class="banner-section">
        <div class="product-banner-wrapper">
            <div id="logo-container" class="logo-container">
                @if ($new_product->logo && file_exists(public_path('media/new_product/logos/' . $new_product->logo)))
                    <img src="{{ asset('media/new_product/logos/' . $new_product->logo) }}" alt="Product Logo"
                        id="product-logo" class="img-fluid" />
                @else
                    <img src="{{ asset('media/default-logo.png') }}" alt="Default Logo" id="product-logo"
                        class="img-fluid product-banner" />
                @endif
            </div>

            @if ($new_product->image && file_exists(public_path('media/new_product/images/' . $new_product->image)))
                <img src="{{ asset('media/new_product/images/' . $new_product->image) }}" alt="Product Image"
                    id="product-images" class="img-fluid" />
            @else
                <img src="{{ asset('media/default-image.png') }}" alt="Default Product Image" id="product-image"
                    class="img-fluid" />
            @endif

            <div class="banner-overlay">
                <div class="banner-text">
                    <h3 class="ambala_heading">{{ $new_product->name }}</h3>
                    <p>{!! $new_product->description !!}</p>
                </div>
            </div>
        </div>
    </div>

    <section class="container">
        <div class="product  ambala-section ">
            <div class=" custom-container d-flex align-items-start">
                <div class="row">
                    <!-- Product Details -->
                    <div class="col-md-6">
                        <div class="product-details">
                            <h3 class="ambala_heading text-center" id="product-title">{{ $new_product->name }}</h3>
                            <p class="ambala_paragraph text-start" id="product-description">{!! $new_product->description !!}</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="product-image-container mt-5">
                            @if (
                                $new_product->navmenu_image &&
                                    file_exists(public_path('media/new_product/navmenu_images/' . $new_product->navmenu_image)))
                                <img src="{{ asset('media/new_product/navmenu_images/' . $new_product->navmenu_image) }}"
                                    alt="Navmenu Image" class="img-fluid" style="height: 400px !important;width:auto;" />
                            @else
                                <img src="{{ asset('media/default-navmenu.png') }}" alt="Default Navmenu Image"
                                    class="img-fluid" />
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <div style="padding-top: 0rem; padding-bottom: 3rem;">
                <div class="md">
                    <div class="horizontaltab tab-style01">
                        <ul class="resp-tabs-list hor_1">
                            @foreach ($modules as $new_product_module)
                                @if ($new_product_module->module)
                                    <li data-target="module_{{ $new_product_module->id }}">
                                        @if (
                                            $new_product_module->module->logo &&
                                                file_exists(public_path('media/modules/logos/' . $new_product_module->module->logo)))
                                            <img src="{{ asset('media/modules/logos/' . $new_product_module->module->logo) }}"
                                                alt="{{ $new_product_module->module->name }}"
                                                style="width: 50px; height: 50px; border-radius: 50%;">
                                        @else
                                            <img src="{{ asset('media/default-module-logo.png') }}"
                                                alt="Default Module Logo"
                                                style="width: 50px; height: 50px; border-radius: 50%;">
                                        @endif
                                        <span
                                            class="d-lg-block d-md-inline-block align-top">{{ $new_product_module->module->name }}</span>
                                    </li>
                                @endif
                            @endforeach
                        </ul>

                        <div class="resp-tabs-container hor_1">
                            @foreach ($modules as $module)
                                <div id="module_{{ $module->id }}" style="{{ $loop->first ? '' : 'display:none;' }}"
                                    class="productModule">
                                    <div class="tab-pane fade show active" id="pills-module" role="tabpanel"
                                        aria-labelledby="pills-module-tab">
                                        <div class="container">
                                            <div class="row module-description-container">
                                                <div class="col-lg-5 text-center">
                                                    <!-- Module Image -->
                                                    <img class="product-img"
                                                        src="{{ asset('media/new_product/modules/' . $module->image) }}"
                                                        alt="{{ $module->name }}">
                                                </div>
                                                <div class="col-lg-7 description-text">
                                                    <!-- Module Description -->
                                                    <div class="module-description"
                                                        id="moduleDescription{{ $module->id }}">
                                                        <p class="ambala_paragraph"> {!! $module->description !!}</p>
                                                    </div>

                                                    @if (substr_count(strip_tags($module->description), "\n") > 11 || strlen(strip_tags($module->description)) > 600)
                                                        <a href="javascript:void(0);" class="read_more butn"
                                                            data-bs-toggle="modal"
                                                            data-bs-target="#moduleModal{{ $module->id }}">See more</a>
                                                    @endif
                                                </div>

                                                <!-- Modal for full description -->
                                                <div class="modal fade" id="moduleModal{{ $module->id }}" tabindex="-1"
                                                    aria-labelledby="moduleModalLabel{{ $module->id }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="moduleModalLabel{{ $module->id }}">
                                                                    {{ $module->name }}</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p class="ambala_paragraph"> {!! $module->description !!}</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modals for Modules -->
            @foreach ($modules as $module)
                <div class="modal fade" id="moduleModal{{ $module->id }}" tabindex="-1"
                    aria-labelledby="moduleModalLabel{{ $module->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="moduleModalLabel{{ $module->id }}">{{ $module->name }}
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                {!! $module->description !!}
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="butn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

            <!-- FAQ and Video Section -->
            <div class="row">
                <hr />
                <!-- Flexbox Container for FAQ and Video -->
                <div class="faq-video-container d-flex align-items-start">
                    <!-- FAQ Section -->
                    <div class="faq-section col-md-6">
                        <h3 class="ambala_heading pt-2 pb-3">FAQ</h3>
                        <div class="accordion" id="faqAccordion">
                            @foreach ($new_product->faqs as $index => $faq)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="heading{{ $index }}">
                                        <button class="accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseFaq{{ $index }}"
                                            aria-expanded="false" aria-controls="collapseFaq{{ $index }}">
                                            {{ $faq->question }}
                                        </button>
                                    </h2>
                                    <div id="collapseFaq{{ $index }}" class="accordion-collapse collapse"
                                        aria-labelledby="heading{{ $index }}" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            {!! $faq->answer !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <!-- Video Section -->
                    <div class="video-section col-md-6">
                        <h3 class="ambala_heading pt-3 pb-3">Video</h3>
                        <div class="embed-responsive embed-responsive-16by9">
                            @if ($new_product->video_url)
                                <iframe class="embed-responsive-item" src="{{ $new_product->video_url }}"
                                    allowfullscreen></iframe>
                            @else
                                <p>No video available for this product.</p>
                            @endif
                        </div>

                        <!-- Brochure Download Section -->
                        <div class="download-section mt-2 p-4 text-center">
                            <h4 class="card-title">Download Brochure</h4>
                            @if ($new_product->brochure && file_exists(public_path('media/new_product/brochures/' . $new_product->brochure)))
                                <div class="text-center pt-3">
                                    <a href="{{ asset('media/new_product/brochures/' . $new_product->brochure) }}"
                                        class="butn btn-danger read_more pt-3" download>
                                        <i class="fas fa-file-pdf"></i> Download PDF
                                    </a>
                                </div>
                            @else
                                <p class="text-center">No brochure available for this product.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.see-more-module').on('click', function() {
                var moduleId = $(this).data('bs-target');
                $(moduleId).modal('show');
            });
        });
    </script>
@endsection
