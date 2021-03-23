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
                <form action="{{ url('/mobil/'.$mobil->id.'/update') }}" method="POST">
                    {{csrf_field()}}
                    <div class="form-group {{$errors->has('kd_mobil') ? 'has-error' :''}}">
                        <label for="exampleFormControlInput1">Kode Mobil</label>
                        <input name="kd_mobil" type="text" class="form-control" id="exampleInputEmail1" placeholder="Input KM--" value="{{$mobil->kd_mobil}}">
                        @if($errors->has('kd_mobil'))
                        <span class="help-block">{{$errors->first('kd_mobil')}}</span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('merk') ? 'has-error' :''}}">
                        <label for="exampleFormControlInput1">Merk</label>
                        <input name="merk" type="text" class="form-control" id="exampleInputEmail1" placeholder="Merk" value="{{$mobil->merk}}">
                        @if($errors->has('merk'))
                        <span class="help-block">{{$errors->first('merk')}}</span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('no_pol') ? 'has-error' :''}}">
                        <label for="exampleFormControlInput1">No Polisi</label>
                        <input name="no_pol" type="text" class="form-control" id="exampleFormControlInput1" placeholder="No Polisi" value="{{$mobil->no_pol}}">
                        @if($errors->has('no_pol'))
                        <span class="help-block">{{$errors->first('no_pol')}}</span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('tahun') ? 'has-error' :''}}">
                        <label for="exampleFormControlInput1">Tahun</label>
                        <input name="tahun" type="text" class="form-control" id="exampleInputEmail1" placeholder="Tahun" value="{{$mobil->tahun}}">
                        @if($errors->has('tahun'))
                        <span class="help-block">{{$errors->first('tahun')}}</span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('jml_kursi') ? 'has-error' :''}}">
                        <label for="exampleFormControlInput1">Jumlah Kursi</label>
                        <input name="jml_kursi" type="text" class="form-control" id="exampleInputEmail1" placeholder="Jumlah Kursi" value="{{$mobil->jml_kursi}}">
                        @if($errors->has('jml_kursi'))
                        <span class="help-block">{{$errors->first('jml_kursi')}}</span>
                        @endif
                    </div>
                    <div class="form-group {{$errors->has('bangku') ? 'has-error' :''}}">
                        <label for="exampleFormControlInput1">Bangku</label>
                        <input name="bangku" type="text" class="form-control" id="exampleInputEmail1" placeholder="Bangku" value="{{$mobil->bangku}}">
                        @if($errors->has('bangku'))
                        <span class="help-block">{{$errors->first('bangku')}}</span>
                        @endif
                    </div>
                    <div class="modal-footer">
                        <a href="{{url('/mobil')}}" type="submit" class="btn btn-success">Back</a>
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