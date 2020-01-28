<?php
namespace App\Model;

use App\Http\Requests\StorePost;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Image extends Model
{
    public const TABLE_NAME = 'image';
    public const COLUMN_RELATED_POST_ID= 'post_id';
    protected $table = self::TABLE_NAME;

    protected $fillable = ['path'];

    public function post()
    {
        return $this->belongsTo('App\Model\Post');
    }

    public static function relatePost(StorePost $storePost, Post $post): void
    {
            $i = 0;
            foreach ($storePost->photos as $photo) {
                $photoName = $photo->store($post->id);
                $post->images()->create([
                    'path' => $photoName
                ]);
                $i++;
            }
    }
}
