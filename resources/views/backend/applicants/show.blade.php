@extends('backend.app')

@section('title', 'Job Applicants for ' . $job->title)

@section('content')
    <div class="sb-nav-fixed job">
        <div id="layoutSidenav">
            <div id="layoutSidenav_content">
                <div>
                    <main>
                        <div id="app" class="content-wrapper">
                            <div class="pt-5 px-5">
                                <div class="card shadow-lg border-0 rounded-lg">
                                    <div
                                        class="card-header bg-white text-gray-100 d-flex justify-content-between align-items-center">
                                        <h3 class="card-title mb-0"><i class="fas fa-users"></i> Applicants for
                                            {{ $job->title }}</h3>
                                        <a href="{{ route('backend.jobs.index') }}" class="btn btn-success ml-auto"
                                            style="color: #f8fbff !important;">
                                            <i class="fas fa-arrow-left"></i> Back to Jobs
                                        </a>
                                    </div>

                                    <div class="card-body p-4">
                                        @if (session('success'))
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                {{ session('success') }}
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif

                                        @if (session('error'))
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                {{ session('error') }}
                                                <button type="button" class="close" data-dismiss="alert"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        @endif

                                        <div class="mb-3 d-flex justify-content-between align-items-center">
                                            <form method="GET" action="{{ route('backend.applicants.show', $job->id) }}">
                                                <label for="per_page" class="mr-2">Show</label>
                                                <select name="per_page" id="per_page" class="form-control d-inline-block"
                                                    style="width: auto;" onchange="this.form.submit()">
                                                    <option value="10" {{ $perPage == 10 ? 'selected' : '' }}>10
                                                    </option>
                                                    <option value="20" {{ $perPage == 20 ? 'selected' : '' }}>20
                                                    </option>
                                                    <option value="50" {{ $perPage == 50 ? 'selected' : '' }}>50
                                                    </option>
                                                    <option value="100" {{ $perPage == 100 ? 'selected' : '' }}>100
                                                    </option>
                                                </select>
                                                <span class="ml-2">entries</span>
                                            </form>
                                        </div>

                                        <div class="table-responsive">
                                            <table class="table table-hover">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Full Name</th>
                                                        <th>Email</th>
                                                        <th>Phone</th>
                                                        <th>Cover Letter</th>
                                                        <th>Resume</th>
                                                        <th>Applied On</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($applicants as $applicant)
                                                        <tr>
                                                            <td>{{ $applicant->name }}</td>
                                                            <td>{{ $applicant->email }}</td>
                                                            <td>{{ $applicant->phone }}</td>
                                                            <td>{{ Str::limit($applicant->cover_letter, 50) }}</td>
                                                            <td>
                                                                <a href="{{ asset('storage/' . $applicant->resume) }}"
                                                                    target="_blank"
                                                                    class="btn btn-outline-info btn-sm rounded-pill">
                                                                    <i class="fas fa-file-pdf"></i> View Resume
                                                                </a>
                                                            </td>
                                                            <td>{{ $applicant->created_at->format('jS F, Y') }}</td>
                                                            <td>
                                                                <button type="button"
                                                                    class="btn btn-primary btn-sm rounded-pill"
                                                                    data-toggle="modal"
                                                                    data-target="#viewDetailsModal{{ $applicant->id }}">
                                                                    <i class="fas fa-eye"></i> View
                                                                </button>

                                                                <form
                                                                    action="{{ route('backend.applicants.destroy', $applicant->id) }}"
                                                                    method="POST" class="d-inline-block">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit"
                                                                        class="btn btn-danger btn-sm rounded-pill"
                                                                        onclick="return confirm('Are you sure you want to delete this applicant?')">
                                                                        <i class="fas fa-trash-alt"></i> Delete
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        </tr>

                                                        <div class="modal fade" id="viewDetailsModal{{ $applicant->id }}"
                                                            tabindex="-1" role="dialog"
                                                            aria-labelledby="viewDetailsModalLabel{{ $applicant->id }}"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog modal-lg" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title"
                                                                            id="viewDetailsModalLabel{{ $applicant->id }}">
                                                                            Details for {{ $applicant->name }}
                                                                        </h5>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <p><strong>Full Name:</strong>
                                                                                    {{ $applicant->name }}</p>
                                                                                <p><strong>Email:</strong>
                                                                                    {{ $applicant->email }}</p>
                                                                                <p><strong>Phone:</strong>
                                                                                    {{ $applicant->phone }}</p>
                                                                                <p><strong>Applied On:</strong>
                                                                                    {{ $applicant->created_at->format('jS F, Y') }}
                                                                                </p>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <p><strong>Resume:</strong>
                                                                                    <a href="{{ asset('storage/' . $applicant->resume) }}"
                                                                                        target="_blank">
                                                                                        <i class="fas fa-file-pdf"></i> View
                                                                                        Resume
                                                                                    </a>
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                        <hr>
                                                                        <h5>Cover Letter</h5>
                                                                        <p>{{ $applicant->cover_letter }}</p>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-dismiss="modal">Close</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>

                                        <div class="d-flex justify-content-between align-items-center mt-3">
                                            <div>
                                                Showing {{ $applicants->firstItem() }} to {{ $applicants->lastItem() }} of
                                                {{ $applicants->total() }} entries
                                            </div>
                                            <div>
                                                {{ $applicants->appends(request()->input())->links('pagination::bootstrap-4') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
        </div>
    </div>

@endsection
