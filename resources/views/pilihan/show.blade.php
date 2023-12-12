@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-12">
                    <h4 style="color:#262626">Data Pemilih</h4>
                </div>
            </div>
            <div class="col">
                <div class="float-right">
                    <button class="btn btn-success" type="submit" data-toggle="modal"
                    data-target="#import">Import</button>
                    <a href="{{ route('pemilih.export') }}" style="text-decoration:none; color:#fff!important;">
                        <button class="btn btn-sm btn-info" type="button">Export</button>
                    </a>
                    <a href="#" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambah">Tambah</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Role</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        @foreach($datas as $data)
                        <tr>
                            <td><?= $no++ ?></td>
                            <td>{{ $data->nama }}</td>
                            <td>{{ $data->nama_prodi }}</td>
                            <td>{{ $data->username }}</td>
                            <td>{{ $data->pass }}</td>
                            <td>
                                <a href="/admin/pilihan/{{ $data->tahun }}/{{ $data->id }}">
                                    <button type="button" class="btn btn-sm btn-success">Detail</button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection