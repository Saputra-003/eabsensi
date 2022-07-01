<?php

namespace Database\Seeders;

use App\Models\Kelas;
use App\Models\Mahasiswa;
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
        User::factory(3)->create()->each(function ($user) {
            $profile = Profile::factory()->create();
            $user->profile()->save($profile);
        });

        Prodi::factory()->create();
        $kelas = array("1TIA", "2TIA", "3TIA");
        foreach ($kelas as $value) {
            Kelas::create([
                'prodi_id'  =>  1,
                'kelas'  =>  $value,
                'jenis_kelas' => 'Teori'

            ]);
        }
        Mahasiswa::create([
            'prodi_id'  =>  1,
            'user_id'  =>  2,
            'angkatan'  =>  '2017',
            'semester'  =>  '6',
            'status'    =>  'aktif',
        ]);
        // Prodi::factory(1)->create(function ($prodi) {
        //     $kelas = array("1TIA", "2TIA", "3TIA");
        //     foreach ($kelas as $value) {
        //         $prodi->kelas()->save($value);
        //     }
        // });
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
