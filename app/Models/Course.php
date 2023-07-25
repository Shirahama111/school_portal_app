<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'to',
        'from',
        'company_name',
        'address',
        'content',
        'remarks',
        'date',
    ];

    public $timestamps = false;

  
    public function toUser()
    {
        //toカラムとuserモデルのidが紐づく
        return $this->belongsTo(User::class, 'to')->withDefault();
    }

    public function fromUser()
    {
        //fromカラムとuserモデルのidが紐づく
        return $this->belongsTo(User::class, 'from')->withDefault();
    }
}
