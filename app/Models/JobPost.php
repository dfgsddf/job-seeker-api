<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'company_name',
        'location',
        'salary_range',
        'job_type',
        'work_field',
        'qualification',
        'experience_years',
        'gender',
        'language',
        'ad_type',
        'country_graduation',
        'country_residence',
        'is_active',
        'published_at'
    ];

    protected $casts = [
        'published_at' => 'datetime',
        'is_active' => 'boolean',
    ];

    // العلاقات
    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function applications()
    {
        return $this->hasMany(JobApplication::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'favorites');
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeByLocation($query, $location)
    {
        return $query->where('location', $location);
    }

    public function scopeByWorkField($query, $field)
    {
        return $query->where('work_field', $field);
    }

    public function scopeByJobType($query, $type)
    {
        return $query->where('job_type', $type);
    }
} 