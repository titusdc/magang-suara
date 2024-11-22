<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table = "products";

    /**
     * fillable
     * 
     * @var array
     */
    
    protected $fillable = [
        'image',
        'title',
        'description',
        'price',
        'stock',
        'category_id',
        'type_id'
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
