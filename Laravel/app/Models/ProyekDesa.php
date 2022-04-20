<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class ProyekDesa extends Model
{
    use HasFactory, Sluggable;
    protected $guarded = ['id'];  
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'namaKegiatan'
            ]
        ];
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
