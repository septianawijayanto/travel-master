@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <p>

                    <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                    <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#exampleModalLong"><i class="fa fa-plus-square"></i>
                        Tambah Data
                    </button>
                    <a href="{{url('/mobil/export')}}" class="btn btn-primary float-right btn-sm">Export</a>
                </p>
            </div>
            <div class="box-body">
                <div class="table-responsove">
                    <table class="table table-hover myTable">
                        <div class="col-lg-12 col-sm-12">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Mobil</th>
                                    <th>Merk</th>
                                    <th>No. Polisi</th>
                                    <th>Tahun</th>
                                    <th>Jumlah Kursi</th>
                                    <th>Bangku</th>
                                    @if(auth()->user()->role=='admin')
                                    <th><i class="icon_cogs"></i> Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; ?>
                                @foreach($mobil as $mobil)
                                <?php $no++; ?>
                                <tr>
                                    <th>{{$no}}</th>
                                    <th>{{$mobil->kd_mobil}}</th>
                                    <th>{{$mobil->merk}}</th>
                                    <th>{{$mobil->no_pol}}</th>
                                    <th>{{$mobil->tahun}}</th>
                                    <th>{{$mobil->jml_kursi}}</th>
                                    <th>{{$mobil->bangku}}</th>
                                    @if(auth()->user()->role=='admin')
                                    <td>

                                        <a href="{{ url('/mobil/'.$mobil->id.'/delete') }}"> <button type="button" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Akan Anda Hapus?')">Hapus</button></a>
                                        <a href="{{ url('/mobil/'.$mobil->id.'/edit') }}"><button type="button" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</button></a>
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
                                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Mobil</h5>
                            </div>
                            <div class="modal-body">
                                <form action="{{url('/mobil/create')}}" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="form-group {{$errors->has('kd_mobil') ? 'has-error' :''}}">
                                        <label for="exampleFormControlInput1">Kode Mobil</label>
                                        <input name="kd_mobil" type="text" class="form-control" id="exampleInputEmail1" placeholder="Input KM--" value="{{old('kd_mobil')}}">
                                        @if($errors->has('kd_mobil'))
                                        <span class="help-block">{{$errors->first('kd_mobil')}}</span>
                                        @endif
                                    </div>
                                    <div class="form-group {{$errors->has('merk') ? 'has-error' :''}}">
                                        <label for="exampleFormControlInput1">Merk</label>
                                        <input name="merk" type="text" class="form-control" id="exampleInputEmail1" placeholder="Merk" value="{{old('merk')}}">
                                        @if($errors->has('merk'))
                                        <span class="help-block">{{$errors->first('merk')}}</span>
                                        @endif
                                    </div>
                                    <div class="form-group {{$errors->has('no_pol') ? 'has-error' :''}}">
                                        <label for="exampleFormControlInput1">No Polisi</label>
                                        <input name="no_pol" type="text" class="form-control" id="exampleFormControlInput1" placeholder="No Polisi" value="{{old('no_pol')}}">
                                        @if($errors->has('no_pol'))
                                        <span class="help-block">{{$errors->first('no_pol')}}</span>
                                        @endif
                                    </div>
                                    <div class="form-group {{$errors->has('tahun') ? 'has-error' :''}}">
                                        <label for="exampleFormControlInput1">Tahun</label>
                                        <input name="tahun" type="text" class="form-control" id="exampleInputEmail1" placeholder="Tahun" value="{{old('tahun')}}">
                                        @if($errors->has('tahun'))
                                        <span class="help-block">{{$errors->first('tahun')}}</span>
                                        @endif
                                    </div>
                                    <div class="form-group {{$errors->has('jml_kursi') ? 'has-error' :''}}">
                                        <label for="exampleFormControlInput1">Jumlah Kursi</label>
                                        <input name="jml_kursi" type="text" class="form-control" id="exampleInputEmail1" placeholder="Jumlah Kursi" value="{{old('jml_kursi')}}">
                                        @if($errors->has('jml_kursi'))
                                        <span class="help-block">{{$errors->first('jml_kursi')}}</span>
                                        @endif
                                    </div>
                                    <div class="form-group {{$errors->has('bangku') ? 'has-error' :''}}">
                                        <label for="exampleFormControlInput1">Bangku</label>
                                        <input name="bangku" type="text" class="form-control" id="exampleInputEmail1" placeholder="Bangku" value="{{old('bangku')}}">
                                        @if($errors->has('bangku'))
                                        <span class="help-block">{{$errors->first('bangku')}}</span>
                                        @endif
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