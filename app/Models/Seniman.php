<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Seniman extends Model
{
    protected $table = 'senimans'; // Sesuaikan dengan nama tabel sebenarnya di database
    protected $fillable = ['user_id', 'nama', 'alamat', 'judul', 'foto', 'nomor', 'deskripsi'];
}

    // // Relasi dengan User (jika ada)
    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }
