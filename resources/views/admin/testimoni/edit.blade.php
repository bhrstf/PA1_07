@extends('admin.master')

@section('title')
    Edit Testimoni 
@endsection

@section('content')
<div class="section-body">
    <form action="{{ route('admin.testimoni.update', $testimoni->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="text-right pr-3 pt-3">
                        <a href="{{ route('admin.testimoni.index') }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-arrow-rotate-left"></i>
                            Kembali
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="images">Pilih Gambar :</label>
                            <input type="file" class="form-control" id="images" name="images">
                            <br>
                            @error('images')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                            <img src="{{ asset('aset/img/'. $testimoni->images) }}" alt="{{ $testimoni->images }}" width="200">
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Nama Pemberi Testimoni :</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $testimoni->name }}">
                            @error('name')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="created_by">Ditulis oleh: </label>
                            <input type="text" class="form-control" id="created_by" name="created_by" value="{{ $testimoni->created_by }}" >
                            @error('created_by')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="jobdescription">Profesi Pemberi Testimoni :</label>
                            <input type="text" class="form-control" id="jobdescription" name="jobdescription" value="{{ $testimoni->jobdescription }}">
                            @error('profesi')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="content">Testimoni :</label>
                            <textarea class="form-control summernote" id="summernote" name="content" rows="3">{{ $testimoni->content }}</textarea>
                            @error('content')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary" id="btn-simpan">Simpan Testimoni</button>
        <a href="{{ route('admin.testimoni.index') }}" class="btn btn-warning" id="btn-batal">Batal</a>
    </form>
    </form>
</div>
@endsection
