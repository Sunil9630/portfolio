@extends('layouts.admin')

@section('content')
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-8">

                <div class="card shadow">

                    <div class="card-header bg-warning">

                        <h4>Edit Experience</h4>

                    </div>

                    <div class="card-body">

                        <form action="{{ route('admin.experiences.update', $experience) }}" method="POST">

                            @csrf
                            @method('PUT')

                            @include('admin.experiences.form')

                            <div class="text-end">

                                <a href="{{ route('admin.experiences.index') }}" class="btn btn-secondary">

                                    Cancel

                                </a>

                                <button class="btn btn-success">

                                    Update Experience

                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
