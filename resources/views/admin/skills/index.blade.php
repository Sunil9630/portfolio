@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="card shadow border-0">

        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">

            <h4 class="mb-0">
                Skills Management
            </h4>

            <a href="{{ route('admin.skills.create') }}" class="btn btn-light">
                <i class="fas fa-plus"></i> Add Skill
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

                        <th width="80">#</th>

                        <th>Name</th>

                        <th width="180">Percentage</th>

                        <th width="220">Action</th>

                    </tr>

                </thead>

                <tbody>

                @forelse($skills as $skill)

                    <tr>

                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $skill->name }}</td>

                        <td>

                            <div class="progress">

                                <div
                                    class="progress-bar bg-success"
                                    style="width:{{ $skill->percentage }}%">

                                    {{ $skill->percentage }}%

                                </div>

                            </div>

                        </td>

                        <td>

                            <a href="{{ route('admin.skills.edit',$skill) }}"
                                class="btn btn-warning btn-sm">

                                Edit

                            </a>

                            <form
                                action="{{ route('admin.skills.destroy',$skill) }}"
                                method="POST"
                                class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button
                                    onclick="return confirm('Delete Skill?')"
                                    class="btn btn-danger btn-sm">

                                    Delete

                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="4" class="text-center">

                            No Skills Found.

                        </td>

                    </tr>

                @endforelse

                </tbody>

            </table>

            {{ $skills->links() }}

        </div>

    </div>

</div>

@endsection