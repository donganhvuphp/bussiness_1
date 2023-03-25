<?php

namespace App\Modules\Admin\Account\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Plank\Mediable\Mediable;

class Admin extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Mediable;

    protected string $guard = 'admin';

    protected $hidden = ['password'];

    protected $fillable = [
        'name',
        'email',
        'password',
    ];
}
