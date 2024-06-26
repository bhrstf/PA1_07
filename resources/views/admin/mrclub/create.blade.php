@extends('admin.master')

@section('title')
    Create MR Club
@endsection

@section('content')
<div class="section-body">
    <form action="{{ route('admin.mrclub.store') }}" method="post" enctype="multipart/form-data">
        @csrf
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
                            <input type="file" class="form-control" id="images" name="images" value="{{ old('images') }}">
                            @error('images')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Nama Club :</label>
                            <input type="text" class="form-control" id="name" name="name" >
                            @error('name')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Deskripsi club :</label>
                            <textarea class="form-control summernote" id="summernote" name="description" rows="3">{{ old('description') }}</textarea>
                            @error('description')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Simpan Club MR</button>
        </div>
    </form>
</div>
@endsection
