<?php
namespace App\Services;

use App\Http\Requests\StorePost;
use App\Model\Image;
use App\Model\Post;
use Illuminate\Support\Facades\Storage;

class StorageService
{
    public function deleteImagesRelatedToPost(Post $post):void
    {
        foreach ($post->images as $image) {
            Storage::delete($image->path);
        }
        Storage::deleteDirectory($post->id);
    }
}
