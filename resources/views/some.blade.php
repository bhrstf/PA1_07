{{-- @extends('layout.main')

@section('content')
<nav class="navbar bg-primary">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1 text-center mx-auto text-white">KURIKULUM</span>
    </div>
</nav>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <p class="text-lg-start text-justify">Pada Prodi Manajemen Rekayasa terdapat dua macam pendekatan struktur kurikulum, yaitu model serial dan model paralel. 
                Pendekatan model serial adalah pendekatan yang menyusun mata kuliah berdasarkan logika atau struktur keilmuannya. 
                Pada pendekatan serial ini, mata kuliah disusun dari yang paling dasar sampai di semester akhir yang merupakan mata kuliah lanjutan. 
                Setiap mata kuliah saling berhubungan yang ditunjukkan dengan adanya mata kuliah prasyarat. Kombinasikan sistem seri dan sistem paralel juga memungkinkan untuk dilakukan, 
                yaitu kelompok bidang ilmu (dengan perincian bahan kajiannya) disusun secara paralel, 
                kemudian rumusan kompetensi dan urutan strategi pembelajarannya disusun secara bertahap menurut semesternya.</p>

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
    body {
        background: url('{{ URL::asset('aset/img/kurikulum-side.png') }}') no-repeat center center fixed;
        background-size: cover;
    }

    .semester-section, p {
        margin-bottom: 20px;
        background-color: rgba(255, 255, 255, 0.8); /* Semi-transparent background for readability */
        padding: 10px;
        border-radius: 10px;
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
</style> --}}
<?php
// Sample data structure (you can replace this with your database query results)
$strukturdosen = [
    ['level' => 1, 'position' => 'REKTOR INSTITUT TEKNOLOGI DEL', 'name' => '(Dr. Arnaldo Marulitua Sinaga, S.T., M.InfoTech)', 'image' => 'rektor.jpg'],
    ['level' => 2, 'position' => 'SENAT FAKULTAS TEKNOLOGI INDUSTRI', 'name' => '', 'image' => 'senat1.jpg'],
    ['level' => 2, 'position' => 'SENAT FAKULTAS TEKNOLOGI INDUSTRI', 'name' => '', 'image' => 'senat2.jpg'],
    ['level' => 3, 'position' => 'KEPALA LABORATORIUM SISTEM PRODUKSI', 'name' => '', 'image' => 'kepala1.jpg'],
    ['level' => 3, 'position' => 'KETUA PROGRAM STUDI S1 MANAJEMEN REKAYASA', 'name' => '', 'image' => 'kepala2.jpg'],
    ['level' => 3, 'position' => 'GUGUS JAMINAN MUTU FAKULTAS TEKNOLOGI INDUSTRI', 'name' => '', 'image' => 'gugus.jpg'],
    ['level' => 4, 'position' => 'KEPALA LABORATORIUM DESAIN PRODUK DAN INOVASI', 'name' => '', 'image' => 'kepala3.jpg'],
    ['level' => 4, 'position' => 'GUGUS KENDALI MUTU PRODI S1 MANAJEMEN REKAYASA', 'name' => '', 'image' => 'gugus2.jpg']
];

// Group data by levels
$levels = [];
foreach ($strukturdosen as $item) {
    $levels[$item['level']][] = $item;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organizational Structure</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e0e0e0;
        }
        .container {
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
        }
        .level {
            display: flex;
            justify-content: center;
            margin: 20px 0;
        }
        .box {
            background-color: #0056b3;
            color: white;
            text-align: center;
            padding: 10px;
            margin: 0 10px;
            border-radius: 5px;
            position: relative;
        }
        .box img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            display: block;
            margin: 0 auto 10px;
        }
        .connector {
            width: 2px;
            height: 20px;
            background-color: black;
            position: absolute;
            top: -20px;
            left: 50%;
            transform: translateX(-50%);
        }
        .connector-horizontal {
            width: 20px;
            height: 2px;
            background-color: black;
            position: absolute;
            top: 50%;
            left: -20px;
            transform: translateY(-50%);
        }
        .box:first-child .connector-horizontal {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php foreach ($levels as $level => $items): ?>
            <div class="level">
                <?php foreach ($items as $index => $item): ?>
                    <div class="box">
                        <?php if ($level > 1): ?>
                            <div class="connector"></div>
                            <?php if ($index > 0): ?>
                                <div class="connector-horizontal"></div>
                            <?php endif; ?>
                        <?php endif; ?>
                        <img src="<?= 'aset/img/' . $item['image'] ?>" alt="<?= $item['position'] ?>">
                        <div><?= $item['position'] ?></div>
                        <?php if (!empty($item['name'])): ?>
                            <div><?= $item['name'] ?></div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
