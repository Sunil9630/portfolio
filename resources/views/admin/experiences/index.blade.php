@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="card shadow border-0">

        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">

            <h4 class="mb-0">Experience Management</h4>

            <a href="{{ route('admin.experiences.create') }}" class="btn btn-light">
                Add Experience
            </a>

        </div>

        <div class="card-body">

            @if(session('success'))

                <div class="alert alert-success alert-dismissible fade show">

                    {{ session('success') }}

                    <button class="btn-close" data-bs-dismiss="alert"></button>

                </div>

            @endif

            <table class="table table-bordered table-hover align-middle">

                <thead class="table-dark">

                    <tr>

                        <th>#</th>

                        <th>Company</th>

                        <th>Designation</th>

                        <th>Duration</th>

                        <th>Description</th>

                        <th width="180">Action</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($experiences as $experience)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $experience->company }}</td>

                        <td>{{ $experience->designation }}</td>

                        <td>{{ $experience->duration }}</td>

                        <td>{{ Str::limit($experience->description,60) }}</td>

                        <td>

                            <a href="{{ route('admin.experiences.edit',$experience) }}"
                               class="btn btn-warning btn-sm">

                                Edit

                            </a>

                            <form action="{{ route('admin.experiences.destroy',$experience) }}"
                                  method="POST"
                                  class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    onclick="return confirm('Delete this record?')"
                                    class="btn btn-danger btn-sm">

                                    Delete

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6" class="text-center">

                            No Experience Found.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

            {{ $experiences->links() }}

        </div>

    </div>

</div>

@endsection