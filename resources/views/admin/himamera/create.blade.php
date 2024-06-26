@extends('admin.master')

@section('title')
    Create Himamera Activities
@endsection

@section('content')
<div class="section-body">
    <form action="{{ route('admin.himamera.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="text-right pr-3 pt-3">
                        <a href="{{ route('admin.himamera.index') }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-arrow-rotate-left"></i>
                            Kembali
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="images">Pilih Gambar :</label>
                            <input type="file" class="form-control" id="images" name="images" value="{{ old('images') }}">
                            @error('images')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="activity_name">Nama Aktivitas :</label>
                            <input type="text" class="form-control" id="activity_name" name="activity_name" >
                            @error('activity_name')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="content">Deskripsi Aktivitas :</label>
                            <textarea class="form-control summernote" id="summernote" name="content" rows="3">{{ old('content') }}</textarea>
                            @error('content')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Simpan Kegiatan Mahasiswa</button>
        </div>
    </form>
</div>
@endsection
