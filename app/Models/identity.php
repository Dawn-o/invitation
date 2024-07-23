<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Identity extends Model
{
    use HasFactory;
    protected $primaryKey = 'identity_id';
    public $incrementing = false;

    protected $fillable = [
        'identity_id',
        'male_fullname',
        'male_nickname',
        'male_description',
        'male_socmed',
        'female_fullname',
        'female_nickname',
        'female_description',
        'female_socmed',
    ];
}
