<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Show extends Model
{
    use HasFactory;
    protected $primarykey = 'id';
    protected $table = 'tbl_show';
    protected $fillable = [
        'title',
        'slug',
        'score',
        'genre_id',
        'image'
    ];
}
