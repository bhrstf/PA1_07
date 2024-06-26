@extends('admin.master')

@section('title')
    Prestasi Mahasiswa
@endsection

@section('subtitle')
    <a class="btn btn-primary" href="{{ route('admin.prestasi.create') }}" role="button">Tambah <i class="fa-solid fa-plus"></i></a>
@endsection

@section('content')
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered text-center" id="example1">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Nama Kegiatan</th>
                                        <th scope="col">Waktu Pelaksanaan</th>
                                        <th scope="col">Tingkat</th>
                                        <th scope="col">Prestasi yang Dicapai</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($prestasi as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->time_event }}</td>
                                            <td>{{ $item->achievement_level }}</td>
                                            <td>{{ $item->description }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('admin.prestasi.edit', $item->id) }}" class="btn btn-warning" onclick="return confirm('Apakah Anda yakin ingin memperbaharui?')">Edit</a>
                                                <form action="{{ route('admin.prestasi.destroy', $item->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger mx-1" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                                </form>
                                            </div>
                                        </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
