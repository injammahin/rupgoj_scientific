@extends('backend.app')
@section('title', 'Create Module')
@section('content')
    <div class="content-wrapper">
        <div class="p-3">
            <div class="card">
                <div class="card-header bg-job text-gray d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Create Module</h3>
                    <a href="{{ route('backend.modules.index') }}" class="btn btn-sm btn-success ml-auto">
                        <i class="fas fa-arrow-left"></i> Back to Modules
                    </a>
                </div>
                <div class="card-body">
                    <form action="{{ route('backend.modules.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Module Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="logo" class="form-label">Module Logo (50 × 50)</label>
                            <input type="file" name="logo" id="logo" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-sm btn-success">Create Module</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
