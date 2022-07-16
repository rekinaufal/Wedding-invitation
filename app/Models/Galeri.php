<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Galeri extends Model implements HasMedia
{
    static $rules = [
    ];
    
    use HasFactory;
    use InteractsWithMedia;
    
    Protected $table = 'galeri';
    // Apa saja yang boleh diisi
    protected $fillable = [
        'id_kategori',
        'gambar',
    ];

    public function user()
    {    
        return $this->belongsTo('App\Models\User', 'created_by', 'id');
    }

    public function kategori()
    {    
        return $this->belongsTo('App\Models\Kategori', 'kategori_id', 'id');
    }

    public function photos()
    {
        return $this->morphMany(Media::class, 'model');
    }
    // Protected $primaryKey = 'id';


    //apa saja yang tidak boleh diisi
    // protected $guarded = ['id'];

}
