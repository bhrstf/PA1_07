@extends('admin.master')

@section('title')
    Kurikulum
@endsection

@section('subtitle')
    <a class="btn btn-primary" href="{{ route('admin.kurikulum.create') }}" role="button">Tambah <i
            class="fa-solid fa-plus"></i></a>
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
                                        <th scope="col">Semester</th>
                                        <th scope="col">Jumlah SKS</th>
                                        <th scope="col">Kode Matakuliah</th>
                                        <th scope="col">Nama Matakuliah</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kurikulum as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->semester }}</td>
                                            <td>{{ $item->sks }}</td>
                                            <td>{{ $item->kode_mk }}</td>
                                            <td>{{ $item->subject }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('admin.kurikulum.edit', ['kurikulum' => $item->id]) }}" class="btn btn-warning" onclick="return confirm('Apakah Anda yakin ingin memperbaharui?')">Edit</a>
                                                    <form action="{{ route('admin.kurikulum.destroy', ['kurikulum' => $item->id]) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger mx-1"
                                                            onclick="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">Hapus</button>
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
