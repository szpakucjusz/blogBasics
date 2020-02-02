<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePost;
use App\Model\Post;
use App\Services\PostService;
use App\Services\StorageService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Class PostController
 * @description https://laravel.com/docs/5.8/controllers#resource-controllers
 */
class PostController extends Controller
{
    public function index()
    {
        return view('post.index', ['posts' => DB::table(Post::TABLE_NAME)->paginate(10)]);
    }

    public function create()
    {
        return view('post.create');
    }

    public function store(StorePost $request, PostService $postService)
    {
        $postService->createPostWithRelations($request);
        return redirect('/post')->with('success', 'Successfully added post with name: ' . $request['name']);
    }

    public function show($id)
    {
        return 'show';
    }

    public function edit(Post $post)
    {
        return view('post.update', ['post' => $post]);
    }

    public function update(Request $request, Post $post)
    {
        $post->update($request->all());

        return redirect('/post')->with('success', 'Successfully updated post with name: ' . $request['name']);
    }

    public function destroy(Post $post, StorageService $storageService)
    {
        $storageService->deleteImagesRelatedToPost($post);
        $post->delete();

        return redirect('/post')->with('success', 'Successfully deleted post with name: ' . $post->name);
    }
}
