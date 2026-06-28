@extends('layouts.admin')

@section('content')

<div class="card">

<div class="card-header">

<h4>Add Project</h4>

</div>

<div class="card-body">

<form
action="{{ route('admin.projects.store') }}"
method="POST"
enctype="multipart/form-data">

@include('admin.projects.form')

</form>

</div>

</div>

@endsection