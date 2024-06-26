@extends('admin.master')

@section('title')
    Kerja Sama
@endsection

@section('subtitle')
    <a class="btn btn-primary" href="{{ route('admin.kerjasama.create') }}" role="button">Tambah <i
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
                                    <th scope="col">No</th>
                                    <th scope="col">Logo</th>
                                    <th scope="col">Nama Instansi</th>
                                    <th scope="col">Deskripsi Instansi</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kerjasama as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img src="{{ asset('aset/img/' . $item->logo) }}" alt="{{ $item->name_of_agency }}" width="100"></td>
                                    <td>{{ $item->name_of_agency }}</td>
                                    <td><?php echo $item->description ?></td>
                                    <td>
                                        <div class="d-flex justify-description-center">
                                            <a href="{{ route('admin.kerjasama.edit', $item->id) }}" class="btn btn-warning "onclick="return confirm('Apakah Anda yakin ingin memperbaharui?')">Edit</a>
                                            <form action="{{ route('admin.kerjasama.destroy', $item->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger mx-1"
                                                    onclick="return confirm('Apakah Anda yakin ingin menghapus Logo ini?')">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
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
