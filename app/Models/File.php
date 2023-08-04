<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = [
            'created_user',
            'name',
            'path',
            'url',
            'extension',
            'mime_type',
            'size',
    ];

    public function createdUser()
    {
        return $this->belongsTo(User::class, 'created_user')->withDefault();
    }

}
