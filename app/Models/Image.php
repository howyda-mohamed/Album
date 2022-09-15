<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $table="images";
    protected $fillable = [
        'name',
        'album_id',
        'created_at',
        'updated_at',
    ];
    public function scopeSelection($query)
    {
        return $query->select('id','name','album_id');
    }
    public function album(){
        return $this->belongsTo(Album::class);
    }
}
