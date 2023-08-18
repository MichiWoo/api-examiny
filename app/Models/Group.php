<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'status'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function students() {
        return $this->belongsToMany(Student::class);
    }

    public function tests() {
        return $this->belongsToMany(Test::class);
    }
}
