<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'tel',
        'user_id',
        'province',
    ];

    public function user()
    {
        return $this->beLongsTo('\App\Models\User');
    }
}
