<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Manajemen Rekayasa | IT Del</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="{{ URL::asset('aset/assets/favicon.ico') }}" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ URL::asset('/aset/css/styles.css') }}" rel="stylesheet" />
    <link href="{{ URL::asset('/aset/css/custom-vid.css') }}" rel="stylesheet" />
    <link rel="website icon" type="image/png" href="{{ asset('aset/img/logo.png') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">   
</head>
<body>
    <!-- Responsive navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('aset/img/logo.png') }}" alt="Logo" style="height: 30px; width: auto; margin-right: 5px;">
                MANAJEMEN REKAYASA
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Beranda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false">Profile</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                            <li><a class="dropdown-item" href="/strukturdosen">Struktur Organisasi</a></li>
                            <li><a class="dropdown-item" href="/kurikulum">Kurikulum</a></li>
                            <li><a class="dropdown-item" href="/dosen">Dosen & Staff</a></li>
                            <li><a class="dropdown-item" href="/visimisi">Visi & Misi Prodi</a></li>
                            <li><a class="dropdown-item" href="/profillulusan">Profil Lulusan</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">Kegiatan Mahasiswa</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
                            <li><a class="dropdown-item" href="/himamera">Kegiatan Besar Mahasiswa</a></li>
                            <li><a class="dropdown-item" href="/mrclub">Club MR</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-bs-toggle="dropdown" aria-expanded="false">Fasilitas</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown3">
                            @foreach ($category as $item)
                            <li><a href="/fasilitas?category={{ $item->id }}" class="dropdown-item">{{ $item->category }}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/laboratorium">Laboratorium</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/prestasi">Prestasi Mahasiswa</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header>
        <div class="video-container">
            <video autoplay loop muted class="bg-video">
                <source src="{{ asset('aset/img/HEADER.mp4') }}" type="video/mp4">
            </video>
            <div class="text-center my-0 content-overlay">
                <img class="img-fluid-head mb-2" src="{{ asset('aset/img/logo.png') }}" alt="Logo" width="120">
                <h3 class="text-white fs-8 fw-bolder">SELAMAT DATANG DI</h3>
                <h2 class="text-white fs-30 fw-bolder" style="font-size: 50px;">MANAJEMEN REKAYASA</h2>
                <p class="text-white fs-10 fw-bolder" style="font-size: 20px;">INSTITUT TEKNOLOGI DEL</p>
                <p class="text-white fs-10" style="font-size: 20px;">Engineering Solutions, Managing Tomorrow</p>
                <div class="image-container">
                    <img class="img-fluid-head mb-2" src="{{ asset('aset/img/kampus.png') }}" alt="" width="150">
                    <img class="img-fluid-head mb-2" src="{{ asset('aset/img/akreditasi.png') }}" alt="" width="150">
                </div>
            </div>>
            <style>
                .image-container {
                    display: flex;
                    justify-content: center; /* Untuk mengatur posisi horizontal */
                    gap: 50px; /* Jarak antara gambar */
                }
                .image-container img {
                    max-width: 100%;
                    height: auto;
                }
            </style>
        </div>
    </header>

    <!-- News Section -->
    <div class="news-container">
        <h3 class="my-4 mb-5 text-center">Berita Terkini</h3>
        <div class="row justify-content-start">
            @foreach ($berita as $data)
            <div class="col-lg-3 col-md-4 mb-3">
                <div class="news-card">
                    <img src="{{ asset('aset/img/'.$data->images) }}" alt="News Image">
                    <div class="news-title">{{ $data->title }}</div>
                    <div class="news-date">{{ \Carbon\Carbon::parse($data->date)->translatedFormat('d F Y') }}</div>
                    <a href="{{ route('berita.show', $data->id) }}" class="read-more">Selengkapnya>></a>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- Poster -->
    <div class="text-center mb-0 py-5">
        <h3>Penerimaan Mahasiswa Baru</h3>
    </div>
    <section class="hero-section">
        <div class="hero">
            <img src="{{ URL::asset('aset/img/posterwow.jpg') }}" alt="Background Image" >
            <div class="overlay"></div>
            <div class="text">
                <h2><strong>{{ $poster->meta_title }}</strong></h2>
                <p>{{ $poster->meta_description }}</p>
                <a href="https://spmb.del.ac.id" class="btn">More Info</a>
            </div>
        </div>
    </section>

