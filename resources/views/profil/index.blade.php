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


                <div class="box-body box-profile">

                    <ul class="list-group list-group-unbordered">
                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Nama</b> <a class="pull-right">{{\Auth::user()->name}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Email</b> <a class="pull-right">{{\Auth::user()->email}}</a>
                            </li>

                        </ul>
                    </ul>
                    <a href="{{url('/beranda')}}" type="submit" class="btn btn-success">Back</a>


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