<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' => '1',
            'name' =>'Admin',
            'email' => 'admin@apnardaktar.com',
            'phone' => '123456789',
            'photo' => asset('/images/userphoto/default.png'),
            'password' => bcrypt('rootadmin'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'role_id' => '2',
            'name' =>'doctor1',
            'email' => 'doctor1@apnardaktar.com',
            'phone' => '123456789',
            'photo' => asset('/images/userphoto/doctor-1.jpg'),
            'password' => bcrypt('doctor'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'role_id' => '2',
            'name' =>'doctor2',
            'email' => 'doctor2@apnardaktar.com',
            'phone' => '123456789',
            'photo' => asset('/images/userphoto/doctor-2.jpg'),
            'password' => bcrypt('doctor'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);


        DB::table('users')->insert([
            'role_id' => '2',
            'name' =>'doctor3',
            'email' => 'doctor3@apnardaktar.com',
            'phone' => '123456789',
            'photo' => asset('/images/userphoto/doctor-3.jpg'),
            'password' => bcrypt('doctor'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);


        DB::table('users')->insert([
            'role_id' => '2',
            'name' =>'doctor4',
            'email' => 'doctor4@apnardaktar.com',
            'phone' => '123456789',
            'photo' => asset('/images/userphoto/doctor-4.jpg'),
            'password' => bcrypt('doctor'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'role_id' => '2',
            'name' =>'doctor5',
            'email' => 'doctor5@apnardaktar.com',
            'phone' => '123456789',
            'photo' => asset('/images/userphoto/doctor-5.jpg'),
            'password' => bcrypt('doctor'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'role_id' => '2',
            'name' =>'doctor6',
            'email' => 'doctor6@apnardaktar.com',
            'phone' => '123456789',
            'photo' => asset('/images/userphoto/doctor-6.jpg'),
            'password' => bcrypt('doctor'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);


        DB::table('users')->insert([
            'role_id' => '3',
            'name' =>'patient1',
            'email' => 'patient1@apnardaktar.com',
            'phone' => '123456789',
            'photo' => asset('/images/userphoto/default.png'),
            'password' => bcrypt('patient'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'role_id' => '3',
            'name' =>'patient2',
            'email' => 'patient2@apnardaktar.com',
            'phone' => '123456789',
            'photo' => asset('/images/userphoto/default.png'),
            'password' => bcrypt('patient'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);





    }
}