@extends('layout.main')

@section('content')
<link href="{{ URL::asset('/aset/css/custom-vid.css') }}" rel="stylesheet" />
<nav class="navbar bg-primary">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1 text-center mx-auto text-white">SEJARAH</span>
    </div>
</nav>
<!-- Text -->
<section class="history">
    <div class="container-hs">
        <div class="content">
            <h3><strong>{{ $sejarah->meta_title }}</strong></h3>
            <img src="{{ URL::asset('/aset/img/sejarah.png') }}" alt="Sejarah Image" class="responsive-img">
            <p><?php echo $sejarah->meta_description ?></p>
        </div>
    </div>
</section>
@endsection
