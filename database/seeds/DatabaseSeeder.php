<?php

use App\Model\Post;
use App\Model\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $users = ['test@test.com', 'test2@test.com', 'test3@test.com', 'test4@test.com', 'test5@test.com', 'test6@test.com', 'test7@test.com', 'test8@test.com', 'test9@test.com', 'test10@test.com', 'test11@test.com', 'test12@test.com' ];
        foreach ($users as $key => $user) {
            User::create([
                'name' => 'test' . $key,
                'email' => $user,
                'password' => Hash::make('12345678')
                ]);
        }
        $users = ['editor@test.com', 'editor2@test.com'];
        foreach ($users as $key => $user) {
            User::create([
                'name' => 'editor' . $key,
                'email' => $user,
                'password' => Hash::make('12345678'),
                'role' => 'editor'
            ]);
        }
        $users = ['admin@test.com', 'admin2@test.com'];
        foreach ($users as $key => $user) {
            User::create([
                'name' => 'admin' . $key,
                'email' => $user,
                'password' => Hash::make('12345678'),
                'role' => 'admin'
            ]);
        }

        $users = ['post@test.com', 'post2@test.com', 'post3@test.com', 'post4@test.com', 'post5@test.com', 'post6@test.com', 'post7@test.com', 'post8@test.com', 'post9@test.com', 'post10@test.com', 'post11@test.com', 'post12@test.com' ];
        foreach ($users as $key => $user) {
            $post = Post::create([
                'name' => 'post' . $key,
            ]);
            $i = rand(1, 6);
            for ($i = 0; $i < 5; $i++) {
                $post->images()->create([
                    'path' => 'post' . $key . 'photo' . $i
                ]);
            }
        }

    }
}
