@extends('layouts.dashboard')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Calon</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="#">Data User</a></div>
            <div class="breadcrumb-item">Calon</div>
        </div>
    </div>

    <div class="section-body">
        {{-- <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-5">
            <div class="card profile-widget">
            </div>
        </div> --}}
        <div class="card">
            <div class="row">
                <div class="col-12">
                    <div class="card-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Calon</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                <div class="col-5 text-center">
                    <div class="gallery gallery-md">
                        <div class="gallery-item" style="
                        margin-top: 30px;
                        margin-right: 0px;
                        margin-bottom: 0px;
                        margin-left: 0px;
                        width: 300px; height: 300px;" data-toggle="modal" data-target="#foto{{ $data->id }}"
                            data-image="{{ asset('image/' . $data->image) }}" data-title="Image 1"></div>
                    </div>
                </div>
                <div class="col-7">
                    <form>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control" required="" value="{{ $data->nama }}">
                            </div>
                            <div class="form-group mb-0">
                                <label>Visi</label>
                                <textarea class="form-control" required="">{{ $data->visi }}</textarea>
                            </div>
                            <div class="form-group mb-0">
                                <label>Misi</label>
                                <textarea class="form-control" required="">{{ $data->visi }}</textarea>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection