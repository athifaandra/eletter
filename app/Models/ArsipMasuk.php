<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArsipMasuk extends Model
{
    use HasFactory;

    protected $table = 'arsipmasuk';

    protected $fillable = [
        'nomor_surat',
        'pengirim',
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
