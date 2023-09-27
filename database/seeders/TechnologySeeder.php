<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

// MODEL
use App\Models\Technology;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Technology::truncate();
        });

        $technologies = [
            'HTML',
            'CSS',
            'JAVASCRIPT',
            'VUE JS',
            'PHP',
            'LARAVEL'
        ];

        foreach ($technologies as $title) {

            Technology::create([
                'title' => $title
            ]);
        }
    }
}
