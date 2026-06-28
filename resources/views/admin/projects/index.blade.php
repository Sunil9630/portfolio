@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h3>Projects</h3>

        <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">
            Add Project
        </a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-hover">

        <thead class="table-dark">

            <tr>

                <th>ID</th>

                <th>Image</th>

                <th>Title</th>

                <th>Technology</th>

                <th width="180">Action</th>

            </tr>

        </thead>

        <tbody>

            @forelse($projects as $project)
                <tr>

                    <td>{{ $project->id }}</td>

                    <td width="120">
                        @if ($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}" width="80"
                                class="img-thumbnail">
                        @else
                            <span class="text-muted">No Image</span>
                        @endif
                    </td>

                    <td>{{ $project->title }}</td>

                    <td>{{ $project->technology }}</td>

                    <td>

                        <a href="{{ route('admin.projects.edit', $project) }}" class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <form action="{{ route('admin.projects.destroy', $project) }}" method="POST" class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button onclick="return confirm('Delete this project?')" class="btn btn-danger btn-sm">

                                Delete

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="5" class="text-center">

                        No Projects Found

                    </td>

                </tr>
            @endforelse

        </tbody>

    </table>

    {{ $projects->links() }}
@endsection
