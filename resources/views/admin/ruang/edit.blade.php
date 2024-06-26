@extends('admin.master')

@section('title')
    Ruang 
@endsection

@section('subtitle')
    Form Edit
@endsection

@section('content')
<div class="text-right pr-3 pt-3">
    <a href="{{ route('admin.ruang.index') }}" class="btn btn-warning btn-sm"><i class="fa-solid fa-arrow-rotate-left"></i>
        Kembali
    </a>
</div>
    <div class="section-body">
        <form action="{{ route('admin.ruang.update', ['id' => $galeri->id]) }}"
            method="post" enctype="multipart/form-data">
          @method('put')
          @csrf
          <div class="form-group">
            <label for="ruang">Kategori</label>
            <input type="text" class="form-control" id="ruang" name="ruang" value="{{ $galeri->ruang }}" readonly>
        </div>
          <div class="form-group">
              <label for="gambar">Gambar</label>
              <input type="file" class="form-control" id="gambar" name="gambar">
          </div>
          <button type="submit" class="btn btn-primary" id="btn-simpan">Simpan</button>
          <a href="{{ route('admin.ruang.index') }}" class="btn btn-warning" id="btn-batal">Batal</a>
      </form>      
    </div>
@endsection

@section('styles')
    <style>
        .ck-editor__editable_inline {
            min-height: 200px;
        }
    </style>
@endsection

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
