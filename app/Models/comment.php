<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'post_id', 'parent_id', 'body'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Write Your Code..
     *
     * @return string
    */
    

    public function adding_blog()
    {
        return $this->belongsTo(adding_blog::class);
    }
    
    public function user_Name_to_comment()
    {
        return $this->belongsTo(User::class,'user_id');
    }


}
