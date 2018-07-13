<?php

use Illuminate\Database\Seeder;

class AvailabilityTypesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('availability_types')->delete();
        
        \DB::table('availability_types')->insert(array (
            0 => 
            array (
                'id' => 1,
                'type' => 'default',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'type' => 'blocked_slot',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'type' => 'booked',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'type' => 'available',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}