<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verification extends Model
{
    public function drug()
    {
        return $this->belongsTo(Drug::class);
    }
}
