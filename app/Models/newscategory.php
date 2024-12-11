<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class newscategory extends Model
{
    use HasFactory;
    protected $table = 'newscategory';
    public $timestamps = false;
    public function news()
    {
        return $this->hasMany('App\Models\news', 'news_title_category', 'id');
    }
}
