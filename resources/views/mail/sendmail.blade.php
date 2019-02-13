@foreach($data as $d)
<h3> Pengadaan Barang UD Sunan Kali Jaga Kepada {{$d->nama_sup}} </h3>
<br>
<p> <i>Assalamualaikum, wr, wb</i> </p>
<p> Sehubungan dengan email ini, kami dari pihak management UD Sunan Kali jaga bermaksud untuk 
    melalukan pembelian barang pada perusahaan yang saudara pimpin. </p>
<p> Adapun rincian pembelian barangnya adalah sebagai berikut :</p>
<table class="table">
        <thead class="thead-dark">
          <tr>
            <th>No</th>
            <th>Nama Barang</th>
            <th>Warna</th>
            <th>jumlah Beli</th>
            <th>Satuan</th>
          </tr>
        </thead>
        <tbody>
            <tr>
                <th>1</th>
                <th>{{$d->nm_bar}}</th>
                <th>{{$d->warna}}</th>
                <th>{{$d->jml_order}}</th>
                <th>{{$d->satuan}}</th>
            </tr>
       </tbody>
      </table>
<p> Pesan order ini dibuat dengan sebenar-benarnya, kami harap {{$d->nama_sup}} dapat mengirimkan 
    barangnya sesuai dengan jumlah yang kami pesan. Atas kerja samanya, kami sampaikan Terimakasih </p>
<p> <i>Wassalamualaikum, wr, wb</i> </p>
<p> ttd </p>
<p> Manager </p>
<br><br>----------------------------------------------------------
<p> UD Sunan Kali Jaga <br>
</p>
@endforeach

