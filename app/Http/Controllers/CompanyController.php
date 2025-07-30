<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\JobPost;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Company::active()
            ->withCount('jobPosts')
            ->get();

        return response()->json([
            'companies' => $companies
        ]);
    }

    public function show($id)
    {
        $company = Company::findOrFail($id);
        $jobs = JobPost::where('company_name', $company->name)
            ->active()
            ->latest('published_at')
            ->get();

        return response()->json([
            'company' => $company,
            'jobs' => $jobs,
            'jobs_count' => $jobs->count()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'industry' => 'required|string',
            'location' => 'required|string',
            'website' => 'nullable|url',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'employee_count' => 'nullable|integer'
        ]);

        $company = Company::create($request->all());

        return response()->json([
            'message' => 'تم إنشاء الشركة بنجاح',
            'company' => $company
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $company = Company::findOrFail($id);

        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string',
            'industry' => 'sometimes|required|string',
            'location' => 'sometimes|required|string',
            'website' => 'nullable|url',
            'email' => 'nullable|email',
            'phone' => 'nullable|string',
            'employee_count' => 'nullable|integer'
        ]);

        $company->update($request->all());

        return response()->json([
            'message' => 'تم تحديث الشركة بنجاح',
            'company' => $company
        ]);
    }

    public function destroy($id)
    {
        $company = Company::findOrFail($id);
        $company->delete();

        return response()->json([
            'message' => 'تم حذف الشركة بنجاح'
        ]);
    }
} 