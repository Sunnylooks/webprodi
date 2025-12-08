<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'program_page_id',
        'file_path',
        'original_name',
        'mime_type',
        'size',
    ];

    public function page()
    {
        return $this->belongsTo(ProgramPage::class, 'program_page_id');
    }
}

