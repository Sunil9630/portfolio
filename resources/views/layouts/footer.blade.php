<footer class="bg-dark text-white py-4">

<div class="container">

<div class="row">

<div class="col-md-6">

<h5>{{ $setting->name }}</h5>

<p>

{{ $setting->designation }}

</p>

</div>

<div class="col-md-6 text-md-end">

<p>

<i class="fa fa-envelope"></i>

{{ $setting->email }}

</p>

<p>

<i class="fa fa-phone"></i>

{{ $setting->phone }}

</p>

</div>

</div>

<hr>

<div class="text-center">

© {{ date('Y') }}

All Rights Reserved.

</div>

</div>

</footer>