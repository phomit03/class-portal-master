<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $keyType ='integer';

    protected $fillable = [
        'avatar', 'first_name', 'last_name', 'email', 'password', 'role'
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
     * Capitalize the first character of the first name attribute
     * to keep consistency
     *
     * @param string $value
     * @return string
     */
    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = ucfirst($value);
    }

    /**
     * Capitalize the first character of the last name attribute
     * to keep consistency
     *
     * @param string $value
     * @return string
     */
    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = ucfirst($value);
    }

    /**
     * Make the email address all lowercase to keep consistency
     *
     * @param string $value
     * @return string
     */
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }

    /**
     * Many-to-many relationship between users and courses
     *
     * @return Response
     */
    public function classes()
    {
        return $this->belongsToMany('App\Models\Classes');
    }

    /**
     * Many-to-many relationship between users and messages
     *
     * @return Response
     */
    public function messages()
    {
        return $this->belongsToMany('App\Models\Message');
    }
}
