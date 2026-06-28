@extends('layouts.admin')

@section('content')

<div class="container-fluid">

    <div class="card shadow border-0">

        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">

            <h4 class="mb-0">
                Contact Messages
            </h4>

            <span class="badge bg-light text-dark">
                Total: {{ $messages->total() }}
            </span>

        </div>

        <div class="card-body">

            @if(session('success'))

                <div class="alert alert-success alert-dismissible fade show">

                    {{ session('success') }}

                    <button class="btn-close" data-bs-dismiss="alert"></button>

                </div>

            @endif

            <div class="table-responsive">

                <table class="table table-bordered table-hover align-middle">

                    <thead class="table-dark">

                        <tr>

                            <th width="60">#</th>

                            <th>Name</th>

                            <th>Email</th>

                            <th>Subject</th>

                            <th>Message</th>

                            <th>Date</th>

                            <th width="120">Action</th>

                        </tr>

                    </thead>

                    <tbody>

                    @forelse($messages as $message)

                        <tr>

                            <td>{{ $loop->iteration + ($messages->currentPage()-1) * $messages->perPage() }}</td>

                            <td>{{ $message->name }}</td>

                            <td>
                                <a href="mailto:{{ $message->email }}">
                                    {{ $message->email }}
                                </a>
                            </td>

                            <td>{{ $message->subject }}</td>

                            <td style="max-width:300px;">
                                {{ Str::limit($message->message,120) }}
                            </td>

                            <td>
                                {{ $message->created_at->format('d M Y') }}
                                <br>
                                <small class="text-muted">
                                    {{ $message->created_at->format('h:i A') }}
                                </small>
                            </td>

                            <td>

                                <form action="{{ route('admin.contacts.destroy',$message) }}"
                                      method="POST">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        onclick="return confirm('Delete this message?')"
                                        class="btn btn-danger btn-sm">

                                        Delete

                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="7" class="text-center py-4">

                                <h5 class="text-muted">
                                    No Messages Found
                                </h5>

                            </td>

                        </tr>

                    @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-3">

                {{ $messages->links() }}

            </div>

        </div>

    </div>

</div>

@endsection