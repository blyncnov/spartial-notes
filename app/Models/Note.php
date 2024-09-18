<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'n_title',
        'n_content',
        'n_passkey',
        'n_description',
        'n_latitude',
        'n_longitude',
        'n_visibility',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
