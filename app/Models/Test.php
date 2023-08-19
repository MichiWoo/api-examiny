<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'duration',
        'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function questions(){
        return $this->hasMany(Question::class);
    }

    public function groups() {
        return $this->belongsToMany(Group::class);
    }

    public function students() {
        return $this->belongsToMany(Student::class);
    }
}
