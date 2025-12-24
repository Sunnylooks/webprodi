<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\ProgramSeeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Program;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(CategorySeeder::class);
        $this->call(ProgramSeeder::class);

        User::firstOrCreate(
            ['email' => 'admin@webprodi.test'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('admin123'),
                'role' => 'superadmin',
            ]
        );

        // Create kaprodi for all programs
        $programSlugs = [
            'informatika' => 'Kaprodi Informatika',
            'management' => 'Kaprodi Management',
            'accounting' => 'Kaprodi Akuntansi',
            'pariwisata' => 'Kaprodi Pariwisata',
            'dkv' => 'Kaprodi DKV',
            'arsitektur' => 'Kaprodi Arsitektur',
            'k3' => 'Kaprodi K3',
            'fisika-medis' => 'Kaprodi Fisika Medis',
        ];

        foreach ($programSlugs as $slug => $name) {
            $program = Program::where('slug', $slug)->first();
            if ($program) {
                User::firstOrCreate(
                    ['email' => "kaprodi.{$slug}@webprodi.test"],
                    [
                        'name' => $name,
                        'password' => Hash::make('kaprodi123'),
                        'role' => 'kaprodi',
                        'program_id' => $program->id,
                    ]
                );
            }
        }

        // User universitas role removed - portal now accessible by guest
        // User::firstOrCreate(
        //     ['email' => 'universitas@webprodi.test'],
        //     [
        //         'name' => 'User Universitas',
        //         'password' => Hash::make('universitas123'),
        //         'role' => 'universitas',
        //     ]
        // );
    }
}
