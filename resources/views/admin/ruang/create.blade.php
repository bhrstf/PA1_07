@extends('admin.master')

@section('title')
    Create Ruang 
@endsection

@section('content')
<div class="section-body">
    <form action="{{ route('admin.ruang.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="text-right pr-3 pt-3">
                        <a href="{{ route('admin.ruang.index') }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-arrow-rotate-left"></i>
                            Kembali
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="ruang">Kategori Ruang : </label>
                            <select name="room_id" class="form-control">
                                <option value="">-- Pilih Ruang --</option>
                                @foreach ($category as $item)
                                    <option value="{{ $item->id }}">{{ $item->category }}</option>
                                @endforeach
                            </select>
                            @error('room_id')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                            <label for="images">Pilih Gambar : </label>
                            <input type="file" class="form-control" id="images" name="images" value="{{ old('images')}}">
                            @error('images')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Simpan Gambar Fasilitas</button>
        </div>
    </form>
</div>
@endsection
