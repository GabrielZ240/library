<?php

namespace App\Models;

use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use SoftDeletes;

    /* name*
    author*
    category*
    published date*
    user (person that borrowed a book)*/
    protected $fillable = ['name','published_date','status'];
    use HasFactory;

    public function category()
    {
        return $this->belongsToMany(Category::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }
}
