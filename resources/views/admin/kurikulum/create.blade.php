@extends('admin.master')

@section('title')
    Create Kurikulum
@endsection


@section('content')
    <div class="section-body">
        <form action="{{ Route('admin.kurikulum.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="text-right pr-3 pt-3">
                            <a href="{{ route('admin.kurikulum.index') }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-arrow-rotate-left"></i>
                                Kembali
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="form-group mb-3">
                                <label for="semester">Semester</label>
                                <input type="number" class="form-control" id="semester" name="semester"
                                    placeholder="">
                                @error('semester')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="sks">Jumlah SKS</label>
                                <input type="number" class="form-control" id="sks" name="sks"
                                    placeholder="Masukkan Jumlah SKS">
                                @error('sks')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="kode_mk">Kode Matakuliah</label>
                                <input type="text" class="form-control" id="kode_mk" name="kode_mk"
                                    placeholder="Contoh: MK101">
                                @error('kode_mk')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="subject">Nama Matakuliah</label>
                                <input type="text" class="form-control" id="subject" name="subject" 
                                    placeholder="Contoh : DASPRO">
                                @error('subject')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="status">Status Matakuliah</label>
                                <select name="status" class="form-control" id="status">
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                @error('status')
                                    <span class="text-danger mt-2">{{ $message }}</span>
                                @enderror
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Simpan Kurikulum</button>
            </div>
        </form>
    </div>
@endsection
