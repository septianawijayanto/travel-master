@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>
                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                    @if(auth()->user()->role=='admin')
                    <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#exampleModalLong"><i class="fa fa-plus-square"></i>
                        Tambah Data
                    </button>
                    <a href="{{url('/supir/export')}}" class="btn btn-primary float-right btn-sm">Export</a>
                    @endif
                </p>

            </div>
            <div class="box-body">

                <div class="table-responsive">
                    <table class="table table-hover myTable">
                        <div class="col-lg-12 col-sm-12">
                            <thead>
                                <tr>
                                    <th><i class=""></i> No.</th>
                                    <th><i class="icon_profile"></i> Nama supir</th>
                                    <th>Mobil</th>
                                    <th>Tanggal</th>
                                    <th>Alamat</th>
                                    <th>Jenis Kelamin</th>
                                    <th><i class="icon_mobile"></i>Nomor Hp</th>
                                    <th>Status</th>
                                    <th>Tujuan</th>
                                    @if(auth()->user()->role=='admin')
                                    <th><i class="icon_cogs"></i> Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; ?>
                                @foreach($supir as $supir)
                                <?php $no++; ?>
                                <tr>
                                    <td>{{$no}}</td>
                                    <td><a href="{{ url('/supir/'.$supir->id.'/detail') }}">{{$supir->nama_supir}}</a></td>
                                    <td>{{$supir->mobil}}</td>
                                    <td>{{$supir->tanggal}}</td>
                                    <td>{{$supir->alamat}}</>
                                    <td>{{$supir->jenis_kelamin}}</td>
                                    <td>{{$supir->no_hp}}</td>
                                    <td>{{$supir->status}}</td>
                                    <td>{{$supir->jadwal->tujuan}}</td>
                                    @if(auth()->user()->role=='admin')
                                    <td>
                                        <a href="{{ url('/supir/'.$supir->id.'/detail') }}"><button type="button" class="btn btn-success btn-xs"><i class="fa fa-user"></i> Detail</button></a>
                                        <a href="{{ url('/supir/'.$supir->id.'/delete') }}"> <button type="button" class="btn btn-danger btn-xs" onclick="return confirm('Apakah Akan Anda Hapus?')">Hapus</button></a>
                                        <a href="{{ url('/supir/'.$supir->id.'/edit') }}"><button type="button" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</button></a>
                                    </td>
                                    @endif
                                </tr>
                                @endforeach
                            </tbody>
                        </div>
                    </table>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data supir</h5>
                            </div>
                            <div class="modal-body">
                                <form action="{{url('supir/create')}}" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group {{$errors->has('nama_supir') ? 'has-error' :''}}">
                                            <label for="exampleFormControlInput1">Nama</label>
                                            <input name="nama_supir" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nama" value="{{old('nama_supir')}}">
                                            @if($errors->has('nama_supir'))
                                            <span class="help-block">{{$errors->first('nama_supir')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group {{$errors->has('mobil') ? 'has-error' :''}}">
                                            <label for="exampleFormControlInput1">Mobil</label>
                                            <input name="mobil" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Mobil" value="{{old('mobil')}}">
                                            @if($errors->has('mobil'))
                                            <span class="help-block">{{$errors->first('mobil')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group {{$errors->has('tanggal') ? 'has-error' :''}}">
                                            <label for="exampleFormControlInput1">Tanggal</label>
                                            <input name="tanggal" type="date" class="form-control" id="exampleFormControlInput1" placeholder="tanggal" value="{{old('tanggal')}}">
                                            @if($errors->has('tanggal'))
                                            <span class="help-block">{{$errors->first('tanggal')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group {{$errors->has('no_hp') ? 'has-error' :''}}">
                                            <label for="exampleFormControlInput1">Nomor Hp</label>
                                            <input name="no_hp" type="text" class="form-control" id="exampleFormControlInput1" placeholder="Nomor Hp" value="{{old('no_hp')}}">
                                            @if($errors->has('no_hp'))
                                            <span class="help-block">{{$errors->first('no_hp')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group {{$errors->has('email') ? 'has-error' :''}}">
                                            <label for="exampleFormControlInput1">Email</label>
                                            <input name="email" type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" value="{{old('email')}}">
                                            @if($errors->has('email'))
                                            <span class="help-block">{{$errors->first('email')}}</span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-group {{$errors->has('alamat') ? 'has-error' :''}}">
                                            <label for="exampleFormControlTextarea1">Alamat</label>
                                            <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="3">{{old('alamat')}}</textarea>
                                            @if($errors->has('alamat'))
                                            <span class="help-block">{{$errors->first('alamat')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group {{$errors->has('jenis_kelamin') ? 'has-error' :''}}">
                                            <label for="exampleFormControlSelect1">Pilih Jenis Kelamin</label>
                                            <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                                                <option value="">-Pilih-</option>
                                                <option value="L" {{(old('jenis_kelamin') == 'L')? 'selected':''}}>Laki-Laki</option>
                                                <option value="P" {{(old('jenis_kelamin') == 'P')? 'selected':''}}>Perempuan</option>
                                            </select>
                                            @if($errors->has('jenis_kelamin'))
                                            <span class=" help-block">{{$errors->first('jenis_kelamin')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group {{$errors->has('status') ? 'has-error' :''}}">
                                            <label for="exampleFormControlSelect1">Pilih Status</label>
                                            <select name="status" class="form-control" id="exampleFormControlSelect1">
                                                <option value="">-Pilih-</option>
                                                <option value="N" {{(old('status') == 'N')? 'selected':''}}>Nikah</option>
                                                <option value="B" {{(old('status') == 'B')? 'selected':''}}>Belum Nikah</option>
                                            </select>
                                            @if($errors->has('status'))
                                            <span class="help-block">{{$errors->first('status')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group {{$errors->has('id_jadwal') ? 'has-error' :''}}">
                                            <label for="id_jadwal">Tujuan</label>
                                            <select name="id_jadwal" class="form-control" id="id_jadwal" require>
                                                <option value="">-Pilih-</option>
                                                @foreach($jadwal as $jadwal)
                                                <option value="{{$jadwal->id}}">{{$jadwal->kode}}/{{$jadwal->tujuan}}</option>
                                                @endforeach
                                            </select>
                                            @if($errors->has('id_jadwal'))
                                            <span class="help-block">{{$errors->first('id_jadwal')}}</span>
                                            @endif
                                        </div>
                                        <div class="form-group {{$errors->has('avatar') ? 'has-error' :''}}">
                                            <label for=" exampleInputFile">Avatar</label>
                                            <input type="file" name="avatar" class="form-control">
                                            <p class="help-block"></p>
                                            @if($errors->has('avatar'))
                                            <span class="help-block">{{$errors->first('avatar')}}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
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