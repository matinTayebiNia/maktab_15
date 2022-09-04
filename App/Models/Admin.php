<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Admin extends Eloquent
{
    protected $fillable = [
        "user_id", "email", "status"
    ];

    protected $guarded = ["id"];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}