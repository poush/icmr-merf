<?php

use Illuminate\Database\Seeder;
use App\Equipment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        // where('email', 'admin@merf.icmr.org.in')->delete();
        
        factory(App\User::class)->create([
            'email' => 'admin@merf.icmr.org.in',
            'role'=> 'super-admin'
        ]);

        $this->call(CategoriesTableSeeder::class);
        $this->call(InstitutesTableSeeder::class);
        $this->call(EquipmentsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(AvailabilityTypesTableSeeder::class);
        $this->call(InstituteEquipmentTableSeeder::class);

        DB::table('institute_equipment')->delete();
        Equipment::all()->each(function($equipment){
            if($equipment->institute_id != 0 && $equipment->id != NULL){
                DB::table('institute_equipment')->insert(
                    ['institute_id' => $equipment->institute_id, 'equipment_id' => $equipment->id]
                );
        
            }
        });


        // factory(App\Category::class, 10)->create();

        // factory(App\Institute::class, 10)->create()->each(function ($institute) {
            // $institute->users()->saveMany(factory(App\User::class, 3)->make());
    // });

        // factory(App\Equipment::class, 50)->create()->each(function ($equipment) {
        //     $institutes = App\Institute::inRandomOrder()
        //         ->limit(5)
        //         ->get(['id']);

        //     $equipment->institutes()->sync($institutes);

        //     $institutes->each(function ($institute) use ($equipment) {
        //         $equipment->availability()->saveMany(
        //             factory(App\EquipmentAvailability::class, 12)
        //                 ->make(['institute_id' => $institute->id,'availability_type_id'=>4])
        //         );
        //     });
        // });
    }
}
