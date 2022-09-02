<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;
    protected $table = 'subjects';
    protected $primaryKey = 'id';
    protected $keyType ='integer';

    protected $fillable = [
        'name', 'description'
    ];


    /**
     * Capitalizes the first character of the string uppercase
     * to keep consistency
     *
     * @param String $value
     * @return string
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucwords($value);
    }

    /**
     * Apply formatting to the description attribute to keep
     * consistency when saved to the database
     *
     * @param String $value
     * @return string
     */
    public function setDescriptionAttribute($value)
    {
        $this->attributes['description'] = ucfirst($value);
    }



    /**
     * Many-to-many relationship between classes and subjects
     *
     * @return Response
     */
    public function classes()
    {
        return $this->belongsToMany(Classes::class,"classes_subjects","subject_id","class_id");
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
     * Assignment that has many to this class
     *
     * @return Response
     */

    public function assignments()
    {
        return $this->hasMany('App\Models\Assignment');
    }

}
