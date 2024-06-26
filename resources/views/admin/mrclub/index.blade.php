@extends('admin.master')

@section('title')
    MR Club
@endsection

@section('subtitle')
    <a class="btn btn-primary" href="{{ route('admin.mrclub.create') }}" role="button">Tambah <i
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
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Nama Club</th>
                                    <th scope="col">Deskripsi Club</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mrclub as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img src="{{ asset('aset/img/' . $item->images) }}" alt="{{ $item->name }}" width="100"></td>
                                    <td>{{ $item->name }}</td>
                                    <td><?php echo $item->description ?></td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('admin.mrclub.edit', ['id' => $item->id]) }}" class="btn btn-warning "onclick="return confirm('Apakah Anda yakin ingin memperbaharui?')">Edit</a>
                                            <form action="{{ route('admin.mrclub.destroy', ['id' => $item->id]) }}" method="post">
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
