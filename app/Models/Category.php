<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function aPost(){
        return $this->hasMany(Post::class)->orderBy('id','desc')->where('is_home',1);
       }
       public function sCat(){
        return $this->hasMany(SubCategory::class)->orderBy('id','desc');
       }
       public function cPost(){
        return $this->hasMany(Post::class)->orderBy('id','desc');
       }
       public function ssCat(){
        return $this->hasMany(SubCategory::class)->where('show_on_menu','show')->orderBy('sub_category_order','asc');
       }
}
