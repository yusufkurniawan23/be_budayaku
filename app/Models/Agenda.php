<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $table = 'agendas'; // Sesuaikan dengan nama tabel sebenarnya di database
    protected $fillable = ['judul', 'lokasi', 'tanggal_mulai', 'tanggal_selesai', 'deskripsi'];
}
