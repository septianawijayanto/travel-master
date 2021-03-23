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
                <form action="{{ url('/datapemesan/'.$pemesanan->id.'/update')}}" method="POST" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group {{$errors->has('id_jadwal') ? 'has-error' :''}}">
                            <label for="id_jadwal">Tujuan</label>
                            <select name="id_jadwal" class="form-control" id="id_jadwal" require>
                                @foreach($jadwal as $jadwal)
                                <option value="{{$jadwal->id}}" @if ($jadwal->id===$pemesanan->id_jadwal)
                                    selected
                                    @endif>{{$jadwal->tujuan}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('id_jadwal'))
                            <span class="help-block">{{$errors->first('avatar')}}</span>
                            @endif
                        </div>
                        <div class="form-group {{$errors->has('mobil') ? 'has-error' :''}}">
                            <label>Pilih Bangku</label>
                            <select name="mobil[]" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Pilih Bangku" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                @foreach($mobil as $mobil)
                                <option value="{{$mobil->id}}" @foreach($pemesanan->mobil as $value)
                                    @if($mobil->id == $value->id)
                                    selected
                                    @endif
                                    @endforeach>{{$mobil->kd_mobil}}/{{$mobil->bangku}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('mobil'))
                            <span class="help-block">{{$errors->first('mobil')}}</span>
                            @endif
                        </div>
                        <div class="form-group {{$errors->has('no_hp') ? 'has-error' :''}}">
                            <label for="exampleFormControlInput1">Nomor Hp</label>
                            <input name="no_hp" type="text" class="form-control" id="exampleFormControlInput1" value="{{$pemesanan->no_hp}}" placeholder="Nomor Hp">
                            @if($errors->has('no_hp'))
                            <span class="help-block">{{$errors->first('no_hp')}}</span>
                            @endif
                        </div>
                        <div class="form-group {{$errors->has('alamat') ? 'has-error' :''}}">
                            <label for="exampleFormControlTextarea1">Alamat</label>
                            <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$pemesanan->alamat}}</textarea>
                            @if($errors->has('alamat'))
                            <span class="help-block">{{$errors->first('alamat')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="form-group {{$errors->has('almt_jmpt') ? 'has-error' :''}}">
                            <label for="exampleFormControlTextarea1">Alamat Penjemputan</label>
                            <textarea name="almt_jmpt" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$pemesanan->almt_jmpt}}</textarea>
                            @if($errors->has('almt_jmpt'))
                            <span class="help-block">{{$errors->first('almt_jmpt')}}</span>
                            @endif
                        </div>
                        <div class="form-group {{$errors->has('jumlah_penumpang') ? 'has-error' :''}}">
                            <label for="exampleFormControlSelect1">Jumlah Penumpang</label>
                            <input name="jumlah_penumpang" type="text" class="form-control" id="exampleFormControlInput1" value="{{$pemesanan->jumlah_penumpang}}" placeholder="Input 1-7">
                            @if($errors->has('penumpang'))
                            <span class="help-block">{{$errors->first('penumpang')}}</span>
                            @endif
                        </div>

                        <div class="form-group {{$errors->has('jenis_kelamin') ? 'has-error' :''}}">
                            <label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                                <option value="">-Pilih-</option>
                                <option value="L" @if($pemesanan->jenis_kelamin=='L') selected @endif>Laki-Laki</option>
                                <option value="P" @if($pemesanan->jenis_kelamin=='P') selected @endif>Perempuan</option>
                            </select>
                            @if($errors->has('jenis_kelamin'))
                            <span class=" help-block">{{$errors->first('jenis_kelamin')}}</span>
                            @endif
                        </div>

                        <div class="form-group {{$errors->has('tanggal_pesan') ? 'has-error' :''}}">
                            <label for="exampleFormControlInput1">Tanggal Pesan</label>
                            <input name="tanggal_pesan" type="date" class="form-control" id="exampleFormControlInput1" value="{{$pemesanan->tanggal_pesan}}" placeholder="Tanggal Pesan">
                            @if($errors->has('tanggal_pesan'))
                            <span class="help-block">{{$errors->first('tanggal_pesan')}}</span>
                            @endif
                        </div>
                    </div>
                    <div class="modal-footer">
                        <a href="{{url('/datapemesan')}}" type="submit" class="btn btn-success">Back</a>
                        <button type="submit" class="btn btn-primary">Update</button>

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

    })
</script>

@endsection