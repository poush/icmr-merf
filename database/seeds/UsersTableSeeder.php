<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'ICMR Head Quarter',
                'mobile' => '+9487960756657',
                'email' => 'icmr@example.com',
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'role' => 'super-admin',
                'institute_id' => NULL,
                'remember_token' => 'iJj7gZbAiCVZqvFXOl8fjA8znojJHSN7QC9owcQ0mNEUrT9NTkuBQ0IphjT9',
                'created_at' => '2018-06-21 10:30:11',
                'updated_at' => '2018-06-21 10:30:11',
            ),
            1 => 
            array (
                'id' => 34,
                'name' => 'NIMR Admin',
                'mobile' => '9818325292',
                'email' => 'admin@nimr.com',
                'password' => '$2y$10$xJ6n9Zpd1A8i09TPt428n.uEw50fbW0noCFFNbvCcgjURrArgYwB6',
                'role' => 'institute',
                'institute_id' => 11,
                'remember_token' => NULL,
                'created_at' => '2018-06-22 11:30:19',
                'updated_at' => '2018-06-22 11:30:19',
            ),
            2 => 
            array (
                'id' => 35,
                'name' => 'Manan Arya',
                'mobile' => '8888888888',
                'email' => 'example@gmail.com',
                'password' => '$2y$10$HAlVK5Y2CXtEj6wVmHEwE.g5C9Z0wbyTG.ECGSBVi/y5WtMWRp8i2',
                'role' => 'institute',
                'institute_id' => 11,
                'remember_token' => NULL,
                'created_at' => '2018-06-22 11:45:48',
                'updated_at' => '2018-06-22 11:45:48',
            ),
            3 => 
            array (
                'id' => 42,
                'name' => 'Isaac Lehner',
                'mobile' => '+9944402607504',
                'email' => 'admin@merf.icmr.org.in',
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'role' => 'super-admin',
                'institute_id' => NULL,
                'remember_token' => '4xAyQaRyt8',
                'created_at' => '2018-07-03 09:08:18',
                'updated_at' => '2018-07-03 09:08:18',
            ),
            4 => 
            array (
                'id' => 43,
                'name' => 'ICMR-Regional Medical Research Centre Bhubaneswar',
                'mobile' => '1234567890',
                'email' => 'icmrbhubaneswar@merf.icmr.org.in',
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'role' => 'institute',
                'institute_id' => 1,
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 => 
            array (
                'id' => 44,
                'name' => 'ICMR-Regional Medical Research Centre Dibrugarh',
                'mobile' => '1234567891',
                'email' => 'icmrdibrugarh@merf.icmr.org.in',
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'role' => 'institute',
                'institute_id' => 2,
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 => 
            array (
                'id' => 45,
                'name' => 'National AIDS Research Institute , Pune',
                'mobile' => '1234567892',
                'email' => 'icmrgorakhpur@merf.icmr.org.in',
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'role' => 'institute',
                'institute_id' => 38,
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 => 
            array (
                'id' => 46,
                'name' => 'National Animal Resource Facility for Biomedical Research  , Hyderabad',
                'mobile' => '1234567893',
                'email' => 'icmrjodhpur@merf.icmr.org.in',
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'role' => 'institute',
                'institute_id' => 27,
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 => 
            array (
                'id' => 47,
                'name' => 'National Institute for Research in Tribal Health , Jabalpur',
                'mobile' => '1234567894',
                'email' => 'icmr-"port@merf.icmr.org.in',
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'role' => 'institute',
                'institute_id' => 29,
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 => 
            array (
                'id' => 48,
                'name' => 'National Institute of Cancer Prevention and Research , Noida',
                'mobile' => '1234567895',
                'email' => 'narfbr@merf.icmr.org.in',
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'role' => 'institute',
                'institute_id' => 4,
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 => 
            array (
                'id' => 49,
                'name' => 'National Institute of Cholera and Enteric Diseases  , Kolkata',
                'mobile' => '1234567896',
                'email' => 'nari@merf.icmr.org.in',
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'role' => 'institute',
                'institute_id' => 3,
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 => 
            array (
                'id' => 50,
                'name' => 'National Institute of Malaria Research , Delhi',
                'mobile' => '1234567897',
                'email' => 'ncdir@merf.icmr.org.in',
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'role' => 'institute',
                'institute_id' => 30,
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 => 
            array (
                'id' => 51,
                'name' => 'National Institute of Pathology  , Delhi',
                'mobile' => '1234567898',
                'email' => 'niced@merf.icmr.org.in',
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'role' => 'institute',
                'institute_id' => 7,
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 => 
            array (
                'id' => 52,
                'name' => 'National Institute for Research in Reproductive Health , Mumbai',
                'mobile' => '1234567899',
                'email' => 'nicpr@merf.icmr.org.in',
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'role' => 'institute',
                'institute_id' => 6,
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 => 
            array (
                'id' => 53,
                'name' => 'National Institute of Virology , Pune',
                'mobile' => '1234567900',
                'email' => 'nie@merf.icmr.org.in',
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'role' => 'institute',
                'institute_id' => 14,
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 => 
            array (
                'id' => 54,
                'name' => 'National JALMA Institute for Leprosy & Other Mycobacterial Diseases , Agra',
                'mobile' => '1234567901',
                'email' => 'niih@merf.icmr.org.in',
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'role' => 'institute',
                'institute_id' => 15,
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 => 
            array (
                'id' => 55,
                'name' => 'Vector Control Research Centre , Pondicherry',
                'mobile' => '1234567902',
                'email' => 'nimr@merf.icmr.org.in',
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'role' => 'institute',
                'institute_id' => 8,
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 => 
            array (
                'id' => 56,
                'name' => 'National Institute of Epidemiology  , Chennai',
                'mobile' => '1234567903',
                'email' => 'nims@merf.icmr.org.in',
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'role' => 'institute',
                'institute_id' => 16,
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 => 
            array (
                'id' => 57,
                'name' => 'National Institute of Immunohaemotology , Mumbai',
                'mobile' => '1234567904',
                'email' => 'nin@merf.icmr.org.in',
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'role' => 'institute',
                'institute_id' => 19,
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 => 
            array (
                'id' => 58,
                'name' => 'National Institute of Medical Statistics , Delhi',
                'mobile' => '1234567905',
                'email' => 'nioh@merf.icmr.org.in',
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'role' => 'institute',
                'institute_id' => 20,
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 => 
            array (
                'id' => 59,
                'name' => 'National Institute of Nutrition , Hyderabad',
                'mobile' => '1234567906',
                'email' => 'nip@merf.icmr.org.in',
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'role' => 'institute',
                'institute_id' => 9,
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 => 
            array (
                'id' => 60,
                'name' => 'National Institute of Occupational Health , Ahmedabad',
                'mobile' => '1234567907',
                'email' => 'nireh@merf.icmr.org.in',
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'role' => 'institute',
                'institute_id' => 31,
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 => 
            array (
                'id' => 61,
                'name' => 'National Institute of Traditional Medicine, Belagavi',
                'mobile' => '1234567908',
                'email' => 'nirrh@merf.icmr.org.in',
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'role' => 'institute',
                'institute_id' => 10,
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 => 
            array (
                'id' => 62,
                'name' => 'Rajendra Memorial Research Institute of Medical Sciences , Patna',
                'mobile' => '1234567909',
                'email' => 'nirt@merf.icmr.org.in',
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'role' => 'institute',
                'institute_id' => 33,
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 => 
            array (
                'id' => 63,
                'name' => 'ICMR-Desert Medicine Research Centre Jodhpur',
                'mobile' => '1234567910',
                'email' => 'nirth@merf.icmr.org.in',
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'role' => 'institute',
                'institute_id' => 5,
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 => 
            array (
                'id' => 64,
                'name' => 'ICMR-Regional Medical Research Centre Port Blair',
                'mobile' => '1234567911',
                'email' => 'nitm@merf.icmr.org.in',
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'role' => 'institute',
                'institute_id' => 22,
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 => 
            array (
                'id' => 65,
                'name' => 'National Centre for Disease Informatics and Research, Bengaluru',
                'mobile' => '1234567912',
                'email' => 'niv@merf.icmr.org.in',
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'role' => 'institute',
                'institute_id' => 11,
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 => 
            array (
                'id' => 66,
                'name' => 'National Institute for Research in Environmental Health , Bhopal',
                'mobile' => '1234567913',
                'email' => 'njilomd@merf.icmr.org.in',
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'role' => 'institute',
                'institute_id' => 12,
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 => 
            array (
                'id' => 67,
                'name' => 'National Institute for Research in Tuberculosis , Chennai',
                'mobile' => '1234567914',
                'email' => 'rmrims@merf.icmr.org.in',
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'role' => 'institute',
                'institute_id' => 25,
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 => 
            array (
                'id' => 68,
                'name' => 'ICMR-Regional Medical Research Centre orakhpur',
                'mobile' => '1234567915',
                'email' => 'vcrc@merf.icmr.org.in',
                'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm',
                'role' => 'institute
',
                'institute_id' => 13,
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        
        
    }
}