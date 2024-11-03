@extends('backend.app')
@section('title', 'Edit Product - ' . $new_product->name)
@section('content')
    <div class="content-wrapper">
        <div class="p-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Edit Product - {{ $new_product->name }}</h3>
                    <a href="{{ route('backend.new_products.index') }}" class="btn btn-sm btn-info ml-auto">
                        <i class="fas fa-arrow-left"></i> Back to Products
                    </a>
                </div>
                <div class="card-body">
                    <form id="productForm" action="{{ route('backend.new_products.update', $new_product->id) }}"
                        method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Main Product Selection -->
                        <div class="mb-3">
                            <label for="main_product_id" class="form-label">Main Product</label>
                            <select name="main_product_id" id="main_product_id" class="form-control" required>
                                <option value="">Select Main Product</option>
                                @foreach($main_products as $main_product)
                                    <option value="{{ $main_product->id }}" {{ $new_product->main_product_id == $main_product->id ? 'selected' : '' }}>
                                        {{ $main_product->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Product Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ $new_product->name }}" required>
                        </div>

                        <!-- Short Description -->
                        <div class="mb-3">
                            <label for="short_description" class="form-label">Short Description</label>
                            <textarea name="short_description" id="short_description" class="form-control summernote" required>{{ $new_product->short_description }}</textarea>
                        </div>

                        <!-- Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control summernote" required>{{ $new_product->description }}</textarea>
                        </div>

                        <!-- Product Logo -->
                        <div class="mb-3">
                            <label for="logo" class="form-label">Product Logo (120 × 115)</label>
                            @if ($new_product->logo)
                                <div class="mb-2">
                                    <img src="{{ asset('media/new_product/logos/' . $new_product->logo) }}" alt="Logo"
                                        width="100">
                                </div>
                            @endif
                            <input type="file" name="logo" id="logo" class="form-control" accept="image/*">
                        </div>

                        <!-- Thumbnail Image -->
                        <div class="mb-3">
                            <label for="thumb_image" class="form-label">Thumbnail Image (450 × 280)</label>
                            @if ($new_product->thumb_image)
                                <div class="mb-2">
                                    <img src="{{ asset('media/new_product/thumbs/' . $new_product->thumb_image) }}"
                                        alt="Thumb Image" width="100">
                                </div>
                            @endif
                            <input type="file" name="thumb_image" id="thumb_image" class="form-control" accept="image/*">
                        </div>

                        <!-- Main Image -->
                        <div class="mb-3">
                            <label for="image" class="form-label">Main Image (1920 × 400)</label>
                            @if ($new_product->image)
                                <div class="mb-2">
                                    <img src="{{ asset('media/new_product/images/' . $new_product->image) }}"
                                        alt="Main Image" width="100">
                                </div>
                            @endif
                            <input type="file" name="image" id="image" class="form-control" accept="image/*">
                        </div>

                        <!-- Navmenu Image -->
                        <div class="mb-3">
                            <label for="navmenu_image" class="form-label">Navmenu Image (650 × 400)</label>
                            @if ($new_product->navmenu_image)
                                <div class="mb-2">
                                    <img src="{{ asset('media/new_product/navmenu_images/' . $new_product->navmenu_image) }}"
                                        alt="Navmenu Image" width="100">
                                </div>
                            @endif
                            <input type="file" name="navmenu_image" id="navmenu_image" class="form-control"
                                accept="image/*">
                        </div>

                        <!-- Brochure (PDF) -->
                        <div class="mb-3">
                            <label for="brochure" class="form-label">Brochure (PDF)</label>
                            @if ($new_product->brochure)
                                <div class="mb-2">
                                    <a href="{{ asset('media/new_product/brochures/' . $new_product->brochure) }}"
                                        target="_blank">View Current Brochure</a>
                                </div>
                            @endif
                            <input type="file" name="brochure" id="brochure" class="form-control" accept=".pdf">
                        </div>

                        <!-- YouTube Video URL -->
                        <div class="mb-3">
                            <label for="video_url" class="form-label">YouTube Video URL</label>
                            <input type="url" name="video_url" id="video_url" class="form-control"
                                value="{{ $new_product->video_url }}" placeholder="https://www.youtube.com/watch?v=...">
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')


    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 200,
                minHeight: null,
                maxHeight: null,
                focus: true
            });

            $('#productForm').on('submit', function(event) {
                let isValid = true;
                const validImageTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];

                $('#productForm').find('input[type="file"][accept="image/*"]').each(function() {
                    const file = this.files[0];
                    if (file && !validImageTypes.includes(file.type)) {
                        isValid = false;
                        alert('Please select a valid image file (JPEG, PNG, GIF, or WEBP).');
                        event.preventDefault();
                        return false;
                    }
                });

                if (!isValid) {
                    event.preventDefault();
                }
            });

            $('#productForm').on('reset', function() {
                $(this).find('input[type="file"]').val('');
                $(this).find('textarea').val('');
            });
        });
    </script>
@endsection
