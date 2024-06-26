@extends('admin.master')

@section('title', 'Kurikulum')

@section('subtitle', 'Form Edit')

@section('content')
<div class="text-right pr-3 pt-3">
    <a href="{{ route('admin.kurikulum.index') }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-arrow-rotate-left"></i>
        Kembali
    </a>
</div>
    <form action="{{ route('admin.kurikulum.update', ['kurikulum' => $kurikulum->id]) }}" method="post">
        @method('put')
        @csrf
        <div class="form-group">
            <label for="semester">Semester</label>
            <input type="number" class="form-control" id="semester" name="semester" value="{{ $kurikulum->semester }}" required>
        </div>
        <div class="form-group">
            <label for="sks">Jumlah SKS</label>
            <input type="number" class="form-control" id="sks" name="sks" value="{{ old('sks', $kurikulum->sks) }}" required>
        </div>
        <div class="form-group">
            <label for="kode_mk">Kode Matakuliah</label>
            <input type="text" class="form-control" id="kode_mk" name="kode_mk" value="{{ $kurikulum->kode_mk }}" required>
        </div>
        <div class="form-group">
            <label for="subject">Nama Matakuliah</label>
            <input type="text" class="form-control" id="subject" name="subject" value="{{ $kurikulum->subject }}" required>
        </div>
        <div class="form-group">
            <label for="status">Status Matakuliah</label>
            <select name="status" class="form-control" id="status" required>
                <option value="active" {{ $kurikulum->status == 'active' ? 'selected' : '' }}>Active</option>
                <option value="inactive" {{ $kurikulum->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>        
        <button type="submit" class="btn btn-primary" id="btn-simpan">Simpan Kurikulum</button>
        <a href="{{ route('admin.kurikulum.index') }}" class="btn btn-warning" id="btn-batal">Batal</a>
    </form>
@endsection

{{-- @section('styles')
    <style>
        .ck-editor__editable_inline {
            min-height: 200px;
        }
    </style>
@endsection --}}

{{-- @section('scripts')
    <script src="https://cdn.ckeditor.com/ckeditor5/30.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection --}}
