@extends('admin.master')

@section('title')
    Edit Laboratorium
@endsection

@section('content')
<div class="section-body">
    <form action="{{ route('admin.laboratorium.update', $laboratorium->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="text-right pr-3 pt-3">
                        <a href="{{ route('admin.laboratorium.index') }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-arrow-rotate-left"></i>
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
                            <img src="{{ asset('aset/img/' . $laboratorium->images) }}" alt="{{ $laboratorium->images }}" width="200">
                        </div>
                        <div class="form-group mb-3">
                            <label for="lab_name">Nama Laboratorium :</label>
                            <input type="text" class="form-control" id="lab_name" name="lab_name" value="{{ $laboratorium->lab_name }}">
                            @error('lab_name')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="content">Deskripsi Laboratorium :</label>
                            <textarea class="form-control summernote" id="summernote" name="content" rows="3">{{ $laboratorium->content }}</textarea>
                            @error('content')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary" id="btn-simpan">Simpan Laboratorium</button>
        <a href="{{ route('admin.laboratorium.index') }}" class="btn btn-warning" id="btn-batal">Batal</a>
    </form>
</div>
@endsection
