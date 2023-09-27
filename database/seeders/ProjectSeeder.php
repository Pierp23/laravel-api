<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

// MODEL
use App\Models\Project;
use App\Models\Type;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Project::truncate();
        });

        $projects = [
            "Carosello quant'è bello!",
            'DB per tutti',
            'Web App crackate',
            'Single Page but not alone',
            'Gestionale per la frutta e la verdura'
        ];

        foreach ($projects as $title) {

            $description = fake()->paragraph();
            $date = fake()->date();

            $randomTypeId = Type::inRandomOrder()->first();

            Project::create([
                'title' => $title,
                'description' => $description,
                'date' => $date,
                'type_id' => $randomTypeId->id
            ]);
        }
    }
}
