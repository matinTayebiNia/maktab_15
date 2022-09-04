<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Patient extends Eloquent
{
    protected $fillable = [
        "user_id", "blood_type", "Type_of_disease"
    ];

    protected $guarded = ["id"];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}