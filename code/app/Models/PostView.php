<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostView extends Model
{
    use HasFactory;

    public $fillable = [
        'post_id',
        'ip_address'
    ];

    public function setIpAddressAttribute($value)
    {
        $this->attributes['ip_address'] = ip2long($value);
    }
}
