<div class="table table-hover">
    <center>
        <h1>CV. Po. Kerinci Mulya</h1>
    </center>

    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <tbody>

            <tr>
                <td>Id Pemesanan</td>
                <td>: {{$dt->id_pemesanan}}</td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>: {{$dt->user->name}}</td>
            </tr>
            <tr>
                <td>Kursi</td>
                <td>: @foreach($dt->mobil as $mobil) {{$mobil->bangku}}@endforeach </td>
            </tr>
            <tr>
                <td>Dari</td>
                <td>: {{$dt->alamat}}</td>
            </tr>
            <tr>
                <td>Alamat Penjemputan</td>
                <td>: {{$dt->almt_jmpt}}</td>
            </tr>
            <tr>
                <td>Tujuan</td>
                <td>: {{$dt->jadwal->tujuan}}</td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td>: {{$dt->tanggal_pesan}}</td>
            </tr>

            <tr>
                <td>No. Telepon</td>
                <td>: {{$dt->no_hp}}</td>
            </tr>
            <tr>
                <td>Jumlah Penumpang</td>
                <td>: {{$dt->jumlah_penumpang}}</td>
            </tr>
            <tr>
                <td>Ongkos</td>
                <td>: Rp.{{$dt->jadwal->biaya *$dt->jumlah_penumpang}}</td>
            </tr>
            <tr>
                <td>Status Pembayaran</td>
                <td>: <label class="label {{($dt->is_verifikasi==1) ? 'label-success': 'label-danger'}}">{{($dt->is_verifikasi==1) ? 'Lunas': 'Belum Di Bayara/Dalam Proses'}}</label></td>

            </tr>



        </tbody>

    </table>

</div>