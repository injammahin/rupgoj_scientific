@extends('backend.app')

@section('title', 'Add Module Description for ' . $new_product->name)

@section('content')
    <div class="content-wrapper">
        <div class="pt-5 px-5">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Add Module Description for {{ $new_product->name }}</h3>
                    <a href="{{ route('backend.new_products.modules.index', $new_product->id) }}" class="btn btn-primary">
                        <i class="fas fa-arrow-left"></i> Back to Modules
                    </a>
                </div>
                <div class="card-body">
                    <form id="productForm" action="{{ route('backend.new_products.modules.store', $new_product->id) }}"
                        method="POST" enctype="multipart/form-data" novalidate>
                        @csrf

                        <div class="mb-3">
                            <label for="module_id" class="form-label">Select Module</label>
                            <select name="module_id" id="module_id" class="form-control" required>
                                <option value="">-- Select Module --</option>
                                @foreach ($modules as $module)
                                    <option value="{{ $module->id }}">{{ $module->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control summernote" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image (450 * 350)</label>
                            <input type="file" name="image" id="image" class="form-control" accept="image/*">
                        </div>

                        <button type="submit" class="btn btn-success">Add Module Description</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <script>
        document.getElementById('productForm').addEventListener('submit', function(event) {
            let isValid = true;

            document.querySelectorAll('.ckeditor').forEach((element) => {
                const editorData = editorInstances[element.id].getData()
                    .trim();
                if (!editorData) {
                    isValid = false;
                    alert('Please fill in the Description field.');
                    editorInstances[element.id].focus();
                    event.preventDefault();
                }
            });

            return isValid;
        });
    </script>
@endsection
