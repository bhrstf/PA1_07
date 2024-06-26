@extends('admin.master')

@section('title')
    Edit MR CLub
@endsection

@section('content')
<div class="section-body">
    <form action="{{ route('admin.mrclub.update', $mrclub->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="text-right pr-3 pt-3">
                        <a href="{{ route('admin.mrclub.index') }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-arrow-rotate-left"></i>
                            Kembali
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="images">Pilih gambar :</label>
                            <input type="file" class="form-control" id="images" name="images">
                            @error('images')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                            <img src="{{ asset('aset/img/' . $mrclub->images) }}" alt="{{ $mrclub->images }}" width="200">
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Nama Club :</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $mrclub->name }}">
                            @error('name')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Deskripsi CLub :</label>
                            <textarea class="form-control summernote" id="summernote" name="description" rows="3">{{ $mrclub->description }}</textarea>
                            @error('description')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary" id="btn-simpan">Simpan Club MR</button>
        <a href="{{ route('admin.mrclub.index') }}" class="btn btn-warning" id="btn-batal">Batal</a>
    </form>
</div>
@endsection
