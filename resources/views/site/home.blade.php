@extends('layouts.front')
@section('title','Home | Kerinci Mulya Travel')
@section('konten')
<div class="section-title">
    <h2>Home</h2>
</div>


<h1 class="heading mb-4" data-aos="fade-up">Jadwal Travel</h1>
<section class="panel">
    <table class="table table-hover">
        <div class="col-lg-12 col-sm-12">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jam</th>
                    <th>Tujuan</th>
                    <th>Tarif</th>

                </tr>
            </thead>
            <tbody>
                <?php $no = 0; ?>
                @foreach($jadwal as $jadwal)
                <?php $no++; ?>
                <tr>
                    <th>{{$no}}</th>
                    <th>{{$jadwal->jam}}</th>
                    <th>{{$jadwal->tujuan}}</th>
                    <th>{{$jadwal->biaya}}</th>

                </tr>
                @endforeach
            </tbody>
        </div>
    </table>
</section>
</div>


@endsection