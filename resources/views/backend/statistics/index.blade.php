@extends('backend.app')

@section('content')
    <div class="content-wrapper">
        <div class="p-3">
            <div class="card">
                <div class="card-header bg-job text-gray d-flex justify-content-between align-items-center">
                    <h3 class="card-title">Manage Statistics</h3>
                    <a href="{{ route('backend.statistics.create') }}" class="btn btn-sm btn-success ml-auto">
                        <i class="fas fa-plus"></i> Add New Statistic
                    </a>
                </div>


                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <!-- Add New Statistic Button Positioned to the Right -->


                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Value</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($statistics as $statistic)
                                    <tr>
                                        <td>{{ $statistic->title }}</td>
                                        <td>{{ $statistic->value }}</td>
                                        <td>
                                            <!-- Edit Button -->
                                            <a href="{{ route('backend.statistics.edit', $statistic->id) }}"
                                                class="btn btn-info btn-sm">Edit</a>

                                            <!-- Delete Form -->
                                            <form action="{{ route('backend.statistics.destroy', $statistic->id) }}"
                                                method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Are you sure you want to delete this statistic?');">
                                                    Delete
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
