@extends('admin.master')

@section('title')
    Edit Kategori Fasilitas
@endsection

@section('content')
    <div class="section-body">
        <form action="{{ route('admin.category.update', ['id' => $category->id]) }}" method="post">
            @method('put')
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="text-right pr-3 pt-3">
                            <a href="{{ route('admin.category.index') }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-arrow-rotate-left"></i>
                                Kembali
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label for="category">Kategori Fasilitas</label>
                                <input type="text" class="form-control" id="category" name="category"
                                    value="{{ $category->category }}">
                                @error('category')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Deskripsi Fasilitas</label>
                                <textarea class="form-control summernote" id="summernote" name="description"
                                    rows="3">{{ $category->description }}</textarea>
                                @error('description')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
@endsection
