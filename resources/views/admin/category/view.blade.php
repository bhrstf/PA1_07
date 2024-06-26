@extends('admin.master')

@section('title')
    {{ $category->category }}
@endsection

@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="container mt-4">
                        <table class="table table-bordered">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Stok</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $category->category }}</td>
                                    <td><?php echo $category->description ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <div id="grid-system2" class="col-sm-3 mt-4">
                            <div class="box box-solid">
                                <div id="grid-system2-body" class="box-body" style="display: flex;">
                                    @foreach ($galery as $image)
                                        <img src="{{ asset('aset/img/'.$image->images) }}" class="img-thumbnail mr-2" style="flex: 1; max-width: 200px;">
                                    @endforeach
                                </div>                                
                            </div>
                        </div>
                        <a href="{{ route('admin.category.index') }}" class="btn btn-info btn-sm mt-5 mr-5 mb-2">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
