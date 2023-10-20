<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    // store data in database through create
    protected $guarded = [];

    // show parent category through cheild category
    public function parent(){
        return $this->belongsTo(Category::class,'category_id');
    }
}
