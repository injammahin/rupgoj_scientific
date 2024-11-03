@extends('backend.app')
@section('title', 'Create Main Product')

@section('content')
    <div class="content-wrapper">
        <div class="p-3">
            <div class="card">
                <div class="card-header">
                    <h3>Create Main Product</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('backend.main_products.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Main Product Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Create Main Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
