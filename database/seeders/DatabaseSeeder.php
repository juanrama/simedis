<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Keterangan;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Pasien;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Pasien::factory()->create();

        Keterangan::factory()->create();
    }
}
