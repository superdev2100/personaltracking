<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class MainCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    protected $casts = [

    ];

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class);
    }

    public function subCategories(): HasMany
    {
        return $this->hasMany(SubCategory::class);
    }
}
