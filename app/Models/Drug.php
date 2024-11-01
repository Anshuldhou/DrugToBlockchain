<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drug extends Model
{
    use HasFactory;

    // Specify which fields are mass assignable
    protected $fillable = [
        'name',
        'manufacturer',
        'batch_number',
        'expiry_date',
    ];
}
