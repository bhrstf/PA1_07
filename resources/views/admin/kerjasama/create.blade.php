@extends('admin.master')

@section('title')
    Create Kerjasama
@endsection

@section('content')
<div class="section-body">
    <form action="{{ route('admin.kerjasama.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="text-right pr-3 pt-3">
                        <a href="{{ route('admin.kerjasama.index') }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-arrow-rotate-left"></i>
                            Kembali
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="logo">Pilih Logo :</label>
                            <input type="file" class="form-control" id="logo" name="logo" value="{{ old('logo') }}">
                            @error('logo')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="name_of_agency">Nama Instansi :</label>
                            <input type="text" class="form-control" id="name_of_agency" name="name_of_agency" >
                            @error('name_of_agency')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Deskripsi Instansi :</label>
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
            <button type="submit" class="btn btn-primary">Simpan Logo </button>
        </div>
    </form>
</div>
@endsection
