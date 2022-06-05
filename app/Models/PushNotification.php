<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PushNotification extends Model
{
    use HasFactory;

    protected $table = 'push_notification';

    protected $fillable = [
        'title_push_notification', 'deskripsi_push_notification'
    ];
}
