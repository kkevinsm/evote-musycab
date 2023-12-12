@extends('layouts.dashboard')

@section('content')
<section class="section" style="min-height: 80vh;">
    <div class="row">
        <div class="col-lg-12 ">
            <div class="card card-statistic-2">
                <div class="card-stats">
                    <div class="card-stats-title">Statistik</div>
                    <div class="card-stats-items">
                        <div class="card-stats-item">
                            <div class="card-stats-item-count">{{ $formaturs->count() }}</div>
                            <div class="card-stats-item-label">Calon</div>
                        </div>
                        <div class="card-stats-item">
                            <div class="card-stats-item-count">{{ $pemilihs->count() }}</div>
                            <div class="card-stats-item-label">Total Pemilih</div>
                        </div>
                        <div class="card-stats-item">
                            <div class="card-stats-item-count">{{ $sudahs }}</div>
                            <div class="card-stats-item-label">Sudah Memilih</div>
                        </div>

                        <div class="card-stats-item">
                            <div class="card-stats-item-count">{{ $belums }}</div>
                            <div class="card-stats-item-label">Belum Memilih</div>
                        </div>
                    </div>
                </div>
                <div class="card-wrap">
                    <div class="card-body"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="row" style="display: flex; justify-content: space-evenly;">
        <div class="col-lg-12 col-md-4 col-sm-12">
            <a href="/admin/pilihan/reset">
                <button class="btn btn-warning">Reset Pilihan</button>
            </a>
            <div class="card card-statistic-2">
                <div class="card-stats">
                    <div class="card-stats-title">Perolehan Suara Calon Pemira UNTAG</div>
                    @foreach($formaturs as $formatur)
                    <?php 
                        $jumlah = 0;
                        foreach ($pilihans as $pilihan) {
                            if($formatur->id == $pilihan->untuk){
                                $jumlah++;
                            }
                        }
                    ?>
                    @endforeach
                </div>
            </div>
            <canvas id="ipm"></canvas>
        </div>
    </div>
</section>
@endsection

@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ipm = document.getElementById('ipm');

  new Chart(ipm, {
    type: 'bar',
    data: {
      labels: [
        'Novia Oktaviani Febrilia' ,
        'Golput Calon Ketua DPM',
        'Erlina Dinda Safitri' ,
        'Naufal Gama Affandyar',
        'Michelle Hary Putrani' ,
        'Ardian Nugraha' ,
        'Muhammad Nur Sakim',
        'Mochamad Nuruddin Rasyid ' ,
        'Arizza Zulia R.J',
        'Alvazaki Ikbar M' ,
        'Golput Calon Ketua HIMABISNIS' ,
      ],
      datasets: [{
        axis: 'y',
        label: '# of Votes',
        data: [
        {{ $suara_ipm_1 }}, {{ $suara_ipm_2 }}, {{ $suara_ipm_3 }}, {{ $suara_ipm_4 }}, {{ $suara_ipm_5 }},
        {{ $suara_ipm_6 }}, {{ $suara_ipm_7 }}, {{ $suara_ipm_8 }}, {{ $suara_ipm_9 }}, {{ $suara_ipm_10 }},
        {{ $suara_ipm_11 }}
        ],
        backgroundColor: [
        'rgba(255, 99, 132)',
        'rgba(255, 159, 64)',
        'rgba(75, 192, 192)',
        'rgba(54, 162, 235)',
        'rgba(153, 102, 255)',
        'rgba(255, 99, 132)',
        'rgba(255, 159, 64)',
        'rgba(75, 192, 192)',
        'rgba(54, 162, 235)',
        'rgba(153, 102, 255)',
        'rgba(255, 99, 132)',
        ],
      }]
    },
    options: {
    indexAxis: 'y',
    },
  });
</script>
@endsection