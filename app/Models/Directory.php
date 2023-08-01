<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Directory extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'created_user',
        'path',
    ];

    public function createdUser()
    {
        return $this->belongsTo(User::class, 'created_user')->withDefault();
    }

}
