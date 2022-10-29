<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PushNotificationInfo extends Model
{
    use HasFactory;

    protected $table = 'push_notificaton_info';

    protected $fillable = [
        'title_push_notification_info',
        'deskripsi_push_notification_info',
        'image_push_notification_info',
        'key_type',
        'value_type',
        'type_notification'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['image_push_notification_info_url'];

    /**
     * Get the
     *
     * @param  string  $value
     * @return string
     */
    public function getImagePushNotificationInfoUrlAttribute()
    {
        return url($this->image_push_notification_info);
    }


}
