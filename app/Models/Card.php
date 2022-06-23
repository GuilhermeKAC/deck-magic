<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'description',
    ];

    public function deck()
    {
        return $this->belongsTo(Deck::class);
    }

    public function colors()
    {
        return $this->belongsToMany(Color::class);
    }

    public function types()
    {
        return $this->belongsToMany(Type::class);
    }
}
