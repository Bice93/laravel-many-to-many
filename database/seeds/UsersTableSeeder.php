<?php

use App\Models\User;
use App\Models\User as AppUser;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $myUser = new User();
        $myUser->name = 'Giorgina';
        $myUser->email = 'giorgina@gmail.com';
        $myUser->password = Hash::make('pippopippo');
        $myUser->save();

        for ($i=0; $i < 15; $i++) { 
            $user = new User();
            $user->name = $faker->userName();
            $user->email = $faker->unique()->email();
            $user->password = Hash::make($faker->password());
            $user->save();
        }
    }
}
