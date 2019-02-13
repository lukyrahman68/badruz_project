<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <div style="text-align: center">
            <h3>Laporan Penjualan<br>UD. Sunan Drajad</h3>
        </div>
        <div id="print_area" class="col-md-12">
            <?php $idx=1; ?>
                <div style="background-color: #ffff;padding:1em;">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Nama Pelanggan</td>
                            <td>Nama Barang</td>
                            {{--<td>Jenis</td>--}}
                            <td>Jumlah</td>
                            <td>Tanggal</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $total=0; ?>
                    @foreach ($penjualan as $penjualan)
                        <tr>
                            <td>{{$idx}}</td>
                            <td>{{$penjualan->namapelanggan}}</td>
                            <td>{{$penjualan->namabarang}}</td>
                            <td>{{$penjualan->total_bayar}}</td>
                            <td>{{$penjualan->aaa}}</td>
                        </tr>
                        <?php 
                        $total+= $penjualan->total_bayar;
                        ?>
                        
                <?php $idx++;?>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5">Total</td>
                            <td><?php echo $total ?></td>
                        </tr>
                    </tfoot>
                </table>
                </div>
                <br>
        </div>
