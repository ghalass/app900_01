<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lubrifiant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'typelubrifiant_id',
    ];

    public function typelubrifiant(): BelongsTo
    {
        return $this->belongsTo(Typelubrifiant::class);
    }
}
