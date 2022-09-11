<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public function subCategory(){
        return $this->belongsTo(SubCategory::class,'sub_category_id');
       }

       public function mCategory(){
        return $this->belongsTo(Category::class,'category_id');
       }

}
