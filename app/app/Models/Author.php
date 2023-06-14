<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property positive-int $id
 * @property string $name
 */
class Author extends Model
{
    use HasFactory;

    public function book(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}
