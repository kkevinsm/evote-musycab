@extends('layouts.dashboard')

@section('head')
<style>
    .hidden {
        display: none;
    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">
@endsection

@section('content')
<section class="section">
    <form action="{{ route('guest.submit') }}" method="POST">
        <div class="section-header" style="color:#262626">
            <h1  style="color:#262626">Pilih Calon Pemira UNTAG</h1>
            <div class="col">
                <div class="float-right">
                    <!-- <button id="toastr" type="button" class="btn btn-success" onclick="toast()">Check category[]</button> -->
                    <button id="submitVote" type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </div>

        @csrf
        <div class="flex col">
            <div class="section-header" style="color:#262626">
                <h1  style="color:#262626">Pilih Calon Ketua Dewan Perwakilan Mahasiswa</h1>
            </div>

            <div class="row">
                @foreach($dpms as $data)
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="gallery gallery-lg">
                                <div class="gallery-item" style="margin: 0px 0px 15px 0px"
                                    data-target="#foto{{ $data->id }}" data-image="{{ asset('image/' . $data->image) }}"
                                    data-title="Image 1">
                                </div>
                            </div>
                            <div class="mb-2" style="padding: 3px"><h6>{{ $data->nama }}</h6></div>
                            <div>
                                <input id="{{ $data->id }}" type="checkbox" class="hidden" name="category[]" value="{{ $data->id }}">
                                <button id="voteDpm_{{$data->id}}" type="button" class="btn btn-success" onclick="voteDpm('{{ $data->id }}'); checkSelected({{ $data->id }});">Vote</button>
                                <button id="unVoteDpm_{{$data->id}}" type="button" class="btn btn-danger hidden" onclick="unVoteDpm('{{ $data->id }}'); checkSelected({{ $data->id }});">Batalkan Vote</button>
                            </div>
                        </div>
                        <div class="card-body" style="padding-top: 0px;">
                            <div style="width:100%; text-align:center">
                                <button class="btn btn-primary" type="button" data-toggle="collapse"
                                    data-target="#collapseExample1{{$data->id}}" aria-expanded="false"
                                    aria-controls="collapseExample1{{$data->id}}">
                                    VISI
                                </button>
                                <button class="btn btn-primary" type="button" data-toggle="collapse"
                                    data-target="#collapseExample2{{$data->id}}" aria-expanded="false"
                                    aria-controls="collapseExample2{{$data->id}}">
                                    MISI
                                </button>
                            </div>
                            <div class="collapse" id="collapseExample1{{$data->id}}"
                                style="width:100%; border-bottom: 1px solid #c5c5c5; padding:5px; text-align: justify;">
                                {{ $data->visi }}
                            </div>
                            <div class="collapse" id="collapseExample2{{$data->id}}" style="width:100%; padding:5px;">
                                {{ $data->misi }}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- BEM -->
            <div class="section-header" style="color:#262626">
                <h1  style="color:#262626">Pilih Calon Badan Eksekutif Mahasiswa</h1>
            </div>

            <div class="row">
                @foreach($bems as $data)
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="gallery gallery-lg">
                                <div class="gallery-item" style="margin: 0px 0px 15px 0px"
                                    data-target="#foto{{ $data->id }}" data-image="{{ asset('image/' . $data->image) }}"
                                    data-title="Image 1">
                                </div>
                            </div>
                            <div class="mb-2" style="padding: 3px"><h6>{{ $data->nama }}</h6></div>
                            <div>
                                <input id="{{ $data->id }}" type="checkbox" class="hidden" name="category[]"
                                    value="{{ $data->id }}">
                                <button id="voteBem_{{$data->id}}" type="button" class="btn btn-success"
                                    onclick="voteBem({{ $data->id }}); checkSelected({{ $data->id }});">Vote</button>
                                <button id="unVoteBem_{{$data->id}}" type="button" class="btn btn-danger hidden"
                                    onclick="unVoteBem({{ $data->id }}); checkSelected({{ $data->id }});">Batalkan Vote</button>
                            </div>
                        </div>
                        <div class="card-body" style="padding-top: 0px;">
                            <div style="width:100%; text-align:center">
                                <button class="btn btn-primary" type="button" data-toggle="collapse"
                                    data-target="#collapseExample1{{$data->id}}" aria-expanded="false"
                                    aria-controls="collapseExample1{{$data->id}}">
                                    VISI
                                </button>
                                <button class="btn btn-primary" type="button" data-toggle="collapse"
                                    data-target="#collapseExample2{{$data->id}}" aria-expanded="false"
                                    aria-controls="collapseExample2{{$data->id}}">
                                    MISI
                                </button>
                            </div>
                            <div class="collapse" id="collapseExample1{{$data->id}}"
                                style="width:100%; border-bottom: 1px solid #c5c5c5; padding:5px; text-align: justify;">
                                {{ $data->visi }}
                            </div>
                            <div class="collapse" id="collapseExample2{{$data->id}}" style="width:100%; padding:5px;">
                                {{ $data->misi }}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            @if($pemilih->nama_prodi === "Manajemen")
            <!-- HIMAJEMENS -->
            <div class="section-header" style="color:#262626">
                <h1  style="color:#262626">Pilih Calon Ketua HIMAJEMEN</h1>
            </div>

            <div class="row">
                @foreach($himajemens as $data)
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="gallery gallery-lg">
                                <div class="gallery-item" style="margin: 0px 0px 15px 0px"
                                    data-target="#foto{{ $data->id }}" data-image="{{ asset('image/' . $data->image) }}"
                                    data-title="Image 1">
                                </div>
                            </div>
                            <div class="mb-2" style="padding: 3px"><h6>{{ $data->nama }}</h6></div>
                            <div>
                                <input id="{{ $data->id }}" type="checkbox" class="hidden" name="category[]"
                                    value="{{ $data->id }}">
                                <button id="voteHimajemen_{{$data->id}}" type="button" class="btn btn-success"
                                    onclick="voteHimajemen({{ $data->id }}); checkSelected({{ $data->id }});">Vote</button>
                                <button id="unVoteHimajemen_{{$data->id}}" type="button" class="btn btn-danger hidden"
                                    onclick="unVoteHimajemen({{ $data->id }}); checkSelected({{ $data->id }});">Batalkan Vote</button>
                            </div>
                        </div>
                        <div class="card-body" style="padding-top: 0px;">
                            <div style="width:100%; text-align:center">
                                <button class="btn btn-primary" type="button" data-toggle="collapse"
                                    data-target="#collapseExample1{{$data->id}}" aria-expanded="false"
                                    aria-controls="collapseExample1{{$data->id}}">
                                    VISI
                                </button>
                                <button class="btn btn-primary" type="button" data-toggle="collapse"
                                    data-target="#collapseExample2{{$data->id}}" aria-expanded="false"
                                    aria-controls="collapseExample2{{$data->id}}">
                                    MISI
                                </button>
                            </div>
                            <div class="collapse" id="collapseExample1{{$data->id}}"
                                style="width:100%; border-bottom: 1px solid #c5c5c5; padding:5px; text-align: justify;">
                                {{ $data->visi }}
                            </div>
                            <div class="collapse" id="collapseExample2{{$data->id}}" style="width:100%; padding:5px;">
                                {{ $data->misi }}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            @elseif($pemilih->nama_prodi === "Akuntansi")
            <div class="section-header" style="color:#262626">
                <h1  style="color:#262626">Pilih Calon Ketua HIMATANSI</h1>
            </div>

            <div class="row">
                @foreach($himatansis as $data)
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="gallery gallery-lg">
                                <div class="gallery-item" style="margin: 0px 0px 15px 0px"
                                    data-target="#foto{{ $data->id }}" data-image="{{ asset('image/' . $data->image) }}"
                                    data-title="Image 1">
                                </div>
                            </div>
                            <div class="mb-2" style="padding: 3px"><h6>{{ $data->nama }}</h6></div>
                            <div>
                                <input id="{{ $data->id }}" type="checkbox" class="hidden" name="category[]"
                                    value="{{ $data->id }}">
                                <button id="voteHimatansi_{{$data->id}}" type="button" class="btn btn-success"
                                    onclick="voteHimatansi({{ $data->id }}); checkSelected({{ $data->id }});">Vote</button>
                                <button id="unVoteHimatansi_{{$data->id}}" type="button" class="btn btn-danger hidden"
                                    onclick="unVoteHimatansi({{ $data->id }}); checkSelected({{ $data->id }});">Batalkan Vote</button>
                            </div>
                        </div>
                        <div class="card-body" style="padding-top: 0px;">
                            <div style="width:100%; text-align:center">
                                <button class="btn btn-primary" type="button" data-toggle="collapse"
                                    data-target="#collapseExample1{{$data->id}}" aria-expanded="false"
                                    aria-controls="collapseExample1{{$data->id}}">
                                    VISI
                                </button>
                                <button class="btn btn-primary" type="button" data-toggle="collapse"
                                    data-target="#collapseExample2{{$data->id}}" aria-expanded="false"
                                    aria-controls="collapseExample2{{$data->id}}">
                                    MISI
                                </button>
                            </div>
                            <div class="collapse" id="collapseExample1{{$data->id}}"
                                style="width:100%; border-bottom: 1px solid #c5c5c5; padding:5px; text-align: justify;">
                                {{ $data->visi }}
                            </div>
                            <div class="collapse" id="collapseExample2{{$data->id}}" style="width:100%; padding:5px;">
                                {{ $data->misi }}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            @elseif($pemilih->nama_prodi === "Ekonomi Pembangunan")
            <div class="section-header" style="color:#262626">
                <h1  style="color:#262626">Pilih Calon Ketua HIMABISNIS</h1>
            </div>

            <div class="row">
                @foreach($himabisniss as $data)
                <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="gallery gallery-lg">
                                <div class="gallery-item" style="margin: 0px 0px 15px 0px"
                                    data-target="#foto{{ $data->id }}" data-image="{{ asset('image/' . $data->image) }}"
                                    data-title="Image 1">
                                </div>
                            </div>
                            <div class="mb-2" style="padding: 3px"><h6>{{ $data->nama }}</h6></div>
                            <div>
                                <input id="{{ $data->id }}" type="checkbox" class="hidden" name="category[]"
                                    value="{{ $data->id }}">
                                <button id="voteHimabisnis_{{$data->id}}" type="button" class="btn btn-success"
                                    onclick="voteHimabisnis({{ $data->id }}); checkSelected({{ $data->id }});">Vote</button>
                                <button id="unVoteHimabisnis_{{$data->id}}" type="button" class="btn btn-danger hidden"
                                    onclick="unVoteHimabisnis({{ $data->id }}); checkSelected({{ $data->id }});">Batalkan Vote</button>
                            </div>
                        </div>
                        <div class="card-body" style="padding-top: 0px;">
                            <div style="width:100%; text-align:center">
                                <button class="btn btn-primary" type="button" data-toggle="collapse"
                                    data-target="#collapseExample1{{$data->id}}" aria-expanded="false"
                                    aria-controls="collapseExample1{{$data->id}}">
                                    VISI
                                </button>
                                <button class="btn btn-primary" type="button" data-toggle="collapse"
                                    data-target="#collapseExample2{{$data->id}}" aria-expanded="false"
                                    aria-controls="collapseExample2{{$data->id}}">
                                    MISI
                                </button>
                            </div>
                            <div class="collapse" id="collapseExample1{{$data->id}}"
                                style="width:100%; border-bottom: 1px solid #c5c5c5; padding:5px; text-align: justify;">
                                {{ $data->visi }}
                            </div>
                            <div class="collapse" id="collapseExample2{{$data->id}}" style="width:100%; padding:5px;">
                                {{ $data->misi }}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif
        </div>
    </form>
</section>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js"></script>
<script>
    


    // DPM
    var selectedDpmId = null;
    function unVoteDpm(id) {
        console.log("unvoting for DPM with ID: " + id);
        document.getElementById("voteDpm_" + id).classList.remove("hidden");
        document.getElementById("unVoteDpm_" + id).classList.add("hidden");
        document.getElementById(id).checked = false;

        if(selectedDpmId == id) {
            selectedDpmId = null;
        }

        checkSelected();
    }

    function voteDpm(id) {
        console.log("Voting for DPM with ID: " + id);
        if (selectedDpmId != id) {
            document.getElementById("voteDpm_" + id).classList.add("hidden");
            document.getElementById("unVoteDpm_" + id).classList.remove("hidden");
            document.getElementById(id).checked = true;

            beforeSelectedId = selectedDpmId;
            selectedDpmId = id;
            document.getElementById("voteDpm_" + beforeSelectedId).classList.remove("hidden");
            document.getElementById("unVoteDpm_" + beforeSelectedId).classList.add("hidden");
            document.getElementById(beforeSelectedId).checked = false;
        } else {
            document.getElementById(id).checked = true;
        }
        
        checkSelected();
    }

    //Badan Eksekutif Mahasiswa
    var selectedBemId = null;
    function unVoteBem(id) {
        console.log("unvoting for bem with ID: " + id);
        document.getElementById("voteBem_" + id).classList.remove("hidden");
        document.getElementById("unVoteBem_" + id).classList.add("hidden");
        document.getElementById(id).checked = false;

        if(selectedBemId == id) {
            selectedBemId = null;
        }

        checkSelected();
    }

    function voteBem(id) {
        console.log("voting for bem with ID: " + id);
        if (selectedBemId != id) {
            document.getElementById("voteBem_" + id).classList.add("hidden");
            document.getElementById("unVoteBem_" + id).classList.remove("hidden");
            document.getElementById(id).checked = true;

            beforeSelectedId = selectedBemId;
            selectedBemId = id;
            document.getElementById("voteBem_" + beforeSelectedId).classList.remove("hidden");
            document.getElementById("unVoteBem_" + beforeSelectedId).classList.add("hidden");
            document.getElementById(beforeSelectedId).checked = false;
        } else {
            document.getElementById(id).checked = true;
        }
        
        checkSelected();
    }

    //Himajemen
    var selectedHimajemenId = null;
    function unVoteHimajemen(id) {
        console.log("unvoting for himajemen with ID: " + id);
        document.getElementById("voteHimajemen_" + id).classList.remove("hidden");
        document.getElementById("unVoteHimajemen_" + id).classList.add("hidden");
        document.getElementById(id).checked = false;

        if(selectedHimajemenId == id) {
            selectedHimajemenId = null;
        }

        checkSelected();
    }

    function voteHimajemen(id) {
        console.log("Voting for himajemen with ID: " + id);
        if (selectedHimajemenId != id) {
            document.getElementById("voteHimajemen_" + id).classList.add("hidden");
            document.getElementById("unVoteHimajemen_" + id).classList.remove("hidden");
            document.getElementById(id).checked = true;

            beforeSelectedId = selectedHimajemenId;
            selectedHimajemenId = id;
            document.getElementById("voteHimajemen_" + beforeSelectedId).classList.remove("hidden");
            document.getElementById("unVoteHimajemen_" + beforeSelectedId).classList.add("hidden");
            document.getElementById(beforeSelectedId).checked = false;
        } else {
            document.getElementById(id).checked = true;
        }

        checkSelected();
    }

    //Himatansi
    var selectedHimatansiId = null;
    function unVoteHimatansi(id) {
        console.log("unvote for himatansi with ID: " + id);
        document.getElementById("voteHimatansi_" + id).classList.remove("hidden");
        document.getElementById("unVoteHimatansi_" + id).classList.add("hidden");
        document.getElementById(id).checked = false;

        if(selectedHimatansiId == id) {
            selectedHimatansiId = null;
        }

        checkSelected();
    }

    function voteHimatansi(id) {
        console.log("Voting for himatansi with ID: " + id);
        if (selectedHimatansiId != id) {
            document.getElementById("voteHimatansi_" + id).classList.add("hidden");
            document.getElementById("unVoteHimatansi_" + id).classList.remove("hidden");
            document.getElementById(id).checked = true;

            beforeSelectedId = selectedHimatansiId;
            selectedHimatansiId = id;
            document.getElementById("voteHimatansi_" + beforeSelectedId).classList.remove("hidden");
            document.getElementById("unVoteHimatansi_" + beforeSelectedId).classList.add("hidden");
            document.getElementById(beforeSelectedId).checked = false;
        } else {
            document.getElementById(id).checked = true;
        }

        checkSelected();
    }

    //Himabisnis
    var selectedHimabisnisId = null;
    function unVoteHimabisnis(id) {
        console.log("unvote for himabisnis with ID: " + id);
        document.getElementById("voteHimabisnis_" + id).classList.remove("hidden");
        document.getElementById("unVoteHimabisnis_" + id).classList.add("hidden");
        document.getElementById(id).checked = false;

        if(selectedHimabisnisId == id) {
            selectedHimabisnisId = null;
        }

        checkSelected();
    }

    function voteHimabisnis(id) {
        console.log("Voting for himabisnis with ID: " + id);
        if (selectedHimabisnisId != id) {
            document.getElementById("voteHimabisnis_" + id).classList.add("hidden");
            document.getElementById("unVoteHimabisnis_" + id).classList.remove("hidden");
            document.getElementById(id).checked = true;

            beforeSelectedId = selectedHimabisnisId;
            selectedHimabisnisId = id;
            document.getElementById("voteHimabisnis_" + beforeSelectedId).classList.remove("hidden");
            document.getElementById("unVoteHimabisnis_" + beforeSelectedId).classList.add("hidden");
            document.getElementById(beforeSelectedId).checked = false;
        } else {
            document.getElementById(id).checked = true;
        }

        checkSelected();
    }


    // Menghitung
    var checkedValues = [];
    function checkSelected(id) {
        document.getElementById(id).checked = true;
        var checkboxes = document.getElementsByName('category[]');
        var submitButton = document.getElementById('submitVote');
        console.log("checkboxes", checkboxes);
        checkedValues = []; // Reset the array before checking again
        count = 0;

        for (var i = 0; i < checkboxes.length; i++) {
            if (checkboxes[i].checked) {
                count++;
                checkedValues.push(checkboxes[i].value);
            }
        }

        console.log("Number of checked checkboxes: " + count);
        console.log("Checked checkbox values: " + checkedValues);

        if (count == 3) {
            document.getElementById("toastr").classList.add("hidden");
            document.getElementById("submitVote").classList.remove("hidden");
        } else {
            document.getElementById("toastr").classList.remove("hidden");
            document.getElementById("submitVote").classList.add("hidden");
        }
    }
    

    function toast() {
        check = document.getElementsByName("category[]");
        console.log(check);

        var checked = [];
        for (var i = 0; i < check.length; i++) {
            if (check[i].checked) {
                checked.push(check[i].value);
            }
        }

        console.log("Radio buttons with values " + checked.join(', ') + " are checked.");

        iziToast.warning({
            title: 'Error',
            message: 'Ada yang belum anda pilih!',
            position: 'topCenter',
        });

    }
</script>
@endsection