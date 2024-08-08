<?php

namespace Database\Seeders;

use App\Models\membros as ModelsMembros;
use Database\Factories\MembroFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Membros extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MembroFactory::factory()->count(50)->create();
    }
}
