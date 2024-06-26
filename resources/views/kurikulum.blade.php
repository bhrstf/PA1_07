@extends('layout.main')

@section('content')
<nav class="navbar bg-primary">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1 text-center mx-auto text-white">KURIKULUM</span>
    </div>
</nav>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <!-- Sidebar with image -->
            <img src="{{ URL::asset('aset/img/kurikulum-side.png') }}" class="img-fluid" alt="Sidebar Image">
        </div>
        <div class="col-md-8">
            <p class="text-lg-start text-justify bg-light">
                Pada Prodi Manajemen Rekayasa terdapat dua macam pendekatan struktur kurikulum, yaitu model serial dan model paralel. 
                Pendekatan model serial adalah pendekatan yang menyusun mata kuliah berdasarkan logika atau struktur keilmuannya. 
                Pada pendekatan serial ini, mata kuliah disusun dari yang paling dasar sampai di semester akhir yang merupakan mata kuliah lanjutan. 
                Setiap mata kuliah saling berhubungan yang ditunjukkan dengan adanya mata kuliah prasyarat. Kombinasikan sistem seri dan sistem paralel juga memungkinkan untuk dilakukan, 
                yaitu kelompok bidang ilmu (dengan perincian bahan kajiannya) disusun secara paralel, 
                kemudian rumusan kompetensi dan urutan strategi pembelajarannya disusun secara bertahap menurut semesternya.
            </p>
        
            @php
                $groupedKurikulum = [];
                foreach($kurikulum as $data) {
                    $groupedKurikulum[$data->semester][] = $data;
                }
            @endphp
        </div>
                @foreach($groupedKurikulum as $semester => $courses)
        <div class="semester-section">
            <div class="semester-title">
                <h5>SEMESTER {{ $semester }}</h5>
            </div>
            <table class="table">
                <thead class="bg-light">
                    <tr>
                        <th class="fw-bold" style="width: 12%;">Kode Mata Kuliah</th>
                        <th class="fw-bold" style="width: 80%;">Nama Mata Kuliah</th>
                        <th class="fw-bold" style="width: 7%;">SKS</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($courses as $course)
                        <tr>
                            <td>{{ $course->kode_mk }}</td>
                            <td>{{ $course->subject }}</td>
                            <td>{{ $course->sks }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endforeach

    </div>
</div>
@endsection

<style>
    .semester-section {
        margin-bottom: 20px;
    }
    .semester-title h5 {
        margin-top: 20px;
        margin-bottom: 20px;
        text-align: center;
        font-weight: bold;
    }
    .table {
        width: 100%;
        table-layout: fixed;
    }
    .table th, .table td {
        text-align: center;
        vertical-align: middle;
    }
    .table th {
        text-align: center;
    }
    .bg-light {
    background-color: #e0e0e0; /* Warna latar belakang yang terang */
    padding: 15px; /* Tambahkan padding agar teks tidak terlalu menempel pada tepi */
    border-radius: 5px; /* Buat sudut-sudutnya sedikit melengkung */
}

</style>
