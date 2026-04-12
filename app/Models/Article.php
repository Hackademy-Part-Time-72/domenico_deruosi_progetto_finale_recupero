<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'content',
        'thumbnail',
    ];

    // Relazione: un articolo appartiene a un utente
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relazione: un articolo ha molti tag (many-to-many)
    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    // Calcolo tempo di lettura stimato (200 parole al minuto)
    public function getReadTimeAttribute()
    {
        $words = str_word_count(strip_tags($this->content));
        $minutes = ceil($words / 200);
        return $minutes;
    }
}
