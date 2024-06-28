<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    //use SoftDeletes;

     protected $table='posts';
     //protected $guarded=['body'];
    protected $fillable=['title','body','created_at','updated_at'];

    //  public function scopeSamir($query){
    //     return $query->where('body','third post');

     //}

    // public $timestamps=false;
    // protected $primaryKey='post_id';
    // public $incrementing=false;
    //protected $connection = 'sqlite';

    public function comments(){
        return $this->hasMany(Comment::class,'post_id');
    }
}
