@extends('admin.master')

@section('title')
    Edit Struktur Dosen
@endsection

@section('content')
<div class="section-body">
    <form action="{{ route('admin.strukturdosen.update', $strukturdosen->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="text-right pr-3 pt-3">
                        <a href="{{ route('admin.strukturdosen.index') }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-arrow-rotate-left"></i>
                            Kembali
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="images">Pilih Gambar :</label>
                            <input type="file" class="form-control" id="images" name="images">
                            @error('images')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                            <img src="{{ asset('aset/img/' . $strukturdosen->images) }}" alt="{{ $strukturdosen->images }}" width="200">
                        </div>
                        <div class="form-group mb-3">
                            <label for="level">Tingkat:</label>
                            <input type="number" class="form-control" id="level" name="level" value="{{ $strukturdosen->tingkat }}">
                            @error('level')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @else
                                <span class="text-danger mt-2">Tingkat harus berupa angka.</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Nama Dosen : :</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $strukturdosen->name }}">
                            @error('name')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="position">Posisi :</label>
                            <input type="text" class="form-control" id="position" name="position" value=" {{ $strukturdosen->position }}">
                            @error('position')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary" id="btn-simpan">Simpan Struktur Dosen</button>
        <a href="{{ route('admin.strukturdosen.index') }}" class="btn btn-warning" id="btn-batal">Batal</a>
    </form>
</div>
@endsection
