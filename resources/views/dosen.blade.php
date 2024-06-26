@extends('layout.main')

@section('content')
<link href="{{URL::asset('/aset/css/custom-vid.css')}}" rel="stylesheet" />
<nav class="navbar bg-primary">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h1 text-center mx-auto text-white">DOSEN/STAF PENGAJAR</span>
    </div>
</nav>
<!-- Header - set the background image for the header in the line below-->
<header class="py-5 bg-image-full" style="background-image: url('{{URL::asset('aset/img/dosen.jpeg')}}'); height:400px; margin-bottom: 20px;">
    <div class="text-center my-5">
        <div class="navbar">
            <!-- Navbar content -->
        </div>
    </div>
</header>

<nav class="navbar bg-dark mt-3 mb-4">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h6 text-center mx-auto text-white">DOSEN</span>
    </div>
</nav>
<!-- Page Content -->
<div class="container">
    <div class="row">
        <!-- Team Dosen -->
        @foreach ($dosen as $item)
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow">
                <img src="{{ URL::asset('aset/img/'. $item->images) }}" class="card-img-top" alt="{{ $item->images }}">
                <div class="card-body text-center">
                    <button type="button" class="btn btn-light mt-2 btn-view-dosen" data-toggle="modal" data-target="#exampleModal{{$item->id}}">
                        <h5 class="card-title mb-0">{{ $item->name }}</h5>
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@foreach ($dosen as $item)
<div class="modal fade" id="exampleModal{{$item->id}}" tabindex="-1" aria-labelledby="exampleModalLabel{{$item->id}}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel{{$item->id}}">{{ $item->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="profile-container">
                    <div class="profile-image">
                        <img src="{{ URL::asset('aset/img/'. $item->images) }}" alt="{{ $item->images }}" style="width:100%">
                    </div>
                    <div class="profile-details mt-3">
                        <p><strong>NIDN:</strong> {{ $item->employee_no }}</p>
                        <h5>Pendidikan</h5>
                        <p><?php echo $item->education ?></p>
                        <h5>Riset Penelitian</h5>
                        <p><?php echo $item->riset ?></p>
                        <h5>Mata Kuliah yang diampu</h5>
                        <p><?php echo $item->courses ?></p>
                        <h5>Ruangan</h5>
                        <p><?php echo $item->room ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

<nav class="navbar bg-dark mt-3 mb-4">
    <div class="container-fluid">
        <span class="navbar-brand mb-0 h6 text-center mx-auto text-white">STAF</span>
    </div>
</nav>

<!-- Page Content -->
<div class="container">
    <div class="row">
        <!-- Team Staf -->
        @foreach ($staf as $item)
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-0 shadow">
                <img src="{{ URL::asset('aset/img/'. $item->images) }}" class="card-img-top" alt="{{ $item->images }}">
                <div class="card-body text-center">
                    <button type="button" class="btn btn-light mt-2 btn-view-staf" data-toggle="modal" data-target="#stafModal{{$item->id}}">
                        <h5 class="card-title mb-0">{{ $item->name }}</h5>
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@foreach ($staf as $item)
<div class="modal fade" id="stafModal{{$item->id}}" tabindex="-1" aria-labelledby="stafModalLabel{{$item->id}}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="stafModalLabel{{$item->id}}">{{ $item->name }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="profile-container">
                    <div class="profile-image">
                        <img src="{{ URL::asset('aset/img/'. $item->images) }}" alt="{{ $item->images }}" style="width:100%">
                    </div>
                    <div class="profile-details mt-3">
                        <h5>Pendidikan</h5>
                        <p><?php echo $item->education ?></p>
                        <h5>Riset Penelitian</h5>
                        <p><?php echo $item->riset ?></p>
                        <h5>Penugasan</h5>
                        <p><?php echo $item->courses ?></p>
                        <h5>Ruangan</h5>
                        <p><?php echo $item->room ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
    $(document).on('click', '.btn-view-dosen', function() {
        var dosenId = $(this).data('dosen-id');
        $('#exampleModal' + dosenId).modal('show');
    });

    $(document).on('click', '.btn-view-staf', function() {
        var stafId = $(this).data('dosen-id');
        $('#stafModal' + stafId).modal('show');
    });
</script>
@endsection
