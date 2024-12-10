<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Typepanne extends Model
{
    protected $fillable = [
        'name',
        'description',
    ];

    public function pannes(): HasMany
    {
        return $this->hasMany(Panne::class);
    }
}
