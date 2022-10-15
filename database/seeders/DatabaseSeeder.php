<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::updateOrCreate(
            ['Email' => 'admin@admin.com'],
            [
                'Name' => 'Admin',
                'FK_IdUser' => 1,
                'Password' => Hash::make('control'),
                'Company' => 'TurnMyApp',
                'Phone' => '0123456789',
                'Role' => 'Administrador',
                'Status' => 0
            ]
        );

        $this->call(StateSeeder::class);
        $this->call(TownSeeder::class);
        $this->call(PostalCodeSeeder::class);
        $this->call(ColonySeeder::class);

    }
}
