@extends('admin.master')

@section('title', 'Dosen')

@section('subtitle')
    <a class="btn btn-primary" href="{{ route('admin.dosen.create') }}" role="button">Tambah <i class="fa-solid fa-plus"></i></a>
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
                                    <th scope="col">No</th>
                                    <th scope="col">Kode Pegawai</th>
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Nama Dosen & Staff</th>
                                    <th scope="col">Pendidikan Dosen & Staff</th>
                                    <th scope="col">Riset Pendidikan</th>
                                    <th scope="col">Matakuliah yang diampu</th>
                                    <th scope="col">Ruangan</th>
                                    <th scope="col">Role</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($dosen as $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->employee_no }}</td>
                                        <td><img src="{{ asset('aset/img/' . $item->images) }}" alt="{{ $item->name }}" width="100"></td>
                                        <td>{{ $item->name }}</td>
                                        <td><?php echo $item->education ?></td>
                                        <td><?php echo $item->riset ?></td>
                                        <td><?php echo $item->courses ?></td>
                                        <td><?php echo $item->room ?></td>
                                        <td>{{ $item->role }}</td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <a href="{{ route('admin.dosen.edit', ['id' => $item->id]) }}" class="btn btn-warning" onclick="return confirm('Apakah Anda yakin ingin memperbaharui?')">Edit</a>
                                                <form action="{{ route('admin.dosen.destroy', ['id' => $item->id]) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger mx-1" onclick="return confirm('Apakah Anda yakin ingin menghapus berita ini?')">Hapus</button>
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
