@extends('layouts.admin')

@section('content')
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-8">

                <div class="card shadow">

                    <div class="card-header bg-primary text-white">

                        <h4>Add New Service</h4>

                    </div>

                    <div class="card-body">

                        <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">

                            @csrf

                            @include('admin.services.form')

                            <div class="text-end">

                                <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">

                                    Cancel

                                </a>

                                <button class="btn btn-primary">

                                    Save Service

                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
