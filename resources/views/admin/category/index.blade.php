@extends('admin.master')

@section('title', 'Category')
    
@section('subtitle')
    <a class="btn btn-primary" href="{{ route('admin.category.create') }}" role="button">Tambah <i class="fas fa-plus"></i></a>
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
                                    <th scope="col">Kategori Fasilitas</th>
                                    <th scope="col">Deskripsi Fasilitas</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->category }}</td>
                                    <td><?php echo $item->description ?></td>
                                    <td class="d-flex justify-content-center">
                                        <a href="{{ route('admin.category.view', ['id' => $item->id]) }}" class="btn btn-primary mr-2"><i class="fas fa-eye"></i></a>
                                        <a href="{{ route('admin.category.edit', ['id' => $item->id]) }}" class="btn btn-warning mr-2"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('admin.category.destroy', ['id' => $item->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="fas fa-trash"></i></button>
                                        </form>
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

