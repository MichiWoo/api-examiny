<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'user_id'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function groups() {
        return $this->belongsToMany(Group::class);
    }

    public function answers() {
        return $this->belongsToMany(Answer::class);
    }
}
