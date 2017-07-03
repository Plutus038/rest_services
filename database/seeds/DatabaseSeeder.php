<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<5; $i++){
            DB::table('device_details')->insert([
                'device_id' => '@111'.str_random(10),
                'device_label' => str_random(2).'#label',
                'reported_at' => \Carbon\Carbon::now(),
                'status' => ($i%2 == 0) ? 'OK' : 'OFFLINE',
            ]);
        }
    }
}
