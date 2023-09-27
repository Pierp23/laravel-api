<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

// MODEL
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Type::truncate();
        });

        $types = [
            'Carosello',
            'Database',
            'Web App',
            'Single Page',
            'Gestionale'
        ];

        foreach ($types as $type) {

            Type::create([
                'type' => $type
            ]);
        }
    }
}
