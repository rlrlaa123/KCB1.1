<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'username', 'birth', 'gender',
    ];
    protected $dates = ['last_login'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function articles()
    {
        return $this->hasmany(Article::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function isAdmin()
    {
        return ($this->id === 1) ? true : false;
    }

    /**
     * @param string|array $roles
     */
    public function authorizeRoles($roles)
    {
        if (is_array($roles)) {
            return $this->hasAnyRole($roles) ||
                abort(401, 'This action is unauthorized.');
        }
        return $this->hasOneRole($roles) ||
            abort(401, 'This action is unauthorized.');
    }


    /**
     * Check multiple roles
     * @param array $roles
     */
    public function hasAnyRole($roles)
    {
        return null !== $this->roles()->whereIn('name', $roles)->first();
    }

    /**
     * Check one role
     * @param string $role
     */
    public function hasOneRole($role)
    {
        return null !== $this->roles()->where('name', $role)->first();
    }
    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return 1;
        } else {
            return 0;
        }
    }

    public function checkPremium($role)
    {
        if ($role == '6premium' || $role == '12premium') {
            return 1;
        } else {
            return 0;
        }
    }
}
