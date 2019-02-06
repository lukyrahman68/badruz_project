<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <div style="text-align: center">
            <h3>Laporan Pengadaan<br>UD. Sunan Drajad</h3>
        </div>
        <div id="print_area" class="col-md-12">
            <?php $idx=1; ?>
            
                <div style="background-color: #ffff;padding:1em;">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Nama Barang</td>
                            <td>Warna</td>
                            {{--<td>Jenis</td>--}}
                            <td>Jumlah</td>
                            <td>Tanggal</td>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $total=0; ?>
                    @foreach ($pengadaan as $pengadaan)
                        <tr>
                            <td>{{$idx}}</td>
                            <td>{{$pengadaan->nama}}</td>
                            <td>{{$pengadaan->warna}}</td>
                            <td>{{$pengadaan->jml_diterima}}</td>
                            <td>{{$pengadaan->aaa}}</td>
                            
                        </tr>
                        <?php 
                        $total+= $pengadaan->cost;
                        
                        ?>
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
                <?php $idx++;?>
            
        </div>
