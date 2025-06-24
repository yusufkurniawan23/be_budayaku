<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Seniman extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'senimans';
    protected $fillable = ['nama', 'alamat', 'judul', 'nomor', 'deskripsi'];

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('foto')
            ->singleFile()
            ->acceptsMimeTypes(['image/jpg', 'image/png', 'image/jpeg', 'image/webp']);
    }
}
