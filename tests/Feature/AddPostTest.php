<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\App;
use Tests\TestCase;

class AddPostTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testAdd()
    {
        $response = $this->get('/post/create');
        $response->assertStatus(200);
        $response->assertSee('Menu Post');
        $response->assertSee('Posts list');
        $response->assertSee('Add Post');
        $response->assertSee('Post Name');
        $response->assertDontSee('Post name');
        $response->assertSee('Upload picture');
        $response = $this->followingRedirects()->post('/post', ['name' => 'test 1 post']);
        $response->assertStatus(200);
        $response->assertSee('The photos field is required');
        $response = $this->followingRedirects()->post('/post', ['name' => 'test 1 post', 'photos' => [UploadedFile::fake()->image('avatar.png')]]);
        $response->assertStatus(200);
        $response->assertSee('Successfully added post with name');
        $response->assertSee('test 1 post');
    }
}
