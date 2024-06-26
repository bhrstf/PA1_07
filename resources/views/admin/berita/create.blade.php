@extends('admin.master')

@section('title')
        Create Berita
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="text-right pr-3 pt-3">
                <a href="{{ route('admin.berita.index') }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-arrow-rotate-left"></i>
                    Kembali
                </a>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.berita.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Judul Berita:</label>
                        <input type="text" id="title" name="title" class="form-control">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="created_by">Penulis:</label>
                        <input type="text" id="created_by" name="created_by" class="form-control">
                        @error('created_by')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="images">Masukkan Gambar:</label>
                        <input type="file" id="images" name="images" class="form-control">
                        @error('images')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Konten dari berita:</label>
                        <textarea id="summernote" name="description" class="form-control summernote"></textarea>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="create_date">Tanggal:</label>
                        <input type="date" id="create_date" name="date" class="form-control">
                        @error('date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan Berita</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
