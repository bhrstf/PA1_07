@extends('admin.master')

@section('title')
    Create Kategori Fasilitas
@endsection


@section('content')
    <div class="section-body">
        <form action="{{ Route('admin.category.store') }}" method="post" enctype="multipart/form-data">
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
                                <input type="text" id="category" name="category" class="form-control">
                                </select>
                                @error('category')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>                        
                            <div class="form-group">
                                <label for="description">Deskripsi Fasilitas</label>
                                <textarea class="form-control summernote" id="summernote" name="description" rows="3"
                                    placeholder=""></textarea>
                                @error('description')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan Nama Fasilitas</button>
            </div>
        </form>
    </div>
@endsection
