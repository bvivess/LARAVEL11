<?php

namespace App\Models;

use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use App\Models\PostImage;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    // atributs intertables de manera massiva; associat al mètode 'Post::create()'
    protected $fillable = [ 
        'title',
        'url_clean',
        'content',
        'user_id',
    ];

    protected $guarded = [
        'id'
    ];

    // relacions entre taules
    public function category()
    {
      return $this->belongsTo(Category::class);
    }

    public function user()
    {
      return $this->belongsTo(User::class);
    }

    public function image(){
        return $this->hasOne(PostImage::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function commentsFamosos()
    {
        return $this->hasMany(Comment::class)->wherein('user_id', [4, 8 ,9]);  // per exemple
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

}