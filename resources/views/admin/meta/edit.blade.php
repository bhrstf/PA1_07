@extends('admin.master')

@section('title')
    Edit Meta
@endsection

@section('content')
    <div class="section-body">
        <form action="{{ route('admin.meta.update', ['meta' => $meta->id]) }}" method="post">
            @method('put')
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="text-right pr-3 pt-3">
                            <a href="{{ route('admin.meta.index') }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-arrow-rotate-left"></i>
                                Kembali
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label for="meta_key">Meta Key</label>
                                <input type="text" class="form-control" id="meta_key" name="meta_key"
                                    value="{{ $meta->meta_key }}">
                                @error('meta_key')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="meta_title">Meta Title</label>
                                <textarea class="form-control" id="meta_title_summernote" name="meta_title"
                                    rows="3">{{ $meta->meta_title }}</textarea>
                                @error('meta_title')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="meta_description">Meta Deskripsi</label>
                                <textarea class="form-control summernote" id="summernote" name="meta_description" rows="3">{{ old('meta_description', $meta->meta_description) }}</textarea>
                                @error('meta_description')
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
