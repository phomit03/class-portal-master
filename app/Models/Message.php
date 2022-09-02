<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
    protected $table = 'messages';
    protected $primaryKey = 'id';
    protected $keyType ='integer';

    protected $fillable = [
      'title', 'message', 'from', 'to'
    ];

    /**
     * Format the title to keep consistency by
     * capitalizing the first character of every
     * word in the title
     *
     * @param String $value
     */
    public function setTitleAttribute($value)
    {
      $value = strtolower($value);
      $this->attributes['title'] = ucwords($value);
    }

    /**
     * Format the message to keep consistency by
     * capitalizing the first character in the string
     *
     * @param String $value
     */
    public function setMessageAttribute($value)
    {
      $this->attributes['message'] = ucfirst($value);
    }

    /**
     * Many-to-many relationship between users and messages
     *
     * @return Response
     */
    public function users()
    {
      return $this->belongsToMany(User::class, "messages_user","message_id","user_id");
    }
}
