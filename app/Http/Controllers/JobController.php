<?php

namespace App\Http\Controllers;

use App\Models\JobPost;
use App\Models\Company;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index(Request $request)
    {
        $query = JobPost::active();

        // تطبيق الفلاتر
        if ($request->filled('location')) {
            $query->byLocation($request->location);
        }

        if ($request->filled('work_field')) {
            $query->byWorkField($request->work_field);
        }

        if ($request->filled('job_type')) {
            $query->byJobType($request->job_type);
        }

        if ($request->filled('from_date')) {
            $query->where('published_at', '>=', $request->from_date);
        }

        if ($request->filled('to_date')) {
            $query->where('published_at', '<=', $request->to_date);
        }

        $jobs = $query->latest('published_at')->paginate(12);

        return response()->json([
            'jobs' => $jobs,
            'filters' => $request->all()
        ]);
    }

    public function show($id)
    {
        $job = JobPost::findOrFail($id);
        
        return response()->json([
            'job' => $job,
            'related_jobs' => JobPost::where('company_name', $job->company_name)
                ->where('id', '!=', $id)
                ->limit(3)
                ->get()
        ]);
    }

    public function search(Request $request)
    {
        $query = JobPost::active();

        // تطبيق جميع الفلاتر
        $filters = $request->only([
            'location', 'work_field', 'job_type', 'qualification',
            'experience_years', 'gender', 'language', 'ad_type',
            'country_graduation', 'country_residence', 'salary'
        ]);

        foreach ($filters as $key => $value) {
            if (!empty($value)) {
                $query->where($key, $value);
            }
        }

        $jobs = $query->latest('published_at')->get();

        return response()->json([
            'jobs' => $jobs,
            'total' => $jobs->count(),
            'filters' => $filters
        ]);
    }
} 