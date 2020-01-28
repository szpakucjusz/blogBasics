<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public const TABLE_NAME = 'post';
    protected $table = self::TABLE_NAME;

    protected $fillable = ['name'];

    /**
     * Get the images for the post.
     */
    public function images()
    {
        return $this->hasMany('App\Model\Image');
    }
}
