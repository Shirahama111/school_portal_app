<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;

    protected $fillable = [
        'to',
        'from',
        'content',
        'anonymity',
        'replay',
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

    public function getReplay()
    {
        return $this->hasOne(Consultation::class, 'id', 'replay');
    }
}
