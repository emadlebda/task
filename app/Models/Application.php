<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Application extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject',
        'message',
        'attachment_link',
        'user_id',
        'is_answered'
    ];

    protected $casts = [
        'is_answered' => 'boolean'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeToday($builder)
    {
        return $builder->where('created_at', '>', today());
    }
}
