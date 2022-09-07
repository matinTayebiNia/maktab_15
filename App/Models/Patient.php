<?php

namespace App\Models;

use App\core\db\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Patient extends Model
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