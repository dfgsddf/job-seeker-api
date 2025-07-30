<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'job_post_id',
        'is_applied',
        'applied_at'
    ];

    protected $casts = [
        'is_applied' => 'boolean',
        'applied_at' => 'datetime',
    ];

    // العلاقات
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jobPost()
    {
        return $this->belongsTo(JobPost::class);
    }

    // Scopes
    public function scopeApplied($query)
    {
        return $query->where('is_applied', true);
    }

    public function scopeNotApplied($query)
    {
        return $query->where('is_applied', false);
    }
} 