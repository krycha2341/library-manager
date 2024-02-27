<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Customer
 *
 * @package App\Models
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Book[]|null $books
 */
class Customer extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
    ];

    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }
}
