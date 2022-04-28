<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'sub_category_id',
        'images',
        'price',
        'stock',
    ];

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class);
    }

    public function mainCategory()
    {
        return $this->belongsTo(MainCategory::class);
    }
}
