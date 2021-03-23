@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                    <a href="{{url('/pemesanan/export')}}" class="btn btn-primary float-right btn-sm"><i class="fa fa-print"></i> Export</a>
                    <a href="#" class="btn btn-sm btn-flat btn-success btn-filter"><i class="fa fa-filter"></i> Filter Tanggal</a>
                    <a href="#" class="btn btn-sm btn-flat btn-info btn-filtertujuan"><i class="fa fa-filter"></i> Filter Tujuan</a>
                </p>
            </div>
            <div class="box-body">

                <div class="tabel-responsive">
                    <table class="table table-hover myTable">
                        <div class="col-lg-12 col-sm-12">
                            <thead>
                                <tr>
                                    <th><i class=""></i> No.</th>
                                    <th>Id</th>
                                    <th>Verifikasi</th>
                                    <th><i class="icon_profile"></i> Nama</th>
                                    <!---<th>Penumpang</th>--->

                                    <!--- <th>Alamat</th>
                                    <th>Penjemputan</th>
                                    <th>Jenis Kel</th>
                                    <th><i class="icon_mobile"></i>Nomor Hp</th>-->
                                    <th>Tanggal Pesan</th>
                                    <th>Tujuan</th>

                                    <th>Tarif</th>
                                    <th>Bangku</th>
                                    <th>
                                        <width="1%">Bukti Tf
                                    </th>
                                    <th>Status</th>
                                    @if(auth()->user()->role=='admin')
                                    <th><i class="icon_cogs"></i> Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; ?>
                                @foreach($data as $pemesan)
                                <?php $no++; ?>
                                <tr>
                                    <td>{{$no}}</td>
                                    <td>{{$pemesan->id_pemesanan}}</td>
                                    <td>
                                        @if($pemesan->is_verifikasi==1)
                                        <a href="{{ url('/datapemesan/verifikasi/'.$pemesan->id)  }}" class="btn btn-danger btn-xs">Belum</a>
                                        @else <a href="{{ url('/datapemesan/verifikasi/'.$pemesan->id)  }}" class="btn btn-success btn-xs">Lunas</a>
                                        @endif
                                    </td>
                                    <td><a href="{{ url('/datapemesan/'.$pemesan->id.'/detail') }}">{{$pemesan->user->name}}</a></td>
                                    <!---  <td>{{$pemesan->jumlah_penumpang}}</td>-->
                                    <!---  <td>{{$pemesan->alamat}}</td>
                                    <td>{{$pemesan->almt_jmpt}}</td>
                                    <td>{{$pemesan->jenis_kelamin}}</td>
                                    <td>{{$pemesan->no_hp}}</td>-->
                                    <td>{{$pemesan->tanggal_pesan}}</td>
                                    <td>{{$pemesan->jadwal->tujuan}}</td>
                                    <td>{{$pemesan->jadwal->biaya * $pemesan->jumlah_penumpang}}</td>
                                    <td>@foreach($pemesan->mobil as $mobil)
                                        {{$mobil->bangku}}
                                        @endforeach
                                    </td>
                                    <td><a href="{{ url('/datapemesan/'.$pemesan->id.'/detail') }}"> <img width=" 50px" class="" src="{{$pemesan->getAvatar()}}" alt="Photo"></td>
                                    <td><label class="label {{($pemesan->is_verifikasi==1) ? 'label-success': 'label-danger'}}">{{($pemesan->is_verifikasi==1) ? 'Lunas': 'Belum'}}</label></td>
                                    @if(auth()->user()->role=='admin')
                                    <td>
                                        <a href="{{ url('/datapemesan/'.$pemesan->id.'/delete')  }}"> <button type="button" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Akan Anda Hapus?')">Hapus</button></a>
                                        <a href="{{ url('/datapemesan/'.$pemesan->id.'/detail') }}"><button type="button" class="btn btn-success btn-xs"><i class="fa fa-user"></i> Detail</button></a>
                                        <a href="{{ url('/datapemesan/'.$pemesan->id.'/edit') }}"><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</button></a>
                                    </td>

                                    @endif
                                </tr>

                                @endforeach
                            </tbody>
                        </div>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-filter" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
    <div class="modal-dialog modal-default modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-danger">

            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-notification">Your attention is required</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">

                <form role="form" action="{{url('/datapemesan/periode')}}" method="get">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Dari Tanggal</label>
                            <input type="text" class="form-control datepicker" id="exampleInputEmail1" placeholder="Dari Tanggal" name="dari" autocomplete="off" value="{{ date('Y-m-d') }}">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputPassword1">Sampai tanggal</label>
                            <input type="text" class="form-control datepicker" name="sampai" id="exampleInputPassword1" placeholder="dari tanggal" autocomplete="off" value="{{ date('Y-m-d') }}">
                        </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal-filtertujuan" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
    <div class="modal-dialog modal-default modal-dialog-centered modal-" role="document">
        <div class="modal-content bg-gradient-danger">

            <div class="modal-header">
                <h6 class="modal-title" id="modal-title-notification">Your attention is required</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>

            <div class="modal-body">

                <form role="form" action="{{url('/datapemesan/tujuan')}}" method="get">
                    <div class="box-body">
                        <div class="form-group {{$errors->has('id_jadwal') ? 'has-error' :''}}">
                            <label for="id_jadwal">Tujuan</label>
                            <select name="tujuan" class="form-control" id="id_jadwal" require>
                                @foreach($jadwal as $jadwal)
                                <option value="{{$jadwal->id}}">{{$jadwal->tujuan}}</option>
                                @endforeach
                            </select>

                        </div>

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                </form>

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
        $('.btn-filter').click(function(e) {
            e.preventDefault();

            $('#modal-filter').modal();
        })
        $('.btn-filtertujuan').click(function(e) {
            e.preventDefault();

            $('#modal-filtertujuan').modal();
        })

    })
</script>

@endsection