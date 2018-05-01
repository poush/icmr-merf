<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(App\User::class)->create([
            'email' => 'icmr@example.com',
            'role'=> 'super-admin'
        ]);

        factory(App\Category::class, 10)->create();

        factory(App\Institute::class, 10)->create()->each(function ($institute) {
            $institute->users()->saveMany(factory(App\User::class, 3)->make());
        });

        factory(App\Equipment::class, 50)->create()->each(function ($equipment) {
            $institutes = App\Institute::inRandomOrder()
                ->limit(5)
                ->get(['id']);

            $equipment->institutes()->sync($institutes);

            $institutes->each(function ($institute) use ($equipment) {
                $equipment->availability()->saveMany(
                    factory(App\EquipmentAvailability::class, 12)
                        ->make(['institute_id' => $institute->id])
                );
            });
        });
    }
}
