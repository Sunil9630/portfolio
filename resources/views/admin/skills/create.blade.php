@extends('layouts.admin')

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card shadow">

                <div class="card-header bg-primary text-white">

                    <h4>Add Skill</h4>

                </div>

                <div class="card-body">

                    <form action="{{ route('admin.skills.store') }}" method="POST">

                        @csrf

                        @include('admin.skills.form')

                        <div class="text-end">

                            <a href="{{ route('admin.skills.index') }}"
                                class="btn btn-secondary">

                                Cancel

                            </a>

                            <button class="btn btn-primary">

                                Save Skill

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection