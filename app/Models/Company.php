<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'industry',
        'location',
        'website',
        'email',
        'phone',
        'employee_count',
        'logo',
        'is_verified',
        'is_active'
    ];

    protected $casts = [
        'is_verified' => 'boolean',
        'is_active' => 'boolean',
    ];

    // العلاقات
    public function jobPosts()
    {
        return $this->hasMany(JobPost::class, 'company_name', 'name');
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeVerified($query)
    {
        return $query->where('is_verified', true);
    }

    public function scopeByIndustry($query, $industry)
    {
        return $query->where('industry', $industry);
    }

    public function scopeByLocation($query, $location)
    {
        return $query->where('location', $location);
    }
} 