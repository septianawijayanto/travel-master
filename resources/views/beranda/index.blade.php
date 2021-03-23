@extends('layouts.master')

@section('content')

<div class="row">
    <div class="col-md-12">
        <h4>{{ $title }}</h4>
        <div class="box box-warning">
            <div class="box-header">
                <div class="col-md-6">
                    <p>
                        <button class="btn btn-sm btn-flat btn-warning btn-refresh"><i class="fa fa-refresh"></i> Refresh</button>
                        @if(auth()->user()->role=='pemesan')


                        <!--  @if ($cek2 ===0)

                        <a href="#" class="btn btn-sm btn-flat  btn-success disabled"><i class="fa fa-print"> </i> Cetak Tiket</a>
                        @else
                        <a href="{{ url('/cetak-tiket') }}" class="btn btn-sm btn-flat  btn-success"><i class="fa fa-print"></i> Cetak Tiket</a>
                        @endif
                        -->

                        @endif
                    </p>
                </div>
                <div class="col-md-6">
                    @if(auth()->user()->role=='pemesan')
                    <h4>{{$pesan}}</h4>
                    @endif
                </div>
            </div>
            <hr widht="50%" size="10" color="Black">

            <marquee scrolldelay="70" title="Ini Muncul Saat Hover">Selamat Datang {{auth()->user()->name}} Di Website Cv. Po. Kerinci Mulya Travel</marquee>

            <hr widht="50%" size="10" color="Black">

            <Center>
                <img src="{{asset('cerousel/1.jpeg')}}" class="d-block w-100" alt="...">

            </Center>

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