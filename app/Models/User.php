<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
/* use Illuminate\Database\Eloquent\Relations\HasOne; */

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'avatar',
        'name',
        'last_name',
        'role',
        'email',
        'password',
        'phone',
        'county',
        'cin',
        'license',
        'subject',
        'work_status',
        'name_school',
        'confirmed',
        'block'
    ];

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
        'password' => 'hashed',
    ];
   /**
    * Get all of the event for the User
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
   public function event(): HasMany
   {
       return $this->hasMany(event::class);
   }

   /**
 * Get all of the Todo for the User
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function todo(): HasMany
{
    return $this->hasMany(Todo::class);
}


   public function Calender(): HasMany
   {
       return $this->hasMany(Calender::class);
   }

   public function events()
   {
    return $this->belongsToMany(event::class, 'folows');
   }





/**
 * A user can have many messages
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
public function messages(): HasMany
{
  return $this->hasMany(Message::class);
}

}
