@extends('layouts.admin')

@section('content')
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-8">

                <div class="card shadow">

                    <div class="card-header bg-warning">

                        <h4>Edit Service</h4>

                    </div>

                    <div class="card-body">

                        <form action="{{ route('admin.services.update', $service) }}" method="POST"
                            enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            @include('admin.services.form')

                            <div class="text-end">

                                <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">

                                    Cancel

                                </a>

                                <button class="btn btn-success">

                                    Update Service

                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
