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
        $this->call(ProgramSeeder::class);

        $super = User::firstOrCreate(
            ['email' => 'admin@webprodi.test'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('admin123'),
                'role' => 'superadmin',
            ]
        );

        $inf = Program::where('slug', 'informatika')->first();
        if ($inf) {
            User::firstOrCreate(
                ['email' => 'kaprodi.informatika@webprodi.test'],
                [
                    'name' => $inf->name,
                    'password' => Hash::make('kaprodi123'),
                    'role' => 'kaprodi',
                    'program_id' => $inf->id,
                ]
            );
        }
    }
}
