<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <div style="text-align: center">
            <h3>Laporan Barang Paling Laku<br>UD. Sunan Drajad</h3>
        </div>
        <?php $idx=1; ?>
        <div id="print_area" class="col-md-12">
                <div style="background-color: #ffff;padding:1em;">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Nama Barang</td>
                            <td>Jumlah</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($barang as $barang)
                        <tr>
                            <td>{{$idx}}</td>
                            <td>{{$barang->namabarang}}</td>
                            <td>{{$barang->j}}</td>
                        </tr>
                        
                <?php $idx++;?>
                        @endforeach
                    </tbody>
                    <tfoot>
                    </tfoot>
                </table>
                </div>
                <br>
        </div>
