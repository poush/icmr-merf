<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Auto Analyser',
                'parent_id' => 0,
                'created_at' => '2018-07-03 09:08:18',
                'updated_at' => '2018-07-03 09:08:18',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Blotting',
                'parent_id' => 0,
                'created_at' => '2018-07-03 09:08:18',
                'updated_at' => '2018-07-03 09:08:18',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'BSL Facility',
                'parent_id' => 0,
                'created_at' => '2018-07-03 09:08:18',
                'updated_at' => '2018-07-03 09:08:18',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Centrifuge',
                'parent_id' => 0,
                'created_at' => '2018-07-03 09:08:18',
                'updated_at' => '2018-07-03 09:08:18',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Chromatography',
                'parent_id' => 0,
                'created_at' => '2018-07-03 09:08:18',
                'updated_at' => '2018-07-03 09:08:18',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'DNA extraction',
                'parent_id' => 0,
                'created_at' => '2018-07-03 09:08:18',
                'updated_at' => '2018-07-03 09:08:18',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Electrophoresis',
                'parent_id' => 0,
                'created_at' => '2018-07-03 09:08:18',
                'updated_at' => '2018-07-03 09:08:18',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'ELISA',
                'parent_id' => 0,
                'created_at' => '2018-07-03 09:08:18',
                'updated_at' => '2018-07-03 09:08:18',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Flow Cytometry',
                'parent_id' => 0,
                'created_at' => '2018-07-03 09:08:18',
                'updated_at' => '2018-07-03 09:08:18',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'GIS',
                'parent_id' => 0,
                'created_at' => '2018-07-03 09:08:18',
                'updated_at' => '2018-07-03 09:08:18',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Imaging',
                'parent_id' => 0,
                'created_at' => '2018-07-03 09:08:18',
                'updated_at' => '2018-07-03 09:08:18',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Insect rearing',
                'parent_id' => 0,
                'created_at' => '2018-07-03 09:08:18',
                'updated_at' => '2018-07-03 09:08:18',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Mass spectrometry',
                'parent_id' => 0,
                'created_at' => '2018-07-03 09:08:18',
                'updated_at' => '2018-07-03 09:08:18',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Microbial detection',
                'parent_id' => 0,
                'created_at' => '2018-07-03 09:08:18',
                'updated_at' => '2018-07-03 09:08:18',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Miscellaneous',
                'parent_id' => 0,
                'created_at' => '2018-07-03 09:08:18',
                'updated_at' => '2018-07-03 09:08:18',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Gen Sequencer',
                'parent_id' => 0,
                'created_at' => '2018-07-03 09:08:18',
                'updated_at' => '2018-07-03 09:08:18',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'PCR',
                'parent_id' => 0,
                'created_at' => '2018-07-03 09:08:18',
                'updated_at' => '2018-07-03 09:08:18',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Real Time PCR',
                'parent_id' => 0,
                'created_at' => '2018-07-03 09:08:18',
                'updated_at' => '2018-07-03 09:08:18',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Spectrophotometry',
                'parent_id' => 0,
                'created_at' => '2018-07-03 09:08:18',
                'updated_at' => '2018-07-03 09:08:18',
            ),
        ));
        
        
    }
}