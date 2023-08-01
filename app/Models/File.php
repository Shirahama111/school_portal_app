<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'created_user',
        'url',
        'path',
    ];

    public function createdUser()
    {
        return $this->belongsTo(User::class, 'created_user')->withDefault();
    }

}
