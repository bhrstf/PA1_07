@extends('admin.master')

@section('title')
    Create Meta
@endsection

@section('content')
<div class="section-body">
    <form action="{{ route('admin.meta.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="text-right pr-3 pt-3">
                        <a href="{{ route('admin.meta.index') }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-arrow-rotate-left"></i> Kembali</a>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="meta_key">Meta Key</label>
                            <input type="text" class="form-control" id="meta_key" name="meta_key" placeholder="">
                            @error('meta_key')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="meta_title">Meta Title</label>
                            <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="">
                            @error('meta_title')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="meta_description">Meta Description</label>
                            <textarea class="form-control summernote" id="summernote" name="meta_description" placeholder=""></textarea>
                            @error('meta_description')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>                            
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Simpan Meta</button>
        </div>
    </form>
</div>
@endsection
