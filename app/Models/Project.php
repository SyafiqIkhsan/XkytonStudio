<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Project extends Model
{
    protected $fillable = ['title', 'slug', 'tech_stack', 'year', 'description', 'image_path', 'demo_url', 'github_url'];

    // Mutator otomatis untuk membuat slug saat title diisi
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    // Semua komentar (termasuk balasan)
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    // Relasi ke tabel komentar (Hanya mengambil komentar utama/bukan balasan di level atas)
    public function rootComments(): HasMany
    {
        return $this->hasMany(Comment::class)->whereNull('parent_id')->latest();
    }
}
