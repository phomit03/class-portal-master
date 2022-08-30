<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;
    protected $table = 'classes';
    protected $primaryKey = 'id';
    protected $keyType ='integer';

    protected $fillable = [
        'name', 'title', 'room', 'section', 'user_id'
    ];

    /**
     * Capitalizes the subject to keep consistency
     *
     * @param String $value
     * @return string
     */
    public function setSubjectAttribute($value)
    {
        $this->attributes['subject'] = strtoupper($value);
    }

    /**
     * Capitalizes the first character of the string uppercase
     * to keep consistency
     *
     * @param String $value
     * @return string
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = ucwords($value);
    }

    /**
     * Users that belong to this class
     *
     */
    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }

    /**
     * Assignments that belong to this class
     *
     */
    public function assignments()
    {
        return $this->hasMany('App\Models\Assignment');
    }

    /**
     * Annoucements that belong to this class
     *
     * @return Response
     */
    public function annoucements()
    {
        return $this->hasMany('App\Models\Annoucement');
    }
}
