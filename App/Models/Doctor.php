<?php

namespace App\Models;


use App\core\db\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Doctor extends Model
{
    protected $fillable = [
        "Evidence", "Expert", "user_id", "status"
    ];

    protected $guarded = ["id"];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function labs(): BelongsToMany
    {
        return $this->belongsToMany(Lab::class);
    }
}