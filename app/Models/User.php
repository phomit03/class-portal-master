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
     * Capitalizes the first character of the string uppercase
     * to keep consistency
     *
     * @param String $value
     * @return string
     */
    public function setAvatarAttribute($value)
    {
        $this->attributes['avatar'] = ucwords($value);
    }

    /**
     * Capitalizes the first character of the string uppercase
     * to keep consistency
     *
     * @param String $value
     * @return string
     */
    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = ucwords($value);
    }

    /**
     * Capitalizes the first character of the string uppercase
     * to keep consistency
     *
     * @param String $value
     * @return string
     */
    public function setLastNameAttribute($value)
    {
        $this->attributes['last_name'] = ucwords($value);
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
     * Many-to-many relationship between users and classes
     *
     * @return Response
     */
    public function classes()
    {
        return $this->belongsToMany(Classes::class, "classes_users","user_id","class_id");
    }

    /**
     * Many-to-many relationship between users and messages
     *
     * @return Response
     */
    public function messages()
    {
        return $this->belongsToMany(Message::class, "messages_user","user_id","message_id");
    }

    /**
     * Result that has many to this class
     *
     * @return Response
     */

    public function results()
    {
        return $this->hasMany('App\Models\Result');
    }

    /**
     * Issue that has many to this class
     *
     * @return Response
     */

    public function issues()
    {
        return $this->hasMany('App\Models\Issue');
    }


}
