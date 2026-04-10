<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'content',
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
}
