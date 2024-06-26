@extends('layout.main')

@section('content')
<nav class="navbar bg-primary">
    <div class="container-fluid">
      <span class="navbar-brand mb-0 h1 text-center mx-auto text-white">PROFIL LULUSAN</span>
    </div>
</nav>
        <!-- Header - set the background image for the header in the line below-->
        <header class="py-5 bg-image-full" style="background-image: url('{{URL::asset('aset/img/header1.png')}}'); height: 400px;">
            <div class="text-center my-5">
                <div class="navbar">
                    <!-- Navbar content -->
                </div>
            </div>
        </header>
<!-- Content section -->
@foreach ($profillulusan as $section)
<section class="py-2">
    <div class="container my-3">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-left">
                <h3><?php echo $section->name ?></h3>
                <p class="lead"><?php echo $section->jobtitle ?></p>
                <p class="mb-0"><?php echo $section->description ?></p>
            </div>
        </div>
    </div>
</section>
@endforeach
@endsection