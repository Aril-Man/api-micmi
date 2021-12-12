<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    use HasFactory;

    protected $table = 'tbl_film';
    protected $fillable = [
        'slug',
        'title',
        'sinopsis',
        'genre',
        'image',
        'score'
    ];
}