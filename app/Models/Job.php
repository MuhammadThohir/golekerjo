<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Job extends Model
{
    protected $table = 'job_posts';
    protected $fillable = [
        'title',
        'slug',
        'company',
        'logo',
        'category_id',
        'education',
        'experience',
        'gender',
        'location',
        'address',
        'salary_min',
        'salary_max',
        'description',
        'requirements',
        'contact_email',
        'contact_phone',
        'is_premium',
        'status',
        'expired_at',
        'views',
        'user_id'
    ];

    protected $casts = [
        'expired_at' => 'date',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
