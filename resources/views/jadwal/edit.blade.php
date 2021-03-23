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
                <div class="col-lg-12">
                    <form action="{{ url('/jadwal/'.$jadwal->id.'/update') }}" method="POST">
                        {{csrf_field()}}
                        <div class="form-group {{$errors->has('kode') ? 'has-error' :''}}">
                            <label for="exampleFormControlInput1">Kode Jadwal</label>
                            <input name="kode" type="text" class="form-control" id="exampleInputEmail1" placeholder="Input KJ-" value="{{$jadwal->kode}}">
                            @if($errors->has('kode'))
                            <span class="help-block">{{$errors->first('kode')}}</span>
                            @endif
                        </div>
                        <!-- <div class="form-group {{$errors->has('kursi') ? 'has-error' :''}}">
                            <label for="exampleFormControlInput1">Kursi</label>
                            <input name="kursi" type="text" class="form-control" id="exampleInputEmail1" placeholder="Kursi" value="{{$jadwal->kursi}}">
                            @if($errors->has('kursi'))
                            <span class="help-block">{{$errors->first('kursi')}}</span>
                            @endif
                        </div>-->
                        <div class="form-group {{$errors->has('jam') ? 'has-error' :''}}">
                            <label for="exampleFormControlInput1">Jam</label>
                            <input name="jam" type="time" class="form-control" id="exampleFormControlInput1" placeholder="Jam" value="{{$jadwal->jam}}">
                            @if($errors->has('jam'))
                            <span class="help-block">{{$errors->first('jam')}}</span>
                            @endif
                        </div>
                        <div class="form-group {{$errors->has('tujuan') ? 'has-error' :''}}">
                            <label for="exampleFormControlInput1">Tujuan</label>
                            <input name="tujuan" type="text" class="form-control" id="exampleInputEmail1" placeholder="Tujuan" value="{{$jadwal->tujuan}}">
                            @if($errors->has('tujuan'))
                            <span class="help-block">{{$errors->first('tujuan')}}</span>
                            @endif
                        </div>
                        <div class="form-group {{$errors->has('biaya') ? 'has-error' :''}}">
                            <label for="exampleFormControlInput1">Biaya</label>
                            <input name="biaya" type="text" class="form-control" id="exampleInputEmail1" placeholder="Biaya" value="{{$jadwal->biaya}}">
                            @if($errors->has('biaya'))
                            <span class="help-block">{{$errors->first('biaya')}}</span>
                            @endif
                        </div>
                        <div class="modal-footer">
                            <a href="{{url('/jadwal')}}" type="submit" class="btn btn-success">Back</a>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
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