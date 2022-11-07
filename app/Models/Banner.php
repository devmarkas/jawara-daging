<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $table = 'banner';

    protected $fillable = [
        'title', 'image_banner', 'key_type_banner', 'value_type_banner',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['image_banner_url'];

    /**
     * Get the
     *
     * @param  string  $value
     * @return string
     */
    public function getImageBannerUrlAttribute()
    {
        return url($this->image_banner);
    }
}
