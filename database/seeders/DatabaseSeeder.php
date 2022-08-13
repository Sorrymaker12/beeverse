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
        User::create([
            'id' => 1,
            'name' => 'Anthony A',
            'email' => 'AnthonyA@gmail.com',
            'password' => bcrypt('12345678'),
            'gender' => 'male',
            'linkedin' => 'https://www.linkedin.com/in/' . 'AnthonyA',
            'mobile_number' => '123456',
            'current_fow' => 'Banking',
            'fow_1' => 'Banking',
            'fow_2' => 'Finance',
            'fow_3' => 'Accounting',
            'current_job' => 'Director',
            'current_company' => 'Anthony\'s Company',
            'profile_picture' => 'profile' . 1 . '.jpg',
            'registration_price' => 120000,
            'coins' => 65000,
        ]);

        User::create([
            'id' => 2,
            'name' => 'Anthony B',
            'email' => 'AnthonyB@gmail.com',
            'password' => bcrypt('12345678'),
            'gender' => 'male',
            'linkedin' => 'https://www.linkedin.com/in/' . 'AnthonyB',
            'mobile_number' => '123456',
            'current_job' => 'Vice Director',
            'current_company' => 'Anthony\'s Company',
            'current_fow' => 'Entertainment',
            'fow_1' => 'Entertainment',
            'fow_2' => 'Music',
            'fow_3' => 'Events',
            'profile_picture' => 'profile' . 2 . '.jpg',
            'registration_price' => 120000,
            'coins' => 65000,
        ]);

        User::create([
            'id' => 3,
            'name' => 'Anthony C',
            'email' => 'AnthonyC@gmail.com',
            'password' => bcrypt('12345678'),
            'gender' => 'male',
            'linkedin' => 'https://www.linkedin.com/in/' . 'AnthonyC',
            'mobile_number' => '123456',
            'current_job' => 'Manager',
            'current_company' => 'Anthony\'s Company',
            'profile_picture' => 'profile' . 3 . '.jpg',
            'current_fow' => 'Technology',
            'fow_1' => 'Automotive',
            'fow_2' => 'Racing',
            'fow_3' => 'Space',
            'registration_price' => 120000,
            'coins' => 65000,
        ]);

        User::create([
            'id' => 4,
            'name' => 'Anthony D',
            'email' => 'AnthonyD@gmail.com',
            'password' => bcrypt('12345678'),
            'gender' => 'male',
            'linkedin' => 'https://www.linkedin.com/in/' . 'AnthonyD',
            'mobile_number' => '123456',
            'current_job' => 'Vice Manager',
            'current_company' => 'Anthony\'s Company',
            'profile_picture' => 'profile' . 4 . '.jpg',
            'current_fow' => 'Music',
            'fow_1' => 'Music',
            'fow_2' => 'Art',
            'fow_3' => 'Design',
            'registration_price' => 120000,
            'coins' => 65000,
        ]);

        User::create([
            'id' => 5,
            'name' => 'Anthony E',
            'email' => 'AnthonyE@gmail.com',
            'password' => bcrypt('12345678'),
            'gender' => 'male',
            'linkedin' => 'https://www.linkedin.com/in/' . 'AnthonyE',
            'mobile_number' => '123456',
            'current_job' => 'President',
            'current_company' => 'Anthony\'s Company',
            'profile_picture' => 'profile' . 5 . '.jpg',
            'current_fow' => 'Fashion',
            'fow_1' => 'Fashion',
            'fow_2' => 'Business',
            'fow_3' => 'Design',
            'registration_price' => 120000,
            'coins' => 65000,
        ]);


        // create avatars
        Avatar::create([
            'id' => 1,
            'name' => 'Birdie',
            'price' => 50,
            'image' => 'avatar' . 1 . '.png',
        ]);

        Avatar::create([
            'id' => 2,
            'name' => 'Pengu',
            'price' => 500,
            'image' => 'avatar' . 2 . '.png',
        ]);

        Avatar::create([
            'id' => 3,
            'name' => 'Hedgehog',
            'price' => 100,
            'image' => 'avatar' . 3 . '.png',
        ]);

        Avatar::create([
            'id' => 4,
            'name' => 'Wormie',
            'price' => 5010,
            'image' => 'avatar' . 4 . '.png',
        ]);

        Avatar::create([
            'id' => 5,
            'name' => 'Mickey',
            'price' => 5100,
            'image' => 'avatar' . 5 . '.png',
        ]);

        Avatar::create([
            'id' => 6,
            'name' => 'Fat Cat',
            'price' => 5070,
            'image' => 'avatar' . 6 . '.png',
        ]);

        Avatar::create([
            'id' => 7,
            'name' => 'Ninja',
            'price' => 44444,
            'image' => 'avatar' . 7 . '.png',
        ]);

        Avatar::create([
            'id' => 8,
            'name' => 'Dwarf',
            'price' => 5100,
            'image' => 'avatar' . 8 . '.png',
        ]);

        Avatar::create([
            'id' => 9,
            'name' => 'Psyduck',
            'price' => 51000,
            'image' => 'avatar' . 9 . '.png',
        ]);

        Avatar::create([
            'id' => 10,
            'name' => 'ROBLOX',
            'price' => 10000,
            'image' => 'avatar' . 10 . '.png',
        ]);

        // create avatar collections
        AvatarCollection::create([
            'id' => 1,
            'user_id' => 1,
            'avatar_id' => 1,
        ]);
        AvatarCollection::create([
            'id' => 2,
            'user_id' => 2,
            'avatar_id' => 1,
        ]);
        AvatarCollection::create([
            'id' => 3,
            'user_id' => 3,
            'avatar_id' => 1,
        ]);
        AvatarCollection::create([
            'id' => 4,
            'user_id' => 4,
            'avatar_id' => 1,
        ]);
        AvatarCollection::create([
            'id' => 5,
            'user_id' => 5,
            'avatar_id' => 1,
        ]);
    }
}
