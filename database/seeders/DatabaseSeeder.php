<?php

namespace Database\Seeders;

use App\Models\Course;
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
        User::factory(1)->create()->each(function ($user) {
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
        $array_course = array(
            ['course_code' => 'TI1', 'course' => 'Basis Data'],
            ['course_code' => 'TI2', 'course' => 'Sistem Digital'],
            ['course_code' => 'TI3', 'course' => 'Pemrograman Framework'],
            ['course_code' => 'TI4', 'course' => 'Android'],
            ['course_code' => 'TI5', 'course' => 'Rekayasa Web'],
        );
        foreach ($array_course as $value) {
            Course::create($value);
        }

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
