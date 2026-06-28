@extends('layouts.admin')

@section('content')
    <div class="container-fluid">

        <div class="card shadow border-0">

            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">

                <h4 class="mb-0">Services Management</h4>

                <a href="{{ route('admin.services.create') }}" class="btn btn-light">
                    Add Service
                </a>

            </div>

            <div class="card-body">

                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show">

                        {{ session('success') }}

                        <button class="btn-close" data-bs-dismiss="alert"></button>

                    </div>
                @endif

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-dark">

                        <tr>

                            <th width="60">#</th>

                            <th width="120">Icon</th>

                            <th>Title</th>

                            <th>Description</th>

                            <th width="180">Action</th>

                        </tr>

                    </thead>

                    <tbody>

                        @forelse($services as $service)
                            <tr>

                                <td>{{ $loop->iteration }}</td>

                                <td>

                                    @if ($service->icon)
                                        <img src="{{ Storage::url($service->icon) }}" alt="{{ $service->title }}"
                                            class="img-thumbnail" width="80">
                                    @else
                                        <span class="badge bg-secondary">No Image</span>
                                    @endif

                                </td>

                                <td>{{ $service->title }}</td>

                                <td>{{ Str::limit($service->description, 70) }}</td>

                                <td>

                                    <a href="{{ route('admin.services.edit', $service) }}" class="btn btn-warning btn-sm">

                                        Edit

                                    </a>

                                    <form action="{{ route('admin.services.destroy', $service) }}" method="POST"
                                        class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button onclick="return confirm('Delete this service?')"
                                            class="btn btn-danger btn-sm">

                                            Delete

                                        </button>

                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td colspan="5" class="text-center">

                                    No Services Found.

                                </td>

                            </tr>
                        @endforelse

                    </tbody>

                </table>

                {{ $services->links() }}

            </div>

        </div>

    </div>
@endsection
