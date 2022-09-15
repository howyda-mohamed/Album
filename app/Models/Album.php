<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $table="albums";
    protected $fillable = [
        'name',
        'user_id',
        'avatar',
        'created_at',
        'updated_at',
    ];
    public function scopeSelection($query)
    {
        return $query->select('id','name','avatar','user_id');
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function image()
    {
        return $this->hasMany(Image::class,'album_id','id');
    }
}
