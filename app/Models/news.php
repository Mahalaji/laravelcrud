<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    use HasFactory;
    protected $table = 'news';
    public $timestamps = false;
    function categories(){
        return $this->hasOne('App\Models\newscategory','id','news_title_category');
    }
}
