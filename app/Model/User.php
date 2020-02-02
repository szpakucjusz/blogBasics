<?php

namespace App\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use phpDocumentor\Reflection\Types\Self_;

class User extends Authenticatable
{
    use Notifiable;

    public const TABLE_NAME = 'user';

    protected $table = self::TABLE_NAME;

    public const ROLE_DEFAULT = 'default';

    public const ROLE_EDITOR = 'editor';

    public const ROLE_ADMIN = 'admin';

    public static function getUserAllRoles(): array
    {
        return [self::ROLE_DEFAULT, self::ROLE_EDITOR, self::ROLE_ADMIN];
    }

    public static function getUserPrivilegesRoles(): array
    {
        return [self::ROLE_EDITOR, self::ROLE_ADMIN];
    }

    public static function hasAdminRole(string $role): bool
    {
        return $role === User::ROLE_ADMIN;
    }

    public static function hasEditorRole(string $role): bool
    {
        return in_array($role, self::getUserPrivilegesRoles());
    }

    public static function getUserRolesString(): string
    {
        return self::ROLE_DEFAULT . ',' . self::ROLE_EDITOR . ',' . self::ROLE_ADMIN;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
