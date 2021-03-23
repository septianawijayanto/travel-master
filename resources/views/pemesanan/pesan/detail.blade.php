@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                </p>
            </div>
            <div class="box-body">
                <div class="col-lg-8 col-md-8">
                    <div class="table  table-hover">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <tbody>

                                <tr>
                                    <td>Id Pemesanan</td>
                                    <td>: {{$pemesanan->id_pemesanan}}</td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>: {{$pemesanan->user->name}}</td>
                                </tr>
                                <tr>
                                    <td>Kursi</td>

                                    <td>: @foreach($pemesanan->mobil as $mobil) {{$mobil->bangku}}@endforeach</td>

                                </tr>
                                <tr>
                                    <td>Dari</td>
                                    <td>: {{$pemesanan->alamat}}</td>
                                </tr>
                                <tr>
                                    <td>Alamat Penjemputan</td>
                                    <td>: {{$pemesanan->almt_jmpt}}</td>
                                </tr>
                                <tr>
                                    <td>Tujuan</td>
                                    <td>: {{$pemesanan->jadwal->tujuan}}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal</td>
                                    <td>: {{$pemesanan->tanggal_pesan}}</td>
                                </tr>

                                <tr>
                                    <td>No. Telepon</td>
                                    <td>: {{$pemesanan->no_hp}}</td>
                                </tr>
                                <tr>
                                    <td>Jumlah Penumpang</td>
                                    <td>: {{$pemesanan->jumlah_penumpang}}</td>
                                </tr>
                                <tr>
                                    <td>Ongkos</td>
                                    <td>: Rp.{{$pemesanan->jadwal->biaya *$pemesanan->jumlah_penumpang}}</td>
                                </tr>
                                <tr>
                                    <td>Verifikasi</td>

                                    <td><label class="label {{($pemesanan->is_verifikasi==1) ? 'label-success': 'label-danger'}}">{{($pemesanan->is_verifikasi==1) ? 'Lunas': 'Belum Lunas'}}</label></td>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <a href="{{ url('/datapemesan') }}"><button type="button" class="btn btn-success">Back</button></a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>

                </div>
                <div class="col-lg-4 col-md-4">
                    <a href="{{ url('/datapemesan') }}">
                        <img class="img-responsive" src="{{$pemesanan->getAvatar()}}" alt="Photo">

                </div>

            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script type="text/javascript">
    $(document).ready(function() {

        // btn refresh
        $('.btn-refresh').click(function(e) {
            e.preventDefault();
            $('.preloader').fadeIn();
            location.reload();
        })

    })
</script>

@endsection