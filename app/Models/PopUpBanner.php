<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PopUpBanner extends Model
{
    use HasFactory;

    protected $table = 'pop_up_banner';
    protected $fillable = [
        'link_image_pop_up_banner', 'image_pop_up_banner', 'key_type_pop_up_banner', 'value_type_pop_up_banner'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['image_pop_up_banner_url'];

    /**
     * Get the
     *
     * @param  string  $value
     * @return string
     */
    public function getImagePopUpBannerUrlAttribute()
    {
        return url($this->image_pop_up_banner);
    }
}
