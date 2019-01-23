<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<div class="container" style="margin-top: -100px">
<table style="width: 100%">
    <tr>
        <td style="width: 30%"></td>
        <td style="width: 40%"></td>
        <td style="width: 30%;text-align: center;"><span style="font-size: 8px;">{{$now}}</span></td>
    </tr>
    <tr>
        <td style="width: 30%"></td>
        <td style="width: 40%">
            <div style="text-align: center">
                <h2 style="font-size: 15px">UD Sunan Drajad<br>
                    Mojokerto<br>
                    081555622202
                </h2>
            </div>
        </td>
        <td style="width: 30%;"><span style="font-size: 8px;">Nama Pelanggan : {{$penjualans[0]->nama_pelanggan}}</span></td>
    </tr>
</table><br>
<table class="table" style="font-size: 8px">
    <thead>
    <tr>
        <th>No</th>
        <th>Nama Barang</th>
        <th>Jumlah</th>
        <th>Harga</th>
    </tr>
    </thead>
    <tbody><?php $total_brng=0;$i=1; ?>
        @foreach ($penjualans as $penjualan)
        <?php $total = $penjualan->total_bayar;
        $total_brng += $penjualan->jml_beli ?>
        <tr>
            <td>{{$i}}</td>
            <td>
                {{$penjualan->nama}}
            </td>
            <td>
                {{$penjualan->jml_beli}}
            </td>
            <td>
                {{$penjualan->harga_jual}}
            </td>
        </tr>
        <?php $i++; ?>
        @endforeach
    </tbody>
    <tfoot>
        <tr style="font-weight: bold;border-top: solid">
            <td colspan="2">Total</td>
            <td>{{$total_brng}}</td>
            <td><span id="total">{{$total}}</span></td>
        </tr>
    </tfoot>
</table>
</div>
