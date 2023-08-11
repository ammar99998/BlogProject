<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class adding_blog extends Model
{
    use HasFactory;
    protected $table = 'blogs_table';
    protected $fillable=['user_id','title','body','photo'];


    public function comments()
    {
        return $this->hasMany(Comment::class,'post_id');
    }


}
