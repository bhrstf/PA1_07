@extends('layout.main')

@section('content')
<!-- Navbar -->
<nav class="navbar bg-primary">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1 text-center mx-auto text-white">PRESTASI MAHASISWA</span>
  </div>
</nav>

<!-- Carousel -->
<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{ URL::asset('aset/img/carousel1.jpg') }}" class="d-block w-100" alt="Image 1">
    </div>
    <div class="carousel-item">
      <img src="{{URL::asset('aset/img/carousel2.jpg')}}" class="d-block w-100" alt="Image 2">
    </div>
    <div class="carousel-item">
      <img src="{{ URL::asset('aset/img/carousel4.jpg') }}" class="d-block w-100" alt="Image 3"> 
    </div>
    <div class="carousel-item">
      <img src="{{ URL::asset('aset/img/carousel5.jpg') }}" class="d-block w-100" alt="Image 4"> 
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<!-- Content -->
<div class="container text-center mt-4"> 
  @php
      $groupedPrestasi = [];
      foreach($prestasi as $data) {
          $year = date('Y', strtotime($data->time_event));
          $groupedPrestasi[$year][] = $data;
      }
  @endphp

  @foreach($groupedPrestasi as $year => $achievements)
      <div class="year-title"><strong>Tahun {{ $year }}</strong></div>
      <table class="table">
          <thead>
              <tr>
                  <th class="fw-bold">Nama Kegiatan</th>
                  <th class="fw-bold">Waktu Pelaksanaan</th>
                  <th class="fw-bold">Tingkat</th>
                  <th class="fw-bold">Prestasi yang dicapai</th>
              </tr>
          </thead>
          <tbody>
              @foreach($achievements as $achievement)
                  <tr>
                      <td>{{ $achievement->name }}</td>
                      <td>{{ \Carbon\Carbon::parse($achievement->time_event)->translatedFormat('d F Y') }}</td>
                      <td>{{ $achievement->achievement_level }}</td>
                      <td>{{ $achievement->description }}</td>
                  </tr>
              @endforeach
          </tbody>
      </table>
  @endforeach
</div>
@endsection

<style>
  .carousel-inner img {
      height: 400px; 
      object-fit: cover;
  }
</style>
