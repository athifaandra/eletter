<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip',
        'nomor_surat',
        'tanggal_surat',
        'perihal',
        'tanggal_mulai',
        'tanggal_selesai',
        'ringkasan',
        'alamat',
        'status'
    ];

    protected $table = 'pengajuan';

    protected $casts = [
        'tanggal_surat' => 'datetime',
        'tanggal_mulai' => 'date',
        'tanggal_selesai' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'nip', 'nip');
    }
}
