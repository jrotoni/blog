<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $limit = 20;

        for ($i=0; $i < $limit; $i++){
            $user = new User();
            $user->name = $faker->name;
            $user->email = $faker->email;
            $user->password = bcrypt($faker->password);
            $user->save(); 
        }
    }
}
