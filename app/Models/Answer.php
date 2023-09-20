<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'image',
        'correct',
        'question_id'
    ];

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(Student::class);
    }

    public function evaluation(): BelongsToMany
    {
        return $this->belongsToMany(Evaluation::class);
    }
}
