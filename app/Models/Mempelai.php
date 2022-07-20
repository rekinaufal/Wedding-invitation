<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mempelai extends Model
{
    static $rules = [
    ];
    
    use  HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // Apa saja yang boleh diisi
    // protected $fillable = [
    //     'name',
    //     'username',
    //     'email',
    //     'password',
    // ];

    //Protected $primaryKey = 'email';

    Protected $table = 'mempelai';

    //apa saja yang tidak boleh diisi
    protected $guarded = ['id'];

    public function user()
    {    
        return $this->belongsTo('App\Models\User', 'created_by', 'id');
    }

    public function kategori()
    {    
        return $this->belongsTo('App\Models\Kategori', 'kategori_id', 'id');
    }
    
    public function tempatacara()
    {    
        return $this->belongsTo('App\Models\TempatAcara', 'tempatacara_id', 'id');
    }
    
    public function galeri()
    {    
        return $this->belongsTo('App\Models\Galeri', 'galeri_id', 'id');
    }
    
    public function pria()
    {    
        return $this->belongsTo('App\Models\Pria', 'pria_id', 'id');
    }
    
    public function wanita()
    {    
        return $this->belongsTo('App\Models\Wanita', 'wanita_id', 'id');
    }

    public function posts(){
        return $this->hasMany(Post::class);
    }
}
