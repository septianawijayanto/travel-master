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
                    <a href="{{url('/jadwal/export')}}" class="btn btn-primary float-right btn-sm">Export</a>
                    @endif
                </p>
            </div>
            <div class="box-body">



                <div class="table-responsove">
                    <table class="table table-hover myTable">
                        <div class="col-lg-12 col-sm-12">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Jadwal</th>
                                    <!-- <th>Bangku</th>-->
                                    <th>Jam</th>
                                    <th>Tujuan</th>
                                    <th>Biaya</th>
                                    @if(auth()->user()->role=='admin')
                                    <th><i class="icon_cogs"></i> Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0; ?>
                                @foreach($jadwal as $jadwal)
                                <?php $no++; ?>
                                <tr>
                                    <th>{{$no}}</th>
                                    <th>{{$jadwal->kode}}</th>
                                    <!-- <th>{{$jadwal->kursi}}</th>-->
                                    <th>{{$jadwal->jam}}</th>
                                    <th>{{$jadwal->tujuan}}</th>
                                    <th>{{$jadwal->biaya}}</th>
                                    @if(auth()->user()->role=='admin')
                                    <td>

                                        <a href="{{ url('/jadwal/'.$jadwal->id.'/delete') }}"> <button type="button" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Akan Anda Hapus?')">Hapus</button></a>
                                        <a href="{{ url('/jadwal/'.$jadwal->id).'/edit' }}"><button type="button" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</button></a>
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
                                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Jadwal</h5>
                            </div>
                            <div class="modal-body">
                                <form action="{{url('/jadwal/create')}}" method="POST" enctype="multipart/form-data">
                                    {{csrf_field()}}
                                    <div class="form-group {{$errors->has('kode') ? 'has-error' :''}}">
                                        <label for="exampleFormControlInput1">Kode Jadwal</label>
                                        <input name="kode" type="text" class="form-control" id="exampleInputEmail1" placeholder="Input KJ-" value="{{old('kode')}}">
                                        @if($errors->has('kode'))
                                        <span class="help-block">{{$errors->first('kode')}}</span>
                                        @endif
                                    </div>
                                    <!--  <div class="form-group {{$errors->has('kursi') ? 'has-error' :''}}">
                                        <label for="exampleFormControlInput1">Kursi</label>
                                        <input name="kursi" type="text" class="form-control" id="exampleInputEmail1" placeholder="Kursi" value="{{old('kursi')}}">
                                        @if($errors->has('kursi'))
                                        <span class="help-block">{{$errors->first('kursi')}}</span>
                                        @endif
                                    </div>-->
                                    <div class="form-group {{$errors->has('jam') ? 'has-error' :''}}">
                                        <label for="exampleFormControlInput1">Jam</label>
                                        <input name="jam" type="time" class="form-control" id="exampleFormControlInput1" placeholder="Jam" value="{{old('jam')}}">
                                        @if($errors->has('jam'))
                                        <span class="help-block">{{$errors->first('jam')}}</span>
                                        @endif
                                    </div>
                                    <div class="form-group {{$errors->has('tujuan') ? 'has-error' :''}}">
                                        <label for="exampleFormControlInput1">Tujuan</label>
                                        <input name="tujuan" type="text" class="form-control" id="exampleInputEmail1" placeholder="Tujuan" value="{{old('tujuan')}}">
                                        @if($errors->has('tujuan'))
                                        <span class="help-block">{{$errors->first('tujuan')}}</span>
                                        @endif
                                    </div>
                                    <div class="form-group {{$errors->has('biaya') ? 'has-error' :''}}">
                                        <label for="exampleFormControlInput1">Biaya</label>
                                        <input name="biaya" type="text" class="form-control" id="exampleInputEmail1" placeholder="Biaya" value="{{old('biaya')}}">
                                        @if($errors->has('biaya'))
                                        <span class="help-block">{{$errors->first('biaya')}}</span>
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