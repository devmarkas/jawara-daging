<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BannerFooter extends Model
{
    use HasFactory;

    protected $table = 'banner_footer';

    protected $fillable = [
        'title_image_banner_footer', 'image_banner_footer', 'hide'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['image_banner_footer_url'];

    /**
     * Get the
     *
     * @param  string  $value
     * @return string
     */
    public function getImageBannerFooterUrlAttribute()
    {
        return url($this->image_banner_footer);
    }
}
