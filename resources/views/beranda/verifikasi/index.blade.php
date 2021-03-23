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

                <form role="form" method="post" action="{{ url('verifikasi/'.Auth::user()->id) }}">
                    @csrf
                    <div class="box-body">
                        <div class="form-group {{$errors->has('id_pemesanan') ? 'has-error' :''}}">
                            <label for="exampleInputEmail1">ID Pemesanan</label>
                            <input type="text" name="id_pemesanan" class="form-control" id="exampleInputEmail1" placeholder="Masukkan ID Pemesanan">
                            @if($errors->has('id_pemesanan'))
                            <span class="help-block">{{$errors->first('id_pemesanan')}}</span>
                            @endif
                        </div>

                    </div>
                    <!-- /.box-body -->

                    <div class="box-footer">

                        <a href="{{url('/pemesanan/'.Auth::user()->id.'/data')}}" class="btn btn-success">Back</a>

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

    })
</script>

@endsection