<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::create([
            'name' => 'Limer',
            'slug' => 'limer',
            'price' => '26',
            'status' => '0',
        ]);

        Service::create([
            'name' => 'Couleur',
            'slug' => 'couleur',
            'price' => '34',
            'status' => '0',
        ]);

        Service::create([
            'name' => 'Pose',
            'slug' => 'pose',
            'price' => '55',
            'status' => '0',
        ]);
    }
}
