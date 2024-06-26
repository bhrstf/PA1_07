@extends('layout.main')

@section('content')
<link href="{{URL::asset('/aset/css/custom-vid.css')}}" rel="stylesheet" />
<nav class="navbar bg-primary">
    <div class="container-fluid">
        @if ($galery->isNotEmpty() && $category->find($galery->first()->room_id))
            <span class="navbar-brand mb-0 h1 text-center mx-auto text-white">{{ $category->find($galery->first()->room_id)->category }}</span>
        @else
            <!-- Handle case when category or galery is empty or room_id is not found -->
        @endif
    </div>
</nav>
<style>
    h6 {
        background-color: #e0e0e0; /* Warna latar belakang abu-abu */
        padding: 15px; /* Tambahkan padding agar teks tidak terlalu menempel pada tepi */
        border-radius: 5px; /* Buat sudut-sudutnya sedikit melengkung */
        text-align: justify; 
        color: black; /* Warna teks menjadi hitam */
    }
    p{
        color: black;
    }
</style>

<!-- Text -->
<section class="py-2">
    <div class="container my-3">
        <div class="row justify-content-center">
            <div class="col-lg-15">
                @if ($galery->isNotEmpty() && $category->find($galery->first()->room_id))
                    <h6 class="text-lg-start-justify mt-10 bg-gray"><?php echo $category->find($galery->first()->room_id)->description ?></h6>
                @else
                    <p class="text-lg-start mt-12 bg-gray">No description available</p>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Galeri Section -->
<div class="container">
    <div class="row text-center text-lg-start">
        @foreach ($galery as $gambar)
            <div class="col-lg-3 col-md-4 col-6">
                <a href="#" class="d-block mb-4 h-100">
                    <img class="img-fluid img-thumbnail" src="{{ asset('aset/img/'.$gambar->images) }}">
                </a>
            </div>
        @endforeach
    </div>
</div>
@endsection
