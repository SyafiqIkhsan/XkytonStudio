<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    protected $fillable = ['project_id', 'parent_id', 'name', 'email', 'comment', 'is_admin'];

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }

    // Relasi untuk mengambil balasan dari sebuah komentar
    public function replies(): HasMany
    {
        return $this->hasMany(Comment::class, 'parent_id')->oldest();
    }
}
