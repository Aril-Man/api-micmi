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

    function get_slug($slug)
    {
        $data = Show::where('slug', $slug)->first();
        return $data;
    }

    public function get_id($id)
    {
        $data = Show::where('id', $id)->first();
        return $data;
    }
}