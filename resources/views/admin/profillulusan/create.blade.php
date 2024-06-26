@extends('admin.master')

@section('title')
    Create Profil Lulusan
@endsection

@section('content')
    <div class="section-body">
        <form action="{{ route('admin.profillulusan.store') }}" method="post" enctype="multipart/form-data" id="createForm">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="text-right pr-3 pt-3">
                            <a href="{{ route('admin.profillulusan.index') }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-arrow-rotate-left"></i>
                                Kembali
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label for="name">Nama Pekerjaan</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Contoh: Market Engineer">
                                @error('name')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="jobtitle">Job Title</label>
                                <input type="text" class="form-control" id="jobtitle" name="jobtitle" placeholder="Contoh: Sales Engineer">
                                @error('jobtitle')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Deskripsi Pekerjaan</label>
                                <textarea class="form-control summernote" id="summernote" name="description" rows="3" placeholder=""></textarea>
                                @error('description')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan Profil Lulusan</button>
            </div>
        </form>
    </div>
@endsection
