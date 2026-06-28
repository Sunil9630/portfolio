@extends('layouts.admin')

@section('content')

<div class="container">

    <div class="row justify-content-center">

        <div class="col-lg-7">

            <div class="card shadow">

                <div class="card-header bg-warning">

                    <h4>Edit Skill</h4>

                </div>

                <div class="card-body">

                    <form action="{{ route('admin.skills.update',$skill) }}" method="POST">

                        @csrf
                        @method('PUT')

                        @include('admin.skills.form')

                        <div class="text-end">

                            <a href="{{ route('admin.skills.index') }}"
                                class="btn btn-secondary">

                                Cancel

                            </a>

                            <button class="btn btn-success">

                                Update Skill

                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection