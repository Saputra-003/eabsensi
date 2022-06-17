<?php

namespace Database\Seeders;

use App\Models\Prodi;
use App\Models\Profile;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(5)->create()->each(function ($user) {
            $profile = Profile::factory()->create();
            $user->profile()->save($profile);
        });
        Prodi::factory(5)->create();
        // Profile::factory(5)->create();

        // 1 Relation
        // $users = factory(App\User::class, 3)
        //     ->create()
        //     ->each(function ($user) {
        //         $user->posts()->save(factory(App\Post::class)->make());
        //     });
        // Many Relation            
        // $user->posts()->createMany(
        //     factory(App\Post::class, 3)->make()->toArray()
        // );
    }
}
