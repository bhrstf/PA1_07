@extends('admin.master')

@section('title')
    Profil Lulusan
@endsection

@section('subtitle')
    <a class="btn btn-primary" href="{{ route('admin.profillulusan.create') }}" role="button">Tambah <i
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
                                        <th scope="col">Nama Pekerjaan</th>
                                        <th scope="col">Job Title</th>
                                        <th scope="col">Deskripsi Pekerjaan</th>
                                        <th scope="col">Aksi</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($profillulusan as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name}}</td>
                                            <td>{{ $item->jobtitle }}</td>
                                            <td><?php echo $item->description ?></td>
                                            <td>
                                                <div class="d-flex justify-content-center">
                                                    <a href="{{ route('admin.profillulusan.edit', ['profillulusan' => $item->id]) }}" class="btn btn-warning" onclick="return confirm('Apakah Anda yakin ingin memperbaharui?')">Edit</a>
                                                    <form action="{{ route('admin.profillulusan.destroy', ['profillulusan' => $item->id]) }}" method="post">
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
