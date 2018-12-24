<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class DoctorInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('doctor_infos')->insert([
            'user_id' => 2,
            'address' => 'doctor1 address',
            'city' => 'Dhaka',
            'Country' => 'Bangladesh',
            'postcode' => '1205',
            'biography' => 'Lev Vygotsky was a seminal Russian11 psychologist who is best known for his sociocultural theory. He believed that social interaction plays a critical role in children\'s learning. Through such social interactions, children go through a continuous process of learning. Vygotsky noted, however, that culture profoundly influences this process. Imitation, guided learning, and collaborative learning all play a critical part in his theory.',
            'designation' => 'Asst. Professor',
            'institute' => 'Primary Health Care',
            'degree' => 'FCPS FRCS',
            'is_consultant' => true,
            'is_psychologist' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);


        DB::table('doctor_infos')->insert([
            'user_id' => 3,
            'address' => 'doctor 2 address',
            'city' => 'Dhaka',
            'Country' => 'Bangladesh',
            'postcode' => '1205',
            'biography' => 'Lev Vygotsky was a seminal Russian11 psychologist who is best known for his sociocultural theory. He believed that social interaction plays a critical role in children\'s learning. Through such social interactions, children go through a continuous process of learning. Vygotsky noted, however, that culture profoundly influences this process. Imitation, guided learning, and collaborative learning all play a critical part in his theory.',
            'designation' => 'Professor',
            'institute' => 'Primary Health Care',
            'degree' => 'FCPS FRCS',
            'is_consultant' => true,
            'is_psychologist' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);

        DB::table('doctor_infos')->insert([
            'user_id' => 4,
            'address' => 'doctor 3 address',
            'city' => 'Dhaka',
            'Country' => 'Bangladesh',
            'postcode' => '1205',
            'biography' => 'Lev Vygotsky was a seminal Russian11 psychologist who is best known for his sociocultural theory. He believed that social interaction plays a critical role in children\'s learning. Through such social interactions, children go through a continuous process of learning. Vygotsky noted, however, that culture profoundly influences this process. Imitation, guided learning, and collaborative learning all play a critical part in his theory.',
            'designation' => 'Doctor',
            'institute' => 'Primary Health Care',
            'degree' => 'MBBS',
            'is_consultant' => true,
            'is_psychologist' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);


        DB::table('doctor_infos')->insert([
            'user_id' => 5,
            'address' => 'doctor 4 address',
            'city' => 'Dhaka',
            'Country' => 'Bangladesh',
            'postcode' => '1205',
            'biography' => 'Lev Vygotsky was a seminal Russian11 psychologist who is best known for his sociocultural theory. He believed that social interaction plays a critical role in children\'s learning. Through such social interactions, children go through a continuous process of learning. Vygotsky noted, however, that culture profoundly influences this process. Imitation, guided learning, and collaborative learning all play a critical part in his theory.',
            'designation' => 'Professor',
            'institute' => 'Primary Health Care',
            'degree' => 'FCPS FRCS',
            'is_consultant' => true,
            'is_psychologist' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);


        DB::table('doctor_infos')->insert([
            'user_id' => 6,
            'address' => 'doctor 5 address',
            'city' => 'Dhaka',
            'Country' => 'Bangladesh',
            'postcode' => '1205',
            'biography' => 'Lev Vygotsky was a seminal Russian11 psychologist who is best known for his sociocultural theory. He believed that social interaction plays a critical role in children\'s learning. Through such social interactions, children go through a continuous process of learning. Vygotsky noted, however, that culture profoundly influences this process. Imitation, guided learning, and collaborative learning all play a critical part in his theory.',
            'designation' => 'Doctor',
            'institute' => 'Primary Health Care',
            'degree' => 'MBBS',
            'is_consultant' => true,
            'is_psychologist' => false,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);


        DB::table('doctor_infos')->insert([
            'user_id' => 7,
            'address' => 'doctor 6 address',
            'city' => 'Dhaka',
            'Country' => 'Bangladesh',
            'postcode' => '1205',
            'biography' => 'Lev Vygotsky was a seminal Russian11 psychologist who is best known for his sociocultural theory. He believed that social interaction plays a critical role in children\'s learning. Through such social interactions, children go through a continuous process of learning. Vygotsky noted, however, that culture profoundly influences this process. Imitation, guided learning, and collaborative learning all play a critical part in his theory.',
            'designation' => 'Doctor',
            'institute' => 'Primary Health Care',
            'degree' => 'MBBS',
            'is_consultant' => true,
            'is_psychologist' => true,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);


    }
}