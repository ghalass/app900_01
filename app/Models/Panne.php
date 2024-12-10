<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Panne extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'typepanne_id',
    ];

    public function typepanne(): BelongsTo
    {
        return $this->belongsTo(Typepanne::class);
    }
}
