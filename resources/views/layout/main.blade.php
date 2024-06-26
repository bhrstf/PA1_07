<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Manajemen Rekayasa | IT Del</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{URL::asset('aset/assets/favicon.ico')}}" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{URL::asset('/aset/css/styles.css')}}" rel="stylesheet" />
        <link rel="website icon" type="png" href="{{URL::asset('aset/img/logo.png') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    </head>
    <body>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#!">
                    <img src="{{ asset('aset/img/logo.png') }}" alt="Logo" style="height: 30px; width: auto; margin-right: 5px;">MANAJEMEN REKAYASA
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <li class="nav-item"><a class="nav-link" href="/">Beranda</a></li>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown1" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Profile
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown1">
                                <li><a class="dropdown-item" href="/strukturdosen">Struktur Organisasi</a></li>
                                <li><a class="dropdown-item" href="/kurikulum">Kurikulum</a></li>
                                <li><a class="dropdown-item" href="/dosen">Dosen & Staff</a></li>
                                <li><a class="dropdown-item" href="/visimisi">Visi & Misi Prodi</a></li>
                                <li><a class="dropdown-item" href="/profillulusan">Profil Lulusan</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Kegiatan Mahasiswa
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
                                <li><a class="dropdown-item" href="/himamera">Kegiatan Besar Mahasiswa</a></li>
                                <li><a class="dropdown-item" href="/mrclub">MR CLUB</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown3" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Fasilitas
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown3">
                                @foreach ($category as $item)
                                    <a href="/fasilitas?category={{ $item->id }}" class="dropdown-item">{{ $item->category }}</a>
                                @endforeach
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="/laboratorium">Laboratorium</a></li>
                        <li class="nav-item"><a class="nav-link" href="/prestasi">Prestasi Mahasiswa</a></li>
                    </ul>
                </div>
            </div>
        </nav>     
  <!-- As a heading -->
        @yield('content')
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
                <!-- Bootstrap core JavaScript -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
        
                <script>
                    $(document).ready(function(){
                        $('.dropdown-toggle').dropdown();
                        $('.navbar-toggler').click(function(){
                            $('.collapse').toggleClass('show');
                        });
                    });
                </script>
    </body>
</html>
