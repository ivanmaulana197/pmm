<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LapakDesa extends Model
{
    use HasFactory, Sluggable;
    protected $guarded = ['id'];

    public function category(){
        return $this->belongsTo(CategoryLapakDesa::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'namaLapak'
            ]
        ];
    }
}
