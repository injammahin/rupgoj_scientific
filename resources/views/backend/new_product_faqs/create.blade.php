@extends('backend.app')

@section('title', 'Add FAQs for ' . $new_product->name)

@section('content')
    <div class="content-wrapper">
        <div class="p-3">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Add FAQs for {{ $new_product->name }}</h3>
                    <a href="{{ route('backend.new_products.faqs.index', $new_product) }}" class="btn btn-sm btn-success ml-auto">
                        <i class="fas fa-arrow-left"></i> Back to FAQs
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('backend.new_products.faqs.store', $new_product) }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">FAQs</label>
                            <button type="button" class="btn btn-primary btn-sm float-end" id="addFaqButton">Add
                                FAQ</button>
                            <table class="table table-striped mt-3" id="faqTable">
                                <thead>
                                    <tr>
                                        <th>Question</th>
                                        <th>Answer</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text" name="faqs[0][question]" class="form-control" required>
                                        </td>
                                        <td>
                                            <textarea name="faqs[0][answer]" class="form-control summernote" rows="2" required></textarea>
                                        </td>
                                        <td><button type="button" class="btn btn-sm btn-danger remove-faq-btn">Delete</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <button type="submit" class="btn btn-sm btn-success">Save FAQs</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

    <script>
        $(document).ready(function() {
            let faqIndex = 1;

            $('.summernote').summernote({
                height: 150,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'italic', 'underline']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });

            $('#addFaqButton').click(function() {
                $('#faqTable tbody').append(`
                    <tr>
                        <td><input type="text" name="faqs[${faqIndex}][question]" class="form-control" required></td>
                        <td><textarea name="faqs[${faqIndex}][answer]" class="form-control summernote" rows="2" required></textarea></td>
                        <td><button type="button" class="btn btn-sm btn-danger remove-faq-btn">Delete</button></td>
                    </tr>
                `);

                $(`textarea[name="faqs[${faqIndex}][answer]"]`).summernote({
                    height: 150,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'italic', 'underline']],
                        ['fontname', ['fontname']],
                        ['fontsize', ['fontsize']],
                        ['color', ['color']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture']],
                        ['view', ['fullscreen', 'codeview', 'help']]
                    ]
                });

                faqIndex++;
            });

            $(document).on('click', '.remove-faq-btn', function() {
                $(this).closest('tr').remove();
            });
        });
    </script>
@endsection
