<?php

namespace Database\Seeders;

use App\Models\Program;
use App\Models\ProgramPage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProgramSeeder extends Seeder
{
    public function run(): void
    {
        $programs = [
            ['name' => 'Informatika', 'slug' => 'informatika', 'faculty' => 'Fakultas Teknologi dan Informasi', 'description' => 'Program studi yang mempelajari ilmu komputer, pemrograman, dan teknologi informasi.'],
            ['name' => 'Management', 'slug' => 'management', 'faculty' => 'Fakultas Ekonomi dan Bisnis', 'description' => 'Manajemen bisnis, kepemimpinan, dan strategi organisasi.'],
            ['name' => 'Accounting', 'slug' => 'accounting', 'faculty' => 'Fakultas Ekonomi dan Bisnis', 'description' => 'Akuntansi, keuangan, perpajakan, dan audit.'],
            ['name' => 'Pariwisata', 'slug' => 'pariwisata', 'faculty' => 'Fakultas Pariwisata', 'description' => 'Industri pariwisata, hospitality, dan manajemen destinasi wisata.'],
            ['name' => 'Desain Komunikasi Visual', 'slug' => 'dkv', 'faculty' => 'Fakultas Seni dan Desain', 'description' => 'Desain grafis, multimedia, branding, dan komunikasi visual.'],
            ['name' => 'Arsitektur', 'slug' => 'arsitektur', 'faculty' => 'Fakultas Teknik', 'description' => 'Perancangan bangunan, urban design, dan sustainable architecture.'],
            ['name' => 'Kesehatan & Keselamatan Kerja', 'slug' => 'k3', 'faculty' => 'Fakultas Kesehatan', 'description' => 'Manajemen K3 dan keselamatan kerja.'],
            ['name' => 'Fisika Medis', 'slug' => 'fisika-medis', 'faculty' => 'Fakultas Kesehatan', 'description' => 'Aplikasi fisika dalam bidang kesehatan dan teknologi medis.'],
        ];

        foreach ($programs as $pr) {
            $program = Program::firstOrCreate(['slug' => $pr['slug']], $pr);

            if ($program->pages()->count() === 0) {
                $categories = ['SOP & Tata Kelola', 'Profil', 'Informasi', 'Panduan', 'Perkuliahan', 'Formulir', 'Mahasiswa', 'Survey', 'Data TI'];
                foreach ($categories as $i => $cat) {
                    $title = $cat === 'Data TI' ? 'Data TI' : $cat.' Umum';
                    ProgramPage::create([
                        'program_id' => $program->id,
                        'category' => $cat,
                        'title' => $title,
                        'slug' => Str::slug($title),
                        'content' => 'Konten template untuk kategori '.$cat.' pada program '.$program->name.'.',
                        'is_published' => true,
                        'sort_order' => $i,
                    ]);
                }
            }
        }
    }
}

