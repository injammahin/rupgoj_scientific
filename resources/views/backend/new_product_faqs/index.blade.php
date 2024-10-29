@extends('backend.app')
@section('title', 'Manage FAQs for ' . $new_product->name)
@section('content')
    <div class="content-wrapper">
        <div class="p-3">
            <div class="card">
                <div class="card-header bg-job text-gray d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Manage FAQs for {{ $new_product->name }}</h3>

                    <a href="{{ route('backend.new_products.faqs.create', $new_product) }}" class="btn btn-sm btn-success me-2">
                        <i class="fas fa-plus"></i> Add FAQ
                    </a>
                    <a href="{{ route('backend.new_products.index') }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-arrow-left"></i> Back to Products
                    </a>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead class="thead-light">
                                <tr>
                                    <th>Question</th>
                                    <th>Answer</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($faqs as $faq)
                                    <tr>
                                        <td>{{ $faq->question }}</td>
                                        <td>{{ \Illuminate\Support\Str::limit(strip_tags($faq->answer), 30) }}</td>
                                        <td class="d-flex">
                                            <a href="{{ route('backend.new_products.faqs.edit', [$new_product->id, $faq->id]) }}"
                                                class="btn btn-sm btn-info btn-sm me-2">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('backend.new_products.faqs.destroy', $faq->id) }}"
                                                method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger btn-sm ml-2"
                                                    onclick="return confirm('Are you sure you want to delete this FAQ?')">
                                                    <i class="fas fa-trash-alt"></i> Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        setTimeout(function() {
            $('.alert-success').fadeOut('slow');
        }, 2000);
    </script>
@endsection
