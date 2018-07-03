<?php

use Illuminate\Database\Seeder;

class InstitutesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('institutes')->delete();
        
        \DB::table('institutes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'ICMR-Regional Medical Research Centre Bhubaneswar',
                'slug' => 'icmr-bhubaneswar',
                'city' => NULL,
                'phone' => NULL,
                'email' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'ICMR-Regional Medical Research Centre Dibrugarh',
                'slug' => 'icmr-dibrugarh',
                'city' => NULL,
                'phone' => NULL,
                'email' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'National AIDS Research Institute , Pune',
                'slug' => 'nari',
                'city' => NULL,
                'phone' => NULL,
                'email' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'National Animal Resource Facility for Biomedical Research  , Hyderabad',
                'slug' => 'narfbr',
                'city' => NULL,
                'phone' => NULL,
                'email' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'National Institute for Research in Tribal Health , Jabalpur',
                'slug' => 'nirth',
                'city' => NULL,
                'phone' => NULL,
                'email' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'National Institute of Cancer Prevention and Research , Noida',
                'slug' => 'nicpr',
                'city' => NULL,
                'phone' => NULL,
                'email' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'National Institute of Cholera and Enteric Diseases  , Kolkata',
                'slug' => 'niced',
                'city' => NULL,
                'phone' => NULL,
                'email' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'National Institute of Malaria Research , Delhi',
                'slug' => 'nimr',
                'city' => NULL,
                'phone' => NULL,
                'email' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'National Institute of Pathology  , Delhi',
                'slug' => 'nip',
                'city' => NULL,
                'phone' => NULL,
                'email' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'National Institute for Research in Reproductive Health , Mumbai',
                'slug' => 'nirrh',
                'city' => NULL,
                'phone' => NULL,
                'email' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'National Institute of Virology , Pune',
                'slug' => 'niv',
                'city' => NULL,
                'phone' => NULL,
                'email' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'National JALMA Institute for Leprosy & Other Mycobacterial Diseases , Agra',
                'slug' => 'njilomd',
                'city' => NULL,
                'phone' => NULL,
                'email' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Vector Control Research Centre , Pondicherry',
                'slug' => 'vcrc',
                'city' => NULL,
                'phone' => NULL,
                'email' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'National Institute of Epidemiology  , Chennai',
                'slug' => 'nie',
                'city' => NULL,
                'phone' => NULL,
                'email' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'National Institute of Immunohaemotology , Mumbai',
                'slug' => 'niih',
                'city' => NULL,
                'phone' => NULL,
                'email' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'National Institute of Medical Statistics , Delhi',
                'slug' => 'nims',
                'city' => NULL,
                'phone' => NULL,
                'email' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 19,
                'name' => 'National Institute of Nutrition , Hyderabad',
                'slug' => 'nin',
                'city' => NULL,
                'phone' => NULL,
                'email' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 20,
                'name' => 'National Institute of Occupational Health , Ahmedabad',
                'slug' => 'nioh',
                'city' => NULL,
                'phone' => NULL,
                'email' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 22,
                'name' => 'National Institute of Traditional Medicine, Belagavi',
                'slug' => 'nitm',
                'city' => NULL,
                'phone' => NULL,
                'email' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 25,
                'name' => 'Rajendra Memorial Research Institute of Medical Sciences  , Patna',
                'slug' => 'rmrims',
                'city' => NULL,
                'phone' => NULL,
                'email' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 27,
                'name' => 'ICMR-Desert Medicine Research Centre Jodhpur',
                'slug' => 'icmr-jodhpur',
                'city' => NULL,
                'phone' => NULL,
                'email' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 29,
                'name' => 'ICMR-Regional Medical Research Centre Port Blair',
                'slug' => 'icmr-port',
                'city' => NULL,
                'phone' => NULL,
                'email' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 30,
                'name' => 'National Centre for Disease Informatics and Research, Bengaluru',
                'slug' => 'ncdir',
                'city' => NULL,
                'phone' => NULL,
                'email' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 31,
                'name' => 'National Institute for Research in Environmental Health , Bhopal',
                'slug' => 'nireh',
                'city' => NULL,
                'phone' => NULL,
                'email' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 33,
                'name' => 'National Institute for Research in Tuberculosis , Chennai',
                'slug' => 'nirt',
                'city' => NULL,
                'phone' => NULL,
                'email' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 38,
                'name' => 'ICMR-Regional Medical Research Centre Gorakhpur',
                'slug' => 'icmr-gorakhpur',
                'city' => NULL,
                'phone' => NULL,
                'email' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}