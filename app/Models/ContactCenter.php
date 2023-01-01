<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactCenter extends Model
{
    use HasFactory;

    protected $table = 'contact_center';

    protected $fillable = [
        'alamat_kantor', 'no_tlp', 'alamat_email', 'alamat_website', 'chk_link_wa', 'link_wa'
    ];
}
