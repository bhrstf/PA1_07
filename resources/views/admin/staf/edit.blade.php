@extends('admin.master')

@section('title')
    Edit Staf Activity
@endsection

@section('content')
<div class="section-body">
    <form action="{{ route('admin.staf.update', ['id' => $staf->id]) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="text-right pr-3 pt-3">
                        <a href="{{ route('admin.staf.index') }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-arrow-rotate-left"></i>
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
                            <img src="{{ asset('aset/img/' . $staf->images) }}" alt="{{ $staf->images }}" width="200">
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Nama staf:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $staf->name }}">
                            @error('name')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="education">Pendidikan staf :</label>
                            <textarea class="form-control summernote" id="summernote" name="education" rows="3">{{ $staf->education }}</textarea>
                            @error('education')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="riset">Riset Pendidikan :</label>
                            <textarea class="form-control summernote" id="summernote" name="riset" rows="3">{{ $staf->riset }}</textarea>
                            @error('riset')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="courses">Penugasan:</label>
                            <textarea class="form-control summernote" id="summernote" name="courses" rows="3">{{ $staf->courses }}</textarea>
                            @error('courses')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="room">Ruangan :</label>
                            <textarea class="form-control summernote" id="summernote" name="room" rows="3">{{ $staf->room }}</textarea>
                            @error('room')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.staf.index') }}" class="btn btn-warning">Batal</a>
        </div>
    </form>
</div>
@endsection
