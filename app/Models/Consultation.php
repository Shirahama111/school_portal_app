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
        'date',
    ];

    public $timestamps = false;

  
    public function user()
    {
        //toカラムとuserモデルのidが紐づく
        return $this->belongsTo(User::class, 'to')->withDefault();
    }
}
