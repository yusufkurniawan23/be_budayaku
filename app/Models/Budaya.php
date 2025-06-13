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
        'tanggal',
        'deskripsi',
        'nama_objek'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(200)
            ->height(200)
            ->sharpen(10);
            
        $this->addMediaConversion('preview')
            ->width(800)
            ->height(450);
            
        $this->addMediaConversion('large')
            ->width(1200)
            ->height(675);
    }
    
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('foto')
            ->singleFile()
            ->acceptsMimeTypes(['image/jpeg', 'image/png', 'image/webp']);
    }
}