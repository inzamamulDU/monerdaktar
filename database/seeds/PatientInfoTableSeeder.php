<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class PatientInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('patient_infos')->insert([
            'user_id' => 8,
            'address' => 'patient 1 address',
            'city' => 'Dhaka',
            'Country' => 'Bangladesh',
            'postcode' => '1205',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);

        DB::table('patient_infos')->insert([
            'user_id' => 9,
            'address' => 'patient 2 address',
            'city' => 'Dhaka',
            'Country' => 'Bangladesh',
            'postcode' => '1205',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')

        ]);

    }
}