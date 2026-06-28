<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container">

<div class="row justify-content-center align-items-center vh-100">

<div class="col-md-5">

<div class="card shadow border-0">

<div class="card-body p-5">

<h2 class="text-center mb-4">

Admin Login

</h2>

@if(session('success'))

<div class="alert alert-success">

{{ session('success') }}

</div>

@endif

@if($errors->any())

<div class="alert alert-danger">

{{ $errors->first() }}

</div>

@endif

<form action="{{ route('login.post') }}" method="POST">

@csrf

<div class="mb-3">

<label>Email</label>

<input
type="email"
name="email"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Password</label>

<input
type="password"
name="password"
class="form-control"
required>

</div>

<div class="mb-3 form-check">

<input
type="checkbox"
name="remember"
class="form-check-input">

<label class="form-check-label">

Remember Me

</label>

</div>

<button class="btn btn-primary w-100">

Login

</button>

</form>

<hr>

<p class="text-center">

Don't have an account?

{{-- <a href="{{ route('register') }}"> --}}

Register

</a>

</p>

</div>

</div>

</div>

</div>

</div>

</body>

</html>