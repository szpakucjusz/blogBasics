<?php
namespace App\Services;

use App\Http\Requests\StorePost;
use App\Model\Image;
use App\Model\Post;

class PostService
{
    public function createPostWithRelations(StorePost $storePost)
    {
        Image::relatePost($storePost, Post::create($storePost->all()));
    }
}
