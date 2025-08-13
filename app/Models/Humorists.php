<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Humorists extends Model
{
    protected $fillable = [
        'name_uz',
        'name_ru',
        'name_en',
        'description_uz',
        'description_ru',
        'description_en',
        'job_uz',
        'job_ru',
        'job_en',
        'image',
    ];
    protected $casts = [
        'name_uz' => 'string',
        'name_ru' => 'string',
        'name_en' => 'string',
        'description_uz' => 'string',
        'description_ru' => 'string',
        'description_en' => 'string',
        'job_uz' => 'string',
        'job_ru' => 'string',
        'job_en' => 'string',
    ];
    protected $guarded = [];

    public function activities()
    {
        return $this->hasMany(Activities::class, 'humorist_id');
    }
    
}
