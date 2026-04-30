<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    // protected $fillable = [
    //     'title',
    //     'description',
    //     'price'
    // ];
    protected $guarded = [];


    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function orders():BelongsToMany
    {
        return $this->belongsToMany(Order::class,'order_products')
        ->withPivot('count');
    }
}
