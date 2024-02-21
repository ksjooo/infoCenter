<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Ramsey\Uuid\Uuid;

/**
 *  @property-read Uuid $id
 *  @property-read string $title
 *  @property-read string $description
 *  @property-read string $cabinet
 *  @property-read string $initiator_name
 *  @property-read Uuid $initiator_id
 *  @property-read Uuid $acceptor_id
 */
class Order extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'description',
        'cabinet',
        'status',
        'initiator_name',
        'initiator_id',
        'acceptor_id',
    ];

    public function acceptor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'acceptor_id');
    }

    public function initiator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'initiator_id');
    }
}
