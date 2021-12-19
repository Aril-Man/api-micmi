<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;
    protected $primarykey = 'id';
    protected $table = 'tbl_episode';
    protected $fillable = [
        'show_id',
        'title_episode',
        'link'
    ];
}
