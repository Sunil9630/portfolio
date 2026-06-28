@extends('layouts.admin')

@section('content')
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-8">

                <div class="card shadow">

                    <div class="card-header bg-primary text-white">

                        <h4>Add Experience</h4>

                    </div>

                    <div class="card-body">

                        <form action="{{ route('admin.experiences.store') }}" method="POST">

                            @csrf

                            @include('admin.experiences.form')

                            <div class="text-end">

                                <a href="{{ route('admin.experiences.index') }}" class="btn btn-secondary">

                                    Cancel

                                </a>

                                <button class="btn btn-primary">

                                    Save Experience

                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
