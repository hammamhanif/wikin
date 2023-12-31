<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komun extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'contact',
        'description',
        'image',
    ];

    public function notifications()
    {
        return $this->morphMany(Notification::class, 'notifiable');
    }

    public function sender()
    {
        return $this->belongsTo('App\Models\User');
    }
}
