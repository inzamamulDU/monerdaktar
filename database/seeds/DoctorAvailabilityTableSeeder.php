<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class DoctorAvailabilityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('doctor_availabilities')->insert([
            'doctor_info_id' => 1,
            'day' => 'Mon',
            'start_time' => '10:00',
            'end_time' => '11:00',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);

        DB::table('doctor_availabilities')->insert([
            'doctor_info_id' => 2,
            'day' => 'Mon',
            'start_time' => '10:00',
            'end_time' => '11:00',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);

        DB::table('doctor_availabilities')->insert([
            'doctor_info_id' => 3,
            'day' => 'Mon',
            'start_time' => '10:00',
            'end_time' => '11:00',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);

        DB::table('doctor_availabilities')->insert([
            'doctor_info_id' => 4,
            'day' => 'Mon',
            'start_time' => '10:00',
            'end_time' => '11:00',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);

        DB::table('doctor_availabilities')->insert([
            'doctor_info_id' => 5,
            'day' => 'Mon',
            'start_time' => '10:00',
            'end_time' => '11:00',

            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);








    }
}