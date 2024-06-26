@extends('layout.main')

@section('content')
<nav class="navbar bg-primary">
    <div class="container-fluid">
      <span class="navbar-brand mb-0 h1 text-center mx-auto text-white">STRUKTUR ORGANISASI DOSEN</span>
    </div>
</nav>
<nav class="navbar">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1 text-center mx-auto text-dark">STRUKTUR ORGANISASI FAKULTAS TEKNOLOGI INDUSTRI<br>
            JURUSAN MANAJEMEN REKAYASA<br>
            INSTITUT TEKNOLOGI DEL</span>
    </div>
</nav>

<section class="struktur-dosen">
    <style>
        .struktur-dosen {
            font-family: Arial, sans-serif;
        }
        .container-dosen {
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
            padding: 10px 20px;
            margin: 0 10px;
            border-radius: 5px;
            position: relative;
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        .box img {
            border-radius: 50%;
            width: 100px;
            height: 100px;
            display: block;
            margin-bottom: 10px;
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
    <?php 
    $levels = [];
    foreach ($strukturdosen as $item) {
        $levels[$item['level']][] = $item;
    }
    ?>
    <div class="container-dosen">
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
                        <?php if (!empty($item['images'])): ?>
                            <img src="<?= 'aset/img/' . $item['images'] ?>">
                        <?php endif; ?>
                        <div><?= $item['position'] ?></div>
                        <?php if (!empty($item['name'])): ?>
                            <div><?= $item['name'] ?></div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
</section>

@endsection
    