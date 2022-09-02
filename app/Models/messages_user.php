<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class messages_user extends Model
{
    use HasFactory;
    protected $table = 'messages_user';
    protected $keyType ='integer';

    protected $fillable = [
        'message_id', 'class_id'
    ];
}
