<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    use HasFactory;

    protected $fillable = [
        'sender_id',
        'conversation_id',
        'receiver_id',
        'message',
      
    ];

    // relations 

    public function Convertations()
    {
        return $this->belongsTo(Conversation::class);
    }
    public function User()
    {
        return $this->belongsTo(User::class , 'sender_id');
    }
}
