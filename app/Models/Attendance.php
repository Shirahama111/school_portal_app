<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'to_user_id',
        'condition',
        'temperature',
        'remark',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id')->withDefault();
    }

    public function toUser()
    {
        return $this->belongsTo(User::class,'to_user_id')->withDefault();
    }
}
