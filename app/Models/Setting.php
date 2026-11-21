<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [

        'site_name',
        'tagline',

        'logo',
        'favicon',
        'logo_small',

        'email',
        'phone',
        'address',

        'facebook_url',
        'instagram_url',
        'linkedin_url',
        'youtube_url',
        'tiktok_url',
        'twitter_url',
        'threads_url',
        'telegram_url',
        'whatsapp_url',

        'meta_title',
        'meta_description',

        'google_verification',

        'ga4_id',

        'statcounter_code',

        'footer_text',
    ];
}
