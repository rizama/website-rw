@extends('layouts.default')

@section('title')
    Penduduk
@endsection

@section('content')
<div class="page-header">
    <h2 class="header-title">Penduduk</h2>
    <div class="header-sub-title">
        <nav class="breadcrumb breadcrumb-dash">
            <a href="#" class="breadcrumb-item"><i class="anticon anticon-book m-r-5"></i>Beranda</a>
            <a class="breadcrumb-item" href="#">Penduduk</a>
            <span class="breadcrumb-item active">Daftar Penduduk</span>
        </nav>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <h4>Daftar Penduduk</h4>
            </div>
            <div class="col-md-6">
                <a href="{{route('persons.create')}}" class="btn btn-primary m-r-5 float-right"> Tambah Penduduk</a>
            </div>
        </div>
        <div class="m-t-25">
            <div class="table-responsive">
                <table id="data-table" class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>RT</th>
                            <th>Status Warga</th>
                            <th>Pekerjaan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($persons as $key => $person)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$person->name}}</td>
                            <td>{{$person->rt_number}}</td>
                            <td>{{$person->status->name}}</td>
                            <td>{{$person->job->name}}</td>
                            <td>
                                <a href="{{route('persons.show', $person->id)}}" data-toggle="tooltip" title="Detail" >
                                    <button class="btn btn-icon btn-success mr-1">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </a>
                                <a href="{{route('persons.edit', $person->id)}}" data-toggle="tooltip" title="Ubah Data" >
                                    <button class="btn btn-icon btn-primary mr-1">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                </a>
                                <button href="{{ route('persons.destroy', $person->id) }}" data-name="{{ $person->name }}" data-toggle="tooltip" title="Hapus Data" class="btn btn-icon btn-danger btn-delete">
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
    <link href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css" rel="stylesheet">
@endsection

@section('js')
    <script src="{{ url('templates/enlinkadmin-10/demo/app') }}/assets/vendors/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ url('templates/enlinkadmin-10/demo/app') }}/assets/vendors/datatables/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

    <script>
        $('#data-table').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
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