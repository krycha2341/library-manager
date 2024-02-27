<?php

namespace App\Models;

use App\Enums\BookStatus;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class Book
 *
 * @package App\Models
 *
 * @property int $id
 * @property string $title
 * @property string $author
 * @property int $publication_date
 * @property string $print
 * @property BookStatus $status
 * @property int|null $customer_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Customer|null $customer
 */
class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'publication_date',
        'print',
        'status',
    ];

    protected $casts = [
        'publication_date' => 'integer',
    ];

    protected function status(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => BookStatus::tryFrom($value),
            set: fn (BookStatus $value) => $value->value,
        );
    }

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
}
