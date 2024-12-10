<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Panne extends Model
{
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
