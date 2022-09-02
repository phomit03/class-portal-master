<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class classes_subjects extends Model
{
    use HasFactory;
    protected $table = 'classes_subjects';
    protected $keyType ='integer';

    protected $fillable = [
        'user_id', 'class_id'
    ];
}
