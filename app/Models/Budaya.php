<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Budaya extends Model
{
    use HasFactory;

    protected $table = 'budayas';
    protected $fillable = [
        'category_id', // Sesuaikan dengan foreign key
        'tanggal',
        'foto',
        'deskripsi',
        'nama_objek' // Sesuaikan dengan nama kolom baru
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
