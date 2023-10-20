<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
        // store data in database through create
        protected $guarded = [];

            // show parent category through cheild category
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function ProductDetail(){
        return $this->hasOne(ProductDetail::class);

    }


}
