<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;

class SubCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'main_category_id'];

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function mainCategory()
    {
        return $this->belongsTo(MainCategory::class);
    }
}
