<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Budaya extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $table = 'budayas';
    protected $fillable = [
        'category_id',
        'nama_objek',
        'tanggal',
        'deskripsi',
    ];

    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('foto')
            ->acceptsMimeTypes(['image/jpg', 'image/png', 'image/jpeg', 'image/webp'])
            ->singleFile();
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(400)
            ->height(225)
            ->sharpen(10);
    }
}