<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Programms extends Model
{
    protected $fillable = [
        'title_uz',
        'title_ru',
        'title_en',
        'description_uz',
        'description_ru',
        'description_en',
        'from',
        'to',
        'image',
    ];
    protected $casts = [
        'title_uz' => 'string',
        'title_ru' => 'string',
        'title_en' => 'string',
        'description_uz' => 'string',
        'description_ru' => 'string',
        'description_en' => 'string',
        'from' => 'datetime',
        'to' => 'datetime',
    ];
    protected $guarded = [];
}
