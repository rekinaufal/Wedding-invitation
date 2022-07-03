<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    Protected $table = 'posts';
    protected $fillable = ['title','user_id', 'excerpt','body','published_at'];

    public function category(){
        return $this->belongsTo('App\Models\Category', 'category_id', 'id');
    }

    public function user()
    {    
        return $this->belongsTo('App\Models\User', 'user_id', 'id');
    }
}
