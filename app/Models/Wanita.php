<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wanita extends Model
{
    static $rules = [
    ];
    
    use HasFactory;
    
    Protected $table = 'wanita';
    // Apa saja yang boleh diisi
    protected $fillable = [
        'id',
        'nama',
        'gambar',
        'pesan',
        'facebook',
        'instagram',
        'twitter',
    ];

    public function user()
    {    
        return $this->belongsTo('App\Models\User', 'created_by', 'id');
    }
    // Protected $primaryKey = 'id';


    //apa saja yang tidak boleh diisi
    // protected $guarded = ['id'];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */

}
