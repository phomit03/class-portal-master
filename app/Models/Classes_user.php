<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classes_user extends Model
{
    use HasFactory;
    protected $table = 'classes_users';
    protected $primaryKey = 'id';
    protected $keyType ='integer';

    protected $fillable = [
        'user_id', 'class_id'
    ];
}
