<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <div style="text-align: center">
            <h3>Laporan Penjualan<br>UD. Sunan Drajad</h3>
        </div>
        <div id="print_area" class="col-md-12">
            <?php $idx=1; ?>
            @foreach ($pelanggans as $pelanggan)
                <div style="background-color: #ffff;padding:1em;">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Pelanggan</td>
                            <td>Nama Barang</td>
                            <td>Jumlah Beli</td>
                            <td>Harga Satuan</td>
                            <td>Tanggal</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{$idx}}</td>
                            <td>{{$pelanggan->nama_pelanggan}}</td>
                            <td>{{$pelanggan->nama_barang}}</td>
                            <td>{{$pelanggan->jml_beli}}</td>
                            <td>{{$pelanggan->harga_jual}}</td>
                            <td>{{$pelanggan->created_at}}</td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5">Total</td>
                            <td>{{$pelanggan->total_bayar}}</td>
                        </tr>
                    </tfoot>
                </table>
                </div>
                <br>
                <?php $idx++;?>
            @endforeach
        </div>
