<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;


    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->id;
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'image_url' => $this->image_url,
            'gradebook_id' => $this->gradebook_id
        ];
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function gradebook(): HasOne
    {
        return $this->hasOne(Gradebook::class);
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'password_confirmation',
        'image_url',
        'gradebook_id',
    ];

    public static function scopeSearchByFirstName($query, $first_name)
    {
        if (!$first_name) {
            return $query;
        }
        return $query->where('first_name', 'like', "%$first_name%");
    }
    public static function scopeSearchByLastName($query, $last_name)
    {
        if (!$last_name) {
            return $query;
        }
        return $query->where('last_name', 'like', "%$last_name%");
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
