@extends('admin.master')

@section('title')
    Edit dosen Activity
@endsection

@section('content')
<div class="section-body">
    <form action="{{ route('admin.dosen.update', ['id' => $dosen->id]) }}" method="post" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="text-right pr-3 pt-3">
                        <a href="{{ route('admin.dosen.index') }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-arrow-rotate-left"></i>
                            Kembali
                        </a>
                    </div>
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label for="images">Pilih Gambar :</label>
                            <input type="file" class="form-control" id="images" name="images">
                            @error('images')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                            <img src="{{ asset('aset/img/' . $dosen->images) }}" alt="{{ $dosen->images }}" width="200">
                        </div>
                        <div class="form-group mb-3">
                            <label for="name">Nama Dosen:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $dosen->name }}">
                            @error('name')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="education">Pendidikan Dosen :</label>
                            <textarea class="form-control summernote" id="summernote" name="education" rows="3">{{ $dosen->education }}</textarea>
                            @error('education')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="riset">Riset Pendidikan :</label>
                            <textarea class="form-control summernote" id="summernote" name="riset" rows="3">{{ $dosen->riset }}</textarea>
                            @error('riset')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="courses">Matakuliah yang diampu :</label>
                            <textarea class="form-control summernote" id="summernote" name="courses" rows="3">{{ $dosen->courses }}</textarea>
                            @error('courses')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="room">Ruangan :</label>
                            <textarea class="form-control summernote" id="summernote" name="room" rows="3">{{ $dosen->room }}</textarea>
                            @error('room')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="employee_no">Kode Pegawai :</label>
                            <input type="text" class="form-control" id="employee_no" name="employee_no" value="{{ $dosen->employee_no }}">
                            @error('employee_no')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="role">Role :</label>
                            <select class="form-control" id="role" name="role" required>
                                <option value="dosen" {{ $dosen->role === 'dosen' ? 'selected' : '' }}>Dosen</option>
                                <option value="staff" {{ $dosen->role === 'staff' ? 'selected' : '' }}>Staff</option>
                            </select>
                            @error('role')
                                <span class="text-danger mt-2">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.dosen.index') }}" class="btn btn-warning">Batal</a>
        </div>
    </form>
</div>
@endsection
