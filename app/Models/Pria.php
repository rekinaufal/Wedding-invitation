<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pria extends Model
{
    static $rules = [
    ];
    
    use HasFactory;
    
    Protected $table = 'pria';
    // Apa saja yang boleh diisi
    protected $fillable = [
        'id',
        'nama',
        'gambar',
        'pesan',
        'facebook',
        'instagram',
        'twitter',
        'created_by',
        'updated_by',
    ];

    public function user()
    {    
        return $this->belongsTo('App\Models\User', 'created_by', 'id');
    }
    // Protected $primaryKey = 'id';


    //apa saja yang tidak boleh diisi
    // protected $guarded = ['id'];

}
