@extends('admin.master')

@section('title')
    Edit Berita
@endsection

@section('content')
<div class="section-body">
    <form action="{{ route('admin.berita.update', $berita->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="text-right pr-3 pt-3">
                        <a href="{{ route('admin.berita.index') }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-arrow-rotate-left"></i>
                            Kembali
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="images">Gambar :</label>
                            <input type="file"  class="form-control" id ="images" name="images">
                            <br> 
                            @error('images')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                            <img src="{{ asset('aset/img/' . $berita->images) }}" alt="{{ $berita->images }}" width="200">
                        </div>
                        <div class="form-group mb-3">
                            <label for="title">Masukkan Judul</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ $berita->title }}">
                            @error('title')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Deskripsi</label>
                            <textarea class="form-control summernote" name="description" id="summernote" style="height: 170px;" rows="5">{{ $berita->description }}</textarea>
                            @error('description')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>                  
                        <div class="form-group mb-3">
                            <label for="edit_date">Tanggal</label>
                            <input type="date" id="edit_date" name="date" class="form-control" value="{{ $berita->date }}">
                            @error('date')
                                <span class="text-danger mt-2">{{ $message }}</span>
                             @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="created_by">Ditulis oleh: </label>
                            <input type="text" id="created_by" name="created_by" class="form-control" value="{{ $berita->created_by }}">
                            @error('created_by')
                            <span class="text-danger mt-2">{{ $message }}</span>
                         @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary" id="btn-simpan">Simpan Berita</button>
        <a href="{{ route('admin.berita.index') }}" class="btn btn-warning" id="btn-batal">Batal</a>
    </form>
</div>
@endsection 


