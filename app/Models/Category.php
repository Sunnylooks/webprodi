<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['program_id', 'name', 'slug', 'icon', 'sort_order'];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function pages()
    {
        return $this->hasMany(ProgramPage::class, 'category', 'slug')->where('program_id', $this->program_id);
    }
}
