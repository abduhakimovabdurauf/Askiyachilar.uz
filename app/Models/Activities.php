<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
    protected $fillable = [
        'year',
        'description_uz',
        'description_ru',
        'description_en',
        'humorist_id',
    ];

    public function humorist()
    {
        return $this->belongsTo(Humorists::class);
    }
}
