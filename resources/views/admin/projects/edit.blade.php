@extends('layouts.admin')

@section('content')

<div class="card">

<div class="card-header">

<h4>Edit Project</h4>

</div>

<div class="card-body">

<form
action="{{ route('admin.projects.update',$project) }}"
method="POST"
enctype="multipart/form-data">

@method('PUT')

@include('admin.projects.form')

</form>

</div>

</div>

@endsection