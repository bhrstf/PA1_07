@extends('admin.master')

@section('title', 'Meta Table')

@section('subtitle')
    <a class="btn btn-primary" href="{{ route('admin.meta.create') }}" role="button">Tambah <i class="fas fa-plus"></i></a>
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
                                    <th scope="col">Meta Key</th>
                                    <th scope="col">Meta Title</th>
                                    <th scope="col">Meta Description</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($meta as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><?php echo $item->meta_key ?></td>
                                    <td><?php echo $item->meta_title ?></td>
                                    <td><?php echo $item->meta_description ?></td>
                                    <td class="d-flex justify-content-center">
                                        <a href="{{ route('admin.meta.edit', $item->id) }}" class="btn btn-primary mr-2"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('admin.meta.destroy', $item->id) }}" method="POST">
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
