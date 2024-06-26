@extends('layout.main')

@section('content')
<link href="{{URL::asset('/aset/css/custom-vid.css')}}" rel="stylesheet" />
<nav class="navbar bg-primary">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1 text-center mx-auto text-white">BERITA</span>
    </div>
</nav>
<!-- Page Content -->
<section class="class-of-news">
    <div class="container-news">
        <div class="main-content-news">
            <div class="header-news">
                <div>
                    <p>{{ \Carbon\Carbon::parse($berita->date)->translatedFormat('d F Y') }}</p>
                </div>
                <div>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(Request::fullUrl()) }}" target="_blank"><i class="fab fa-facebook" style="font-size: 24px; margin-right: 10px;"></i></a>
                    <a href="https://www.instagram.com" target="_blank" onclick="alert('Copy the link and share on Instagram: {{ Request::fullUrl() }}')"><i class="fab fa-instagram" style="font-size: 24px; margin-right: 10px;"></i></a>
                    <a href="https://wa.me/?text={{ urlencode(Request::fullUrl()) }}" target="_blank"><i class="fab fa-whatsapp" style="font-size: 24px; margin-right: 10px;"></i></a>
                </div>
            </div>
            <h3 class="my-2 col-md-10">{{ $berita->title }}</h3>
            <p>Oleh: {{ $berita->created_by }}</p>
            <div class="article-news">
                <img src="{{ asset('aset/img/' . $berita->images) }}" style="max-width: 800px; height: auto;" alt="">
                <p><?php echo $berita->description ?></p>
            </div>
        </div>
        <div class="sidebar-news">
            <h3>Terbaru</h3>
            <div class="latest-news">
                @foreach ($relatedBerita as $data)
                <div class="news-item">
                    <img src="{{ asset('aset/img/' . $data->images) }}" alt="News Image">
                    <h5>{{ \Carbon\Carbon::parse($data->date)->translatedFormat('d F Y') }}</h5>
                    <p><?php echo Str::limit($data->description, 100) ?></p>
                    <a href="{{ route('berita.show', $data->id) }}">Selengkapnya>></a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@endsection
