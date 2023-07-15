<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'image', 'image1', 'image2', 'content', 'artcat_id'];
    protected $table = 'article_categories';

    public function articleCategory()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function bookmarks()
    {
        return $this->belongsToMany(Bookmark::class, 'bookmarks');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'bookmarks');
    }

    public function bookmarkedBy()
    {
        return $this->belongsToMany(User::class, 'bookmarks', 'article_id', 'user_id');
    }
}
