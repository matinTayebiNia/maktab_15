<?php

namespace App\Models;


use App\core\db\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use JetBrains\PhpStorm\Pure;

class User extends Model
{
    protected $fillable = [
        'name', 'lastname', 'password', 'National_Code', "type_user", "address"
    ];

    public function setPasswordAttribute($pass)
    {
        $this->attributes['password'] = password_hash($pass, PASSWORD_BCRYPT);
    }

    protected $hidden = ["password"];

    protected $guarded = ["id"];

    public function doctor(): HasOne
    {
        return $this->hasOne(Doctor::class);
    }

    public function admin(): HasOne
    {
        return $this->hasOne(Admin::class);
    }

    public function patient(): HasOne
    {
        return $this->hasOne(Patient::class);
    }

    public function TypeUser()
    {
        return $this->type_user;
    }

    #[Pure]
    public function getTypeUser(): string
    {
        return match ($this->TypeUser()) {
            "doctor" => "پزشک",
            "manager" => "ادمین",
            "patient" => "بیمار"
        };
    }
}