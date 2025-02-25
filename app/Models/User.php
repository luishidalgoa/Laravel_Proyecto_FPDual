<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasProfilePhoto, Notifiable, TwoFactorAuthenticatable;

    /**
     * Los atributos que son asignables en masa.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * Los atributos que deben estar ocultos para la serialización.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * Los atributos que se deben anexar al array del modelo.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Conversiones de tipos para los atributos.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relación con el modelo Professor.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function professor()
    {
        return $this->hasOne(Professor::class);
    }

    /**
     * Relación con el modelo Note.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    /**
     * Configuración del boot del modelo.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        // Eliminar relaciones asociadas al eliminar el usuario
        static::deleting(function ($user) {
            // Eliminar el profesor asociado si existe
            if ($user->professor) {
                $user->professor->delete();
            }

            // Eliminar todas las notas asociadas
            $user->notes()->delete();
        });
    }
}