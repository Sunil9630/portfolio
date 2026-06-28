<nav class="navbar navbar-light bg-white shadow-sm">

<div class="container-fluid">

<h4>

Dashboard

</h4>

<form action="{{ route('logout') }}" method="POST">

@csrf

<button class="btn btn-danger">

Logout

</button>

</form>

</div>

</nav>