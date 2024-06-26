@extends('admin.master')

@section('title')
    Create Prestasi Mahasiswa
@endsection

@section('content')
    <div class="section-body">
        <form action="{{ route('admin.prestasi.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="text-right pr-3 pt-3">
                            <a href="{{ route('admin.prestasi.index') }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-arrow-rotate-left"></i>
                                Kembali
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label for="name">Nama Kegiatan</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="">
                                @error('name')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="create_date">Waktu Pelaksanaan</label>
                                <input type="date" id="tcreate_date" class="form-control" name="time_event" placeholder="">
                                @error('time_event')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>                            
                            <div class="form-group">
                                <label for="achievement_level">Tingkat Prestasi</label>
                                <select name="achievement_level" class="form-control" id="achievement_level">
                                    <option value="Lokal">Lokal</option>
                                    <option value="Wilayah">Wilayah</option>
                                    <option value="Nasional">Nasional</option>
                                    <option value="Internasional">Internasional</option>
                                </select>                                
                                @error('achievement_level')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>   
                            <div class="form-group mb-3">
                                <label for="description">Prestasi yang Dicapai</label>
                                <input type="text" class="form-control" id="description" name="description" placeholder="">
                                @error('description')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan Prestasi Mahasiswa</button>
            </div>
        </form>
    </div>
@endsection
