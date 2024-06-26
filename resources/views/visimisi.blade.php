@extends('layout.main')

@section('content')
<nav class="navbar bg-primary">
    <div class="container-fluid">
      <span class="navbar-brand mb-0 h1 text-center mx-auto text-white">VISI, MISI, DAN TUJUAN</span>
    </div>
</nav>
        <!-- Header - set the background image for the header in the line below-->
        <header class="py-5 bg-image-full" style="background-image: url('{{URL::asset('aset/img/header2.png')}}'); height:500px;">
            <div class="text-center my-5">
                <div class="navbar">
                    <!-- Navbar content -->
                </div>
            </div>
        </header>
        <section class="py-2">
            <div class="container my-2">
                <div class="row justify-content-center">
                    <div class="col-lg-9 text-center">
                        {{-- <h5><?php echo $visimisi->meta_title ?></h5> --}}
                        <p class="mb-3"><?php echo $visimisi->meta_description  ?></p>
                    </div>
                </div>
            </div>
        </section>
        

@endsection