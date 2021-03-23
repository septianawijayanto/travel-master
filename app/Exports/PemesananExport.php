<?php

namespace App\Exports;

use App\Pemesanan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PemesananExport implements FromCollection,  WithMapping, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Pemesanan::all();
    }
    public function map($pemesanan): array
    {
        return [
            $pemesanan->id_pemesanan,
            $pemesanan->nama,
            $pemesanan->jumlah_penumpang,
            $pemesanan->alamat,
            $pemesanan->almt_jmpt,
            $pemesanan->jenis_kelamin,
            $pemesanan->no_hp,
            $pemesanan->tanggal_pesan,
            $pemesanan->jadwal->tujuan,
            $pemesanan->jumlah_penumpang * $pemesanan->jadwal->biaya,
            $pemesanan->is_verifikasi==1 ? 'Lunas': 'Belum',
        ];
    }
    public function headings(): array
    {
        return [
            'Id Pemesanan',
            'Nama Lengkap',
            'Jumlah Penumpang',
            'Alamat',
            'Alamat Penjemputan',
            'Jenis Kelamin',
            'No Hp',
            'Tanggal Pesan',
            'Tujuan',
            'Total Ongkos',
            'Status'
        ];
    }
}
