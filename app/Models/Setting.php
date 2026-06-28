<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_title',
        'site_logo',
        'name',
        'designation',
        'about',
        'email',
        'phone',
        'address',
        'resume',
        'profile_image',
    ];
}