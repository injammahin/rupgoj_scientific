@extends('backend.app')

@section('content')
    <div class="content-wrapper">
        <div class="p-3">
            <div class="card">
                <div class="card-header bg-job text-gray d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Edit Statistic: {{ $statistic->title }}</h3>
                </div>


                <div class="card mt-3">
                    <div class="card-body">
                        <!-- Back Button -->
                        <a href="{{ route('backend.statistics.index') }}" class="btn btn-sm btn-success mb-3">Back</a>

                        <form action="{{ route('backend.statistics.update', $statistic->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Title Input (Editable) -->
                            <div class="form-group mb-3">
                                <label for="title">Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    value="{{ $statistic->title }}" required>
                            </div>

                            <!-- Value Input -->
                            <div class="form-group mb-3">
                                <label for="value">Value</label>
                                <input type="number" class="form-control" id="value" name="value"
                                    value="{{ $statistic->value ?? 0 }}" required>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-sm btn-primary">Update Statistic</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
