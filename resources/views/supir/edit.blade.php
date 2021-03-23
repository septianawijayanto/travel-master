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
                <div class="row">
                    <div class="col-lg-12">
                        <form action="{{ url('/supir/'.$supir->id.'/update') }}" method="POST" enctype="multipart/form-data">
                            {{csrf_field()}}
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group {{$errors->has('nama_supir') ? 'has-error' :''}}">
                                    <label for="exampleFormControlInput1">Nama</label>
                                    <input name="nama_supir" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama" value="{{$supir->nama_supir}}">
                                    @if($errors->has('nama_supir'))
                                    <span class="help-block">{{$errors->first('nama_supir')}}</span>
                                    @endif
                                </div>
                                <div class="form-group {{$errors->has('mobil') ? 'has-error' :''}}">
                                    <label for="exampleFormControlInput1">Mobil</label>
                                    <input name="mobil" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Mobil" value="{{$supir->mobil}}">
                                    @if($errors->has('mobil'))
                                    <span class="help-block">{{$errors->first('mobil')}}</span>
                                    @endif
                                </div>
                                <div class="form-group {{$errors->has('tanggal') ? 'has-error' :''}}">
                                    <label for="exampleFormControlInput1">Tanggal</label>
                                    <input name="tanggal" type="date" class="form-control" id="exampleFormControlInput1" placeholder="Nama" value="{{$supir->tanggal}}">
                                    @if($errors->has('tanggal'))
                                    <span class="help-block">{{$errors->first('nama_supir')}}</span>
                                    @endif
                                </div>
                                <div class="form-group {{$errors->has('id_jadwal') ? 'has-error' :''}}">
                                    <label for="id_jadwal">Tujuan</label>
                                    <select name="id_jadwal" class="form-control" id="id_jadwal" require>
                                        @foreach($jadwal as $jadwal)
                                        <option value="{{$jadwal->id}}" @if ($jadwal->id===$supir->id_jadwal)
                                            selected
                                            @endif
                                            >{{$jadwal->kode}}/{{$jadwal->tujuan}}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('id_jadwal'))
                                    <span class="help-block">{{$errors->first('avatar')}}</span>
                                    @endif
                                </div>


                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="form-group {{$errors->has('jenis_kelamin') ? 'has-error' :''}}">
                                    <label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                                        <option value="L" @if($supir->jenis_kelamin=='L') selected @endif>Laki-Laki</option>
                                        <option value="P" @if($supir->jenis_kelamin=='P') selected @endif>Perempuan</option>
                                    </select>
                                    @if($errors->has('jenis_kelamin'))
                                    <span class="help-block">{{$errors->first('jenis_kelamin')}}</span>
                                    @endif
                                </div>
                                <div class="form-group {{$errors->has('no_hp') ? 'has-error' :''}}">
                                    <label for="exampleFormControlInput1">No Hp</label>
                                    <input name="no_hp" type="text" class="form-control" id="exampleFormControlInput1" placeholder="no hp" value="{{$supir->no_hp}}">
                                    @if($errors->has('no_hp'))
                                    <span class="help-block">{{$errors->first('no_hp')}}</span>
                                    @endif
                                </div>
                                <div class="form-group {{$errors->has('status') ? 'has-error' :''}}">
                                    <label for="exampleFormControlSelect1">Pilih Status</label>
                                    <select name="status" class="form-control" id="exampleFormControlSelect1">
                                        <option value="N" @if($supir->status=='N') selected @endif>Nikah</option>
                                        <option value="B" @if($supir->status=='B') selected @endif>Belum Nikah</option>
                                    </select>
                                    @if($errors->has('status'))
                                    <span class="help-block">{{$errors->first('status')}}</span>
                                    @endif
                                </div>
                                <div class="form-group {{$errors->has('avatar') ? 'has-error' :''}}">
                                    <label for="exampleInputFile">Avatar</label>
                                    <input type="file" name="avatar" class="form-control">
                                    <p class="help-block"></p>
                                    @if($errors->has('avatar'))
                                    <span class="help-block">{{$errors->first('avatar')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="form-group {{$errors->has('alamat') ? 'has-error' :''}}">
                                    <label for="exampleFormControlTextarea1">Alamat</label>
                                    <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$supir->alamat}}</textarea>
                                    @if($errors->has('alamat'))
                                    <span class="help-block">{{$errors->first('alamat')}}</span>
                                    @endif
                                </div>
                            </div>
                            <div class="modal-footer">
                                <a href="{{url('/supir')}}" type="submit" class="btn btn-success">Back</a>
                                <button type="update" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
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