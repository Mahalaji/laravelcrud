<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Login extends Model
{
    use HasFactory;
    protected $fillable = ['password']; 
    protected $table = 'users'; 
    public $timestamps = false;
}
