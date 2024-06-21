<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArsipKeluar extends Model
{
    use HasFactory;

    protected $table = 'arsipkeluar';

    protected $fillable = [
        'nomor_surat',
        'penerima',
        "nomor_agenda",
        'tanggal_agenda',
        'tanggal_surat',
        'ringkasan',
        'lampiran',
    ];

    protected $dates = [
        'tanggal_agenda', 'tanggal_surat'
    ];
}
