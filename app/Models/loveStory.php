<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class love_story extends Model
{
    use HasFactory;
    protected $fillable = [
        'story',
        'date',
    ];
}
