@extends('layouts.dashboard')

@section('head')
{{-- Data Table --}}
<link rel="stylesheet" href="{{ asset('node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">

<!-- Chocolat -->
<link rel="stylesheet" href="{{ asset('assets/css/chocolat.css') }}" type="text/css" media="screen">
<script type="module" src="{{ asset('assets/js/chocolat.js') }}"></script>

<!-- Sweet Alert 2 -->
<link rel="stylesheet" href="{{ asset('assets/css/sweetalert2.min.css') }}">
<script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>

@endsection

@section('content')
<section class="section">
    <div class="section-header">
        <h1 style="color:#262626">Calon Pemira UNTAG</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item"><a href="#">Data User</a></div>
            <div class="breadcrumb-item">Calon UNTAG</div>
        </div>
    </div>  

    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12">
                    <h4 style="color:#262626">Data Calon</h4>
                </div>
            </div>
            <div class="col">
                <div class="float-right">
                    <button class="btn btn-success" type="submit" data-toggle="modal"
                        data-target="#import">Import</button>
                    <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambah">Tambah</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped dt-responsive nowrap datatables py-1 px-1" id="myTable">
                    <thead>
                        <tr>
                            <th style="width: 5%">No</th>
                            <th style="width: 70%">Nama</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        <?php $no = 1; ?>
                        @foreach($datas as $data)
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>{{ $data->nama }}</td>
                            <td>
                                <a href="{{ route('formatur.detail', $data->id) }}" class="btn btn-sm btn-info"
                                        data-bs-toggle="modal" data-bs-target="#detail_modal">Detail</a>
                                <button data-id="{{ $data->id }}" type="button" class="btn btn-sm btn-danger hapus">
                                    <i class="glyphicon glyphicon-trash"></i> Hapus
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

{{-- Modal Import --}}
<div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form id="modal-details" action="{{ route('formatur.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Import Data Calon</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="col-10" style="display:relative;">
                        <div style="position: relative; display: inline-block;">
                            <input name="file" type="file" class="custom-file-input btn-primary" id="customFile" required>
                            <label class="custom-file-label" for="customFile">Import Data</label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" form="modal-details">Import</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- End Modal Import --}}


<!-- Modal Tambah -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Calon</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('formatur.tambah') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input name="nama" type="text" class="form-control" id="nama" placeholder="Nama"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-3 col-form-label">Role</label>
                            <div class="col-sm-9">
                                <select name="role" class="form-control">
                                    <option value="ipm">IPM</option>
                                    <option value="hw">HW</option>
                                    <option value="ts">TS</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="visi" class="col-sm-3 col-form-label">Visi</label>
                            <div class="col-sm-9">
                                <input name="visi" type="text" class="form-control" id="visi" placeholder="Visi"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="misi" class="col-sm-3 col-form-label">Misi</label>
                            <div class="col-sm-9">
                                <input name="misi" type="text" class="form-control" id="misi" placeholder="Misi"
                                    required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="foto" class="col-sm-3 col-form-label">Foto</label>
                            <div class="col-sm-9">
                                <div class="custom-file">
                                    <input name="foto" type="file" class="custom-file-input" id="customFile" required>
                                    <label class="custom-file-label" for="customFile">Pilih File</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Modal  -->
@endsection

@section('js')
<!-- <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script> -->

{{-- <script src="{{ asset('assets/js/jquery.chocolat.min.js') }}"></script> --}}
{{-- <script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script> --}}

<script>
    $('.mark-done').on('click', function () {
        $('#table-1').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('formatur.index') }}",
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex'
                },
                {
                    data: 'nama',
                    name: 'nama'
                },
                {
                    data: 'foto',
                    name: 'foto'
                },
                {
                    data: 'visi',
                    name: 'visi'
                },
                {
                    data: 'misi',
                    name: 'misi'
                },
                {
                    data: 'action',
                    name: 'action'
                },
                {
                    data: 'detail',
                    name: 'detail'
                }
            ]
        });
    });

    // Sweet Alert 2
    $('.hapus').click(function () {
        var id = $(this).data("id");
        var url = "{{ route('formatur.hapus',":id") }}",
            url = url.replace(':id', id);

        console.log(id);
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        id: id
                    },
                    success: function () {
                        Swal.fire({
                            title: 'Deleted!',
                            text: 'Your file has been deleted.',
                            type: 'success',
                            timer: 1000,
                        });
                        setTimeout(function () {
                            location.reload(); // then reload the page.(3)
                        }, 1000);
                    },

                    error: function () {
                        alert('error');
                    },
                })
            }
        })
    });

</script>
@endsection