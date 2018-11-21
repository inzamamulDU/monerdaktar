<?php

use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       /*  $this->call(UsersTableSeeder::class);*/
        //factory(App\Model\User::class,5)->create();

        $this->call(RolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(PatientInfoTableSeeder::class);
        $this->call(DoctorInfoTableSeeder::class);
    }
}
