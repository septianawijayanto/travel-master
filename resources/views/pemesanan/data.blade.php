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
                                    <td>: {{$dt->id_pemesanan}}</td>
                                </tr>
                                <tr>
                                    <td>Nama</td>
                                    <td>: {{$dt->user->name}}</td>
                                </tr>
                                <tr>
                                    <td>Bangku</td>
                                    <td> : @foreach($dt->mobil as $mobil)
                                        {{$mobil->bangku}}
                                        @endforeach
                                    </td>
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
                                    <td>:<label class="label {{($dt->is_verifikasi==1) ? 'label-success': 'label-danger'}}">{{($dt->is_verifikasi==1) ? 'Lunas': 'Belum Di Bayara/Dalam Proses'}}</label></td>

                                </tr>
                                <tr>
                                    <td>
                                        @if ($cek2 ===0)
                                        <a href=""><button type="button" class="btn btn-success disabled">Cetak Tiket</button></a>
                                        @else

                                        <a href="{{ url('/cetak-tiket') }}"><button type="button" class="btn btn-success">Cetak Tiket</button></a>
                                        @endif
                                        <!--
                                    <a href="{{ url('/verifikasi/'.Auth::user()->id)}}"><button type="button" class="btn btn-primary">Verifikasi</button></a>
                                    -->
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>


                <div class="col-lg-4 col-md-4">
                    <img class="img-responsive" src="{{$dt->getAvatar()}}" alt="Photo">

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