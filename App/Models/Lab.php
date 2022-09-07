<?php

namespace App\Models;

use App\core\db\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Lab extends Model
{
    protected $table = "lab";
    protected $fillable = ["labName",'address'];
    protected $guarded = ["id"];

    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class);
    }

    public function doctors(): BelongsToMany
    {
        return $this->belongsToMany(Doctor::class);
    }
}