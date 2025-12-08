<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'faculty',
        'description',
        'banner_image',
    ];

    public function pages()
    {
        return $this->hasMany(ProgramPage::class)->orderBy('category')->orderBy('sort_order');
    }

    public function users()
    {
        return $this->hasMany(User::class);
    }
}

