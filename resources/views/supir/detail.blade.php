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
                <div class="col-lg-6">
                    <h3 class="page-header">
                        Profil
                    </h3>
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="{{$supir->getAvatar()}}" alt="User profile picture">

                        <h3 class="profile-username text-center">{{$supir->nama_supir}}</h3>


                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Nama</b> <a class="pull-right">{{$supir->nama_supir}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>No Hp</b> <a class="pull-right">{{$supir->no_hp}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Jenis Kelamin</b> <a class="pull-right">{{$supir->jenis_kelamin}}</a>
                            </li>
                            <li class="list-group-item">
                                <b>Status</b> <a class="pull-right">{{$supir->status}}</a>
                            </li>
                        </ul>

                        <a href="{{ url('/supir/') }}" class="btn btn-success btn-block"><b>Back</b></a>
                    </div>

                </div>
                <div class="col-lg-6">

                    <h3 class="page-header">
                        Jadwal
                    </h3>
                    <section class="panel">

                        <section class="panel">
                            <table class="table table-hover">
                                <div class="col-lg-12 col-sm-12">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Mobil</th>
                                            <th>Jam</th>
                                            <th>Tujuan</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 0; ?>

                                        <?php $no++; ?>
                                        <tr>
                                            <th>{{$no}}</th>
                                            <th>{{$supir->mobil}}</th>
                                            <th>{{$supir->jadwal->jam}}</th>
                                            <th>{{$supir->jadwal->tujuan}}</th>

                                        </tr>

                                    </tbody>



                                </div>
                            </table>
                        </section>
                    </section>
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