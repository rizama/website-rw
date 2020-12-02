@extends('layouts.default')

@section('title')
    Ekonomi
@endsection

@section('content')
<div class="page-header">
    <h2 class="header-title">Ekonomi</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="#" class="breadcrumb-item"><i class="anticon anticon-book m-r-5"></i>Beranda</a>
            <a class="breadcrumb-item" href="#">Ekonomi</a>
            <span class="breadcrumb-item active">Daftar Ekonomi</span>
        </nav>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <h4>Daftar Status Ekonomi</h4>
            </div>
            <div class="col-md-6">
                <a href="{{route('economics.create')}}" class="btn btn-primary m-r-5 float-right"> Tambah Status Ekonomi</a>
            </div>
        </div>
        <div class="m-t-25">
            <div class="table-responsive">
                <table id="data-table" class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Status Ekonomi</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($economics as $key => $economic)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$economic->name}}</td>
                            <td>{{$economic->description}}</td>
                            <td>
                                <a href="{{route('economics.edit', $economic->id)}}" data-toggle="tooltip" title="Ubah Data" >
                                    <button class="btn btn-icon btn-primary mr-1">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </a>
                                <button href="{{ route('economics.destroy', $economic->id) }}" data-name="{{ $economic->name }}" data-toggle="tooltip" title="Hapus Data" class="btn btn-icon btn-danger btn-delete">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<form action="" method="POST" id="deleteForm">
    @csrf
    @method('DELETE')
    <input type="submit" style="display: none;">
</form>

@endsection

@section('css')
    <link href="{{ url('templates/enlinkadmin-10/demo/app') }}/assets/vendors/datatables/dataTables.bootstrap.min.css" rel="stylesheet">
@endsection

@section('js')
    <script src="{{ url('templates/enlinkadmin-10/demo/app') }}/assets/vendors/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ url('templates/enlinkadmin-10/demo/app') }}/assets/vendors/datatables/dataTables.bootstrap.min.js"></script>

    <script>
        $('#data-table').DataTable();
    </script>

    <script>
        $('.btn-delete').on('click', function(e){
            e.preventDefault();
            let href = $(this).attr('href');
            let name = $(this).data('name');

            Swal.fire({
                title: `Apakah anda yakin menghapus ${name}?`,
                text: "Data ini tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    $('#deleteForm').attr('action', href);
                    $('#deleteForm').submit();
                }
            });
        });
    </script>
@endsection