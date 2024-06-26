@extends('layout.main')

@section('content')
<link href="{{URL::asset('/aset/css/custom-vid.css')}}" rel="stylesheet" />
<nav class="navbar bg-primary">
    <div class="container-fluid">
      <span class="navbar-brand mb-0 h1 text-center mx-auto text-white">HIMAMERA (HIMPUNAN MAHASISWA MANAJEMEN REKAYASA)</span>
    </div>
</nav>
<!-- Header - set the background image for the header in the line below-->
<header class="py-5 bg-image-full" style="background-image: url('{{URL::asset('aset/img/header4.png')}}'); height: 500px;">
    <div class="text-center my-5">
        <div class="navbar">
            <!-- Navbar content -->
        </div>
    </div>
</header>

<!-- Text -->
<div class="container mt-4">
    <div class="row align-items-center">
        <div class="col-md-2">
            <img src="{{ URL::asset('aset/img/himameralogo.png') }}" alt="Sidebar Image" class="img-fluid" width="100px">
        </div>
        <div class="col-md-10">
            <p class="text-lg-start text-justify mb-0">
                HIMAMERA (Himpunan Mahasiswa Manajemen Rekayasa) adalah organisasi mahasiswa di Institut 
                Teknologi Del Fakultas Teknologi Industri yang mewakili mahasiswa dalam program studi atau jurusan tertentu. 
                Fungsi utamanya adalah mewakili mahasiswa, membangun komunitas, mengembangkan keterampilan, mengadakan kegiatan, 
                dan memfasilitasi pembangunan jaringan. Memiliki karakteristik yang sama dengan himpunan mahasiswa di program studi lainnya, 
                HIMAMERA membantu memperkaya pengalaman akademik, sosial, dan profesional mahasiswa di kampus.
            </p>
        </div>
    </div>
</div>


<nav class="navbar bg-dark mt-3 mb-4">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h6 text-center mx-auto text-white">KEGIATAN BESAR HIMAMERA</span> 
    </div>
</nav>

<!-- List Kegiatan Himamera -->
<div class="container mb-4">
  <?php foreach ($himamera as $project): ?>
  <div class="row mt-4">
      <div class="col-md-5">
          <a href="#">
              <img class="img-fluid rounded mb-3 mb-md-0" src="{{ URL::asset('aset/img/' . $project->images) }}" alt="{{ $project->images }}">
          </a>
      </div>
      <div class="col-md-6">
          <h4><?php echo $project->activity_name; ?></h4>
          <p><?php echo $project->content; ?></p>
      </div>
  </div>
  <?php endforeach; ?>
</div>

@endsection
