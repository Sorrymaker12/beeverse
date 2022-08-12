<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    use HasFactory;

    public function avatarCollection()
    {
        return $this->belongsTo(AvatarCollection::class);
    }
}
