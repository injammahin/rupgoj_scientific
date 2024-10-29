@extends('backend.app')

@section('title', 'Edit Blog')

@section('content')
    <div class="content-wrapper">
        <div class="p-3">
            <div class="card">
                <div class="card-header bg-contact text-gray">
                    <h3 class="card-title">Edit Blog</h3>
                    <a href="{{ route('backend.blogs.index') }}" class="btn btn-sm btn-success ml-auto" style="color: #f8fbff !important;">
                        <i class="fas fa-arrow-left"></i> Back to blogs
                    </a>
                </div>
                <div class="card-body">
                    <div id="errorAlert" class="alert alert-danger d-none" role="alert"></div>
                    <form action="{{ route('backend.blogs.update', $blog->id) }}" method="POST"
                        enctype="multipart/form-data" id="editBlogForm">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title"
                                value="{{ $blog->title }}" required>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select class="form-control" id="category_id" name="category_id" required>
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $blog->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tags">Tags</label>
                            <div class="checkbox-list">
                                @foreach ($tags as $tag)
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="tags[]"
                                            value="{{ $tag->id }}" id="tag{{ $tag->id }}"
                                            {{ $blog->tags->contains($tag->id) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="tag{{ $tag->id }}">
                                            {{ $tag->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control summernote" id="content" name="content" rows="4" required>{{ $blog->content }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="image">Image (780 × 520) (PNG for better view)</label>
                            <input type="file" class="form-control-file" id="image" name="image" accept="image/*">
                            @if ($blog->image)
                                <img src="{{ asset('media/blogs/' . $blog->image) }}" alt="{{ $blog->title }}" class="img-fluid mt-2">
                            @endif
                        </div>

                        <button type="submit" class="btn btn-sm btn-success mt-2">Update Blog</button>
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
                tabsize: 2,
                placeholder: 'Enter blog content here...',
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });

            $('#editBlogForm').on('submit', function(e) {
                var fileInput = $('#image')[0];
                var file = fileInput.files[0];
                var validImageTypes = ['image/png', 'image/jpeg', 'image/jpg', 'image/gif', 'image/webp'];

                if (file) {
                    if (!validImageTypes.includes(file.type)) {
                        e.preventDefault();
                        showError('Please select a valid image file (PNG, JPG, JPEG, GIF).');
                        return false;
                    }
                } else if (!{{ $blog->image ? 'true' : 'false' }}) {

                    e.preventDefault();
                    showError('Please select an image file to upload.');
                    return false;
                }
            });

            function showError(message) {
                $('#errorAlert').removeClass('d-none').text(message);
                setTimeout(function() {
                    $('#errorAlert').addClass('d-none');
                }, 3000);
            }
        });
    </script>
@endsection
