<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldOfWork extends Model
{
    use HasFactory;

    public function interest()
    {
        return $this->belongsTo(Interest::class);
    }
}
