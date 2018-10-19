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
            'name' => 'Admin',
            'email' => 'admin@apnardaktar.com',
            'phone' => '123456789',
            'job_title' => 'Admin',
            'orgnization' => 'myorganization',
            'password' => bcrypt('rootadmin'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'role_id' => '2',
            'name' => 'Dr.Addison Alexander',
            'email' => 'doctor1@apnardaktar.com',
            'phone' => '1',
            'job_title' => 'Asst. Professor',
            'photo' => 'doctor-1.jpg',
            'biography' => 'Lev Vygotsky was a seminal Russian11 psychologist who is best known for his sociocultural theory. He believed that social interaction plays a critical role in children\'s learning. Through such social interactions, children go through a continuous process of learning. Vygotsky noted, however, that culture profoundly influences this process. Imitation, guided learning, and collaborative learning all play a critical part in his theory.',
            'orgnization' => 'Primary Health Care',
            'password' => bcrypt('1234'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

         DB::table('users')->insert([
             'role_id' => '2',
             'name' => 'Dr.Andrew Bert',
             'email' => 'doctor2@apnardaktar.com',
             'phone' => '2',
             'job_title' => 'Professor',
             'photo' => 'doctor-2.jpg',
            'biography' => 'Lev Vygotsky was a seminal Russian psychologist who is best known for his sociocultural theory. He believed that social interaction plays a critical role in children\'s learning. Through such social interactions, children go through a continuous process of learning. Vygotsky noted, however, that culture profoundly influences this process. Imitation, guided learning, and collaborative learning all play a critical part in his theory.',
            'orgnization' => 'Primary Health Care',
            'password' => bcrypt('1234'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'role_id' => '2',
            'name' => 'Dr.Kylee Leewan',
            'email' => 'doctor3@apnardaktar.com',
            'phone' => '3',
            'job_title' => 'Doctor',
            'photo' => 'doctor-3.jpg',
            'biography' => 'Lev Vygotsky was a seminal Russian psychologist who is best known for his sociocultural theory. He believed that social interaction plays a critical role in children\'s learning. Through such social interactions, children go through a continuous process of learning. Vygotsky noted, however, that culture profoundly influences this process. Imitation, guided learning, and collaborative learning all play a critical part in his theory.',
            'orgnization' => 'Primary Health Care',
            'password' => bcrypt('1234'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'role_id' => '2',
            'name' => 'Dr.Addison Alexander',
            'email' => 'doctor4@apnardaktar.com',
            'phone' => '4',
            'job_title' => 'Professor',
            'photo' => 'doctor-4.jpg',
            'biography' => 'Lev Vygotsky was a seminal Russian psychologist who is best known for his sociocultural theory. He believed that social interaction plays a critical role in children\'s learning. Through such social interactions, children go through a continuous process of learning. Vygotsky noted, however, that culture profoundly influences this process. Imitation, guided learning, and collaborative learning all play a critical part in his theory.',
            'orgnization' => 'Primary Health Care',
            'password' => bcrypt('1234'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'role_id' => '2',
            'name' => 'Dr.Andrew Bert',
            'email' => 'doctor5@apnardaktar.com',
            'phone' => '5',
            'job_title' => 'Doctor',
            'photo' => 'doctor-5.jpg',
            'biography' => 'Lev Vygotsky was a seminal Russian psychologist who is best known for his sociocultural theory. He believed that social interaction plays a critical role in children\'s learning. Through such social interactions, children go through a continuous process of learning. Vygotsky noted, however, that culture profoundly influences this process. Imitation, guided learning, and collaborative learning all play a critical part in his theory.',
            'orgnization' => 'Primary Health Care',
            'password' => bcrypt('1234'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'role_id' => '2',
            'name' => 'Dr.Kylee Leewan',
            'email' => 'doctor6@apnardaktar.com',
            'phone' => '6',
            'job_title' => 'Doctor',
            'photo' => 'doctor-6.jpg',
            'biography' => 'Lev Vygotsky was a seminal Russian psychologist who is best known for his sociocultural theory. He believed that social interaction plays a critical role in children\'s learning. Through such social interactions, children go through a continuous process of learning. Vygotsky noted, however, that culture profoundly influences this process. Imitation, guided learning, and collaborative learning all play a critical part in his theory.',
            'orgnization' => 'Primary Health Care',
            'password' => bcrypt('1234'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

    }
}