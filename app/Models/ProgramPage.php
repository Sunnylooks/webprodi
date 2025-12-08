<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramPage extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_id',
        'category',
        'title',
        'slug',
        'content',
        'is_published',
        'sort_order',
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }
}