<!-- Testimonials Section -->
<section class="py-5">
    <div class="container">
        <h3 class="text-center mb-5"><strong>Testimoni</strong></h3>
        <div class="row text-center justify-content-center">
            @foreach($testimoni as $item)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-7 d-flex">
                <div class="testimonial-card">
                    <div class="header">
                        <img src="{{ asset('aset/img/'.$item->images) }}" alt="">
                    </div>
                    <div class="body text-center">
                        <h5>{{ $item->name }}</h5>
                        <div class="tags">
                            <span>{{ $item->jobdescription }}</span>
                        </div>
                        <div class="content">
                            {!! $item->content !!}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>


<!-- Video Section -->
<section class="py-2 bg-image-full">
    <div class="container mb-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 text-center">
                <h3 class="mb-5">Video Terkait</h3>
                <iframe width="750" height="500" src="{{ $youtube->meta_description }}" frameborder="5" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</section>


<!-- Kerjasama Section -->
<section class="py-5 kerjasama">
    <h3 class="mb-5 text-center"><strong>Kerjasama</strong></h3>
    <div class="container-k">
        @foreach ($kerjasama as $data)
        <div class="item">
            <img src="{{ asset('aset/img/'.$data->logo) }}" alt="logo">
        </div>
        @endforeach
    </div>
</section>
    <!-- Footer -->
    <footer class="py-5 bg-dark text-white">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-4 text-center"> 
                    <div class="probootstrap-footer-widget">
                        <img src="{{ asset('aset/img/logofooter1.png') }}" alt="Logo" style="width: 150px; height: auto;">
                    </div>
                </div>            
                <div class="col-md-3">
                    <div class="probootstrap-footer-widget">
                        <h3 style="font-size: 18px; font-weight: bold; text-align: left;">About Us</h3>
                        <ul class="list-unstyled links mb-4" style="list-style: none; padding-left: 0; text-align: left;">
                            <li><a href="/sejarah" style="color: #fff; font-size: 15px; text-decoration: none;">Sejarah</a></li>
                            <li><a href="/visimisi" style="color: #fff; font-size: 15px; text-decoration: none;">Visi Misi Keilmuan dan Tujuan</a></li>
                            <li><a href="/strukturdosen" style="color: #fff; font-size: 15px; text-decoration: none;">Struktur Organisasi</a></li>
                            <li><a href="https://maps.app.goo.gl/UYq2CZQxYFjUYaPn9" style="color: #fff; font-size: 15px; text-decoration: none;">Lokasi Kampus</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="probootstrap-footer-widget">
                        <h3 style="font-size: 18px; font-weight: bold; text-align: left;">Contact Us</h3>
                        <ul class="list-unstyled links mb-4" style="list-style: none; padding-left: 0; text-align: left;">
                            <li>
                                <a style="color: #fff; font-size: 15px; text-decoration: none;">
                                    <i class="fas fa-phone"></i> +62 632 331234
                                </a>
                            </li>
                            <li>
                                <a href="https://instagram.com/mr.itdel" target="_blank" style="color: #fff; font-size: 15px; text-decoration: none;">
                                    <i class="fab fa-instagram"></i> @mr.itdel
                                </a>
                            </li>
                            <li>
                                <a href="https://www.del.ac.id/" style="color: #fff; font-size: 15px; text-decoration: none;">
                                    <i class=""></i> Institut Teknologi Del
                                </a>
                            </li>
                            <li>
                                <i class="fas fa-map-marker-alt"></i> Jl. Sisingamangaraja, Sitoluama, Laguboti, Toba Samosir
                            </li>

                        </ul>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-12 text-center">
                        <small>&copy; Manajemen Rekayasa IT Del. Made by Kelompok 7 D3 TI-23</small>
                    </div>
                </div>
            </div>
        </div>
    </footer>
        <!-- DropDown List and Date Formatting Script -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.dropdown-toggle').dropdown();
            $('.navbar-toggler').click(function() {
                $('.collapse').toggleClass('show');
            });
        });

        // Format date to '29 Agustus 2024'
        document.addEventListener('DOMContentLoaded', function() {
            function formatDate(date) {
                var options = { day: 'numeric', month: 'long', year: 'numeric' };
                return new Date(date).toLocaleDateString('id-ID', options);
            }

            var createDateInput = document.getElementById('create_date');
            var editDateInput = document.getElementById('edit_date');

            if (createDateInput) {
                createDateInput.addEventListener('change', function() {
                    var selectedDate = this.value;
                    this.value = formatDate(selectedDate);
                });
            }

            if (editDateInput) {
                editDateInput.addEventListener('change', function() {
                    var selectedDate = this.value;
                    this.value = formatDate(selectedDate);
                });
            }
        });
    </script>
</body>
</html>
