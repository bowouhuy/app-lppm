<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penelitian extends Model
{
    use HasFactory;
    protected $table = 'penelitian';

    protected $fillable = [
        'id',
        'title',
        'file',
        'dosen_id',
        'dosen_date',
        'lppm_id',
        'lppm_approval',
        'lppm_note',
        'lppm_date',
        'reviewer_id',
        'reviewer_approval',
        'reviewer_note',
        'reviewer_date',
    ];
}
