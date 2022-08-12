<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\User;
use App\Models\Avatar;
use App\Models\AvatarCollection;
use App\Models\Interest;
use App\Models\Wishlist;
use App\Models\FieldOfWork;
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
        // \App\Models\User::factory(10)->create();

        $faker = Factory::create();

        // create users
        for ($i = 1; $i <= 5; $i++) {
            User::create([
                'id' => $i,
                'name' => $faker->name,
                'email' => $faker->email(),
                'password' => bcrypt('password'),
                'gender' => 'male',
                'linkedin' => 'https://www.linkedin.com/in/' . $faker->firstName(),
                'mobile_number' => $faker->numberBetween(1000000, 9999999),
                'current_job' => $faker->word(),
                'current_company' => $faker->company(),
                'profile_picture' => 'profile' . $i . '.jpg',
                'registration_price' => $faker->numberBetween(100000, 125000),
                'coins' => $faker->numberBetween(100, 500),
            ]);
        }

        // create fields of works
        for ($i = 1; $i <= 5; $i++) {
            FieldOfWork::create([
                'id' => $i,
                'name' => $faker->word(),
            ]);
        }

        // create interests
        for ($i = 1; $i <= 15; $i++) {
            Interest::create([
                'id' => $i,
                'user_id' => ceil($i / 3),
                'fow_id' => $i % 3 + 1,
            ]);
        }

        // create avatars
        for ($i = 1; $i <= 10; $i++) {
            Avatar::create([
                'id' => $i,
                'name' => $faker->word(),
                'price' => $faker->numberBetween(50, 100000),
                'image' => 'avatar' . $i . '.png',
            ]);
        }

        // create avatar collections
        for ($i = 1; $i <= 10; $i++) {
            AvatarCollection::create([
                'id' => $i,
                'user_id' => ceil($i / 2),
                'avatar_id' => $i % 2 + 1,
            ]);
        }
    }
}
