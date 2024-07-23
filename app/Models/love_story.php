<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Love_story extends Model
{
    use HasFactory;
    protected $fillable = [
        'identity_id',
        'story',
        'date',
    ];
}
