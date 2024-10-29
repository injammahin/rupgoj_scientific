@extends('backend.app')
@section('title', 'Manage Media Links')

@section('content')
    <div class="content-wrapper">
        <div class="p-3">
            <div class="card">
                <div class="card-header bg-contact text-gray d-flex justify-content-between align-items-center">
                    <h3 class="card-title flex-grow-1 m-0">Manage Media Links</h3>
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#addMediaLinkModal">
                        Add Media Link
                    </button>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <h4>All Media Links</h4>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th>Poster</th>
                                    <th>Title</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mediaLinks as $media)
                                    <tr>
                                        <td><img src="{{ asset($media->image) }}" alt="Media Poster" class="img-thumbnail"
                                                style="max-width: 100px;"></td>
                                        <td>{{ $media->name }}</td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-info btn-sm me-2" data-bs-toggle="modal"
                                                data-bs-target="#editMediaLinkModal{{ $media->id }}">Edit</button>
                                            <form action="{{ route('backend.media.deleteMediaLink', $media->id) }}"
                                                method="POST" class="d-inline-block"
                                                onsubmit="return confirm('Are you sure you want to delete this media link?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>

                                    <div class="modal fade edit-modal" id="editMediaLinkModal{{ $media->id }}"
                                        tabindex="-1" aria-labelledby="editMediaLinkModalLabel{{ $media->id }}"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editMediaLinkModalLabel{{ $media->id }}">
                                                        Edit Media Link
                                                    </h5>
                                                    <button type="button" class="btn btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                        <i class="fa fa-window-close" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                                <form action="{{ route('backend.media.updateMediaLink', $media->id) }}"
                                                    method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="media_url">Media URL</label>
                                                            <input type="url" class="form-control" name="media_url"
                                                                value="{{ $media->media_url }}" required>
                                                        </div>
                                                        <div class="form-group mt-2">
                                                            <label for="media_poster">Media Poster (380 × 200)</label>
                                                            <input type="file" class="form-control" name="media_poster"
                                                                accept="image/jpeg, image/png, image/gif, image/svg+xml, image/webp">
                                                        </div>
                                                        <div class="form-group mt-2">
                                                            <label for="title">Title</label>
                                                            <input type="text" class="form-control" name="title"
                                                                value="{{ $media->name }}" required>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Update Media
                                                            Link</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade edit-modal" id="addMediaLinkModal" tabindex="-1" aria-labelledby="addMediaLinkModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addMediaLinkModalLabel">Add Media Link</h5>
                    <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fa fa-window-close" aria-hidden="true"></i>
                    </button>
                </div>
                <form action="{{ route('backend.media.storeMediaLink') }}" method="POST" enctype="multipart/form-data"
                    id="addMediaLinkForm">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="media_url">Media URL</label>
                            <input type="url" class="form-control" name="media_url" required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="media_poster">Media Poster (380 × 200)</label>
                            <input type="file" class="form-control" name="media_poster"
                                accept="image/jpeg, image/png, image/gif, image/svg+xml, image/webp" required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Media Link</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.edit-modal').on('hidden.bs.modal', function() {
                $(this).find('form')[0].reset();
            });

            $('input[name="media_poster"]').on('change', function() {
                var file = this.files[0];
                if (file) {
                    var fileType = file.type;
                    var validImageTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/svg+xml',
                        'image/webp'
                    ];
                    if (!validImageTypes.includes(fileType)) {
                        alert('Invalid file type. Please select an image file (JPG, PNG, GIF, SVG, WEBP).');
                        $(this).val('');
                    }
                }
            });
        });
    </script>
@endsection
