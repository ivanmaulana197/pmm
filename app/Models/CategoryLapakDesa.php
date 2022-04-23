<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class CategoryLapakDesa extends Model
{
    use HasFactory, Sluggable;
    protected $guarded = ['id'];

    public function lapakDesa()
    {
        return $this->hasMany(LapakDesa::class,'foreign_key');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'namaCategory'
            ]
        ];
    }
}
