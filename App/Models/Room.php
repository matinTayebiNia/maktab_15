<?php

namespace App\Models;

use App\core\db\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Room extends Model
{
    protected $fillable = [
       "name", "room_type", "status", "lab_id"
    ];

    protected $guarded = ["id"];

    public function lab(): BelongsTo
    {
        return $this->belongsTo(Lab::class);
    }
}