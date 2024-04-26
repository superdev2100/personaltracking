<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tracker extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 'sub_category_id', 'main_category_id', 'amount', 'notes', 'created_by',
    ];

    protected $casts = [

    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function subCategory(): BelongsTo
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    public function mainCategory(): BelongsTo
    {
        return $this->belongsTo(MainCategory::class, 'main_category_id');
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

}
