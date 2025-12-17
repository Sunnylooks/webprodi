<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Program;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $programs = Program::all();

        foreach ($programs as $program) {
            $categories = [
                ['name' => 'SOP & Tata Kelola', 'slug' => 'sop-tata-kelola', 'icon' => 'fa-book', 'sort_order' => 1],
                ['name' => 'Profil', 'slug' => 'profil', 'icon' => 'fa-user', 'sort_order' => 2],
                ['name' => 'Informasi', 'slug' => 'informasi', 'icon' => 'fa-info-circle', 'sort_order' => 3],
                ['name' => 'Panduan', 'slug' => 'panduan', 'icon' => 'fa-question-circle', 'sort_order' => 4],
                ['name' => 'Perkuliahan', 'slug' => 'perkuliahan', 'icon' => 'fa-graduation-cap', 'sort_order' => 5],
                ['name' => 'Formulir', 'slug' => 'formulir', 'icon' => 'fa-file-text', 'sort_order' => 6],
                ['name' => 'Mahasiswa', 'slug' => 'mahasiswa', 'icon' => 'fa-users', 'sort_order' => 7],
                ['name' => 'Survey', 'slug' => 'survey', 'icon' => 'fa-check-square-o', 'sort_order' => 8],
                ['name' => 'Data ' . $program->name, 'slug' => 'data-' . $program->slug, 'icon' => 'fa-database', 'sort_order' => 9],
            ];

            foreach ($categories as $category) {
                Category::firstOrCreate(
                    [
                        'program_id' => $program->id,
                        'slug' => $category['slug']
                    ],
                    [
                        'program_id' => $program->id,
                        'name' => $category['name'],
                        'slug' => $category['slug'],
                        'icon' => $category['icon'],
                        'sort_order' => $category['sort_order']
                    ]
                );
            }
        }
    }
}
