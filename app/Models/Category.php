<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
//    protected $table='category_list';
    protected $guarded=[];
//protected $fillable=['name','description'];
}