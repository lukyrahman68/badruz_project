@extends('layouts.back_end')
@section('main')
    <br>
    <div class="container">
        <strong>Pembelian barang terbanyak</strong>
        <br>
        <form method="post" action="cekchart">
        @csrf
            <div class="form-group">
                <label>Tgl Mulai : </label>
                <input type="date" class="form-control" placeholder="Tgl mulai" name="tgl1">
            </div>
            <div class="form-group">
                <label>Tgl Selesai : </label>
                <input type="date" class="form-control" placeholder="Tgl selesai" name="tgl2">
            </div>
            <div class="form-group">
                <input type="submit" name="cek" value="Cek">
            </div>
        </form>
        <div class="col-md-12">
            <canvas id="myChart" width="400" style="max-height: 100%;"></canvas>
        </div>
<script>
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: [@isset($chart)
            @foreach($chart as $chart1)
            "{{$chart1->nama_pelanggan}}",
            @endforeach
        @endisset],
        datasets: [{
            label: '# Barang',
            data: [@isset($chart)
            @foreach($chart as $chart)
                "{{$chart->j}}",
            @endforeach
        @endisset],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206  , 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>
    </div>
@endsection
