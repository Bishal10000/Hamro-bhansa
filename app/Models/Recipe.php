<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'category',
        'description',
        'prep_time',
        'cook_time',
        'total_time',
        'servings',
        'difficulty',
        'calories',
        'ingredients',
        'instructions',
        'tips',
        'emoji',
        'featured',
    ];

    protected function casts(): array
    {
        return [
            'ingredients' => 'array',
            'instructions' => 'array',
            'tips' => 'array',
            'featured' => 'boolean',
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
