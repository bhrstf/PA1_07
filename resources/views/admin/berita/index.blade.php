@extends('admin.master')

@section('title', 'Berita')
  
@section('subtitle')
    <a class="btn btn-primary" href="{{ route('admin.berita.create') }}" role="button">Tambah <i
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
                                    <th scope="col">Judul</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Penulis</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($berita as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img src="{{ asset('aset/img/'.$data->images) }}" alt="Gambar Berita"
                                            style="width: 100px;"></td>
                                    <td>{{ $data->title }}</td>
                                    <td><?php echo $data->description ?></td>
                                    <td>{{ $data->date }}</td>
                                    <td>{{ $data->created_by }}</td>
                                    <td>
                                        <div class="d-flex justify-content-center">
                                            <a href="{{ route('admin.berita.edit', ['id' => $data->id]) }}" class="btn btn-warning "onclick="return confirm('Apakah Anda yakin ingin memperbaharui?')">Edit</a>
                                            <form action="{{ route('admin.berita.destroy', ['id' => $data->id]) }}" method="post">
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
