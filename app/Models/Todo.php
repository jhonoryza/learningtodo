<?php

namespace App\Models;

use App\Enums\Todo as EnumsTodo;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Todo extends Model
{
    protected $fillable = [
        'name',
        'url',
        'status',
        'user_id',
    ];

    protected $appends = [
        'is_done'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected function isDone(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->status === EnumsTodo::DONE->value,
        );
    }
}
