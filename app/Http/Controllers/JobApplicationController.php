<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use App\Models\JobPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class JobApplicationController extends Controller
{
    public function showApplicationForm($jobId)
    {
        $job = JobPost::findOrFail($jobId);
        
        return response()->json([
            'job' => $job,
            'application_form' => [
                'personal_info' => [
                    'full_name' => '',
                    'email' => '',
                    'phone' => '',
                    'address' => '',
                    'city' => '',
                    'country' => ''
                ],
                'education' => [
                    'degree' => '',
                    'university' => '',
                    'graduation_year' => '',
                    'gpa' => ''
                ],
                'experience' => [
                    'years_of_experience' => '',
                    'current_position' => '',
                    'current_company' => '',
                    'previous_positions' => []
                ],
                'skills' => [],
                'cover_letter' => '',
                'resume' => null
            ]
        ]);
    }

    public function submitApplication(Request $request, $jobId)
    {
        try {
            \Log::info('Application submission started', ['job_id' => $jobId]);
            \Log::info('Request data:', $request->all());
            \Log::info('Files:', $request->allFiles());
            
            $request->validate([
                'full_name' => 'required|string|max:255',
                'email' => 'required|email',
                'phone' => 'required|string|max:20',
                'address' => 'required|string',
                'city' => 'required|string',
                'country' => 'required|string',
                'degree' => 'required|string',
                'university' => 'required|string',
                'graduation_year' => 'required|integer|min:1950|max:' . (date('Y') + 1),
                'gpa' => 'nullable|numeric|min:0|max:100|regex:/^\d+(\.\d{1,2})?$/',
                'years_of_experience' => 'required|integer|min:0',
                'current_position' => 'nullable|string',
                'current_company' => 'nullable|string',
                'skills' => 'required|string',
                'cover_letter' => 'required|string|min:100',
                'resume' => 'required|file|mimes:pdf,doc,docx|max:2048'
            ]);

            $job = JobPost::findOrFail($jobId);
            \Log::info('Job found', ['job_title' => $job->title]);
            
            // رفع الملف
            $resumePath = null;
            if ($request->hasFile('resume')) {
                $file = $request->file('resume');
                \Log::info('File details:', [
                    'name' => $file->getClientOriginalName(),
                    'size' => $file->getSize(),
                    'mime' => $file->getMimeType()
                ]);
                
                $resumePath = $file->store('resumes', 'public');
                \Log::info('Resume uploaded', ['path' => $resumePath]);
            } else {
                \Log::error('No resume file found in request');
                throw new \Exception('ملف السيرة الذاتية مطلوب');
            }

            // معالجة البيانات
            $skills = json_decode($request->skills, true);
            if (!is_array($skills) || empty($skills)) {
                throw new \Exception('يجب إضافة مهارة واحدة على الأقل');
            }
            
            // الحصول على المستخدم المسجل دخول
            $userId = Auth::id();
            if (!$userId) {
                return response()->json([
                    'message' => 'يجب تسجيل الدخول أولاً'
                ], 401);
            }
            
            // إنشاء طلب التقديم
            $application = JobApplication::create([
                'user_id' => $userId,
                'job_post_id' => $jobId,
                'status' => 'pending',
                'cover_letter' => $request->cover_letter,
                'resume_path' => $resumePath,
                'notes' => json_encode([
                    'personal_info' => [
                        'full_name' => $request->full_name,
                        'email' => $request->email,
                        'phone' => $request->phone,
                        'address' => $request->address,
                        'city' => $request->city,
                        'country' => $request->country
                    ],
                    'education' => [
                        'degree' => $request->degree,
                        'university' => $request->university,
                        'graduation_year' => $request->graduation_year,
                        'gpa' => $request->gpa
                    ],
                    'experience' => [
                        'years_of_experience' => $request->years_of_experience,
                        'current_position' => $request->current_position,
                        'current_company' => $request->current_company
                    ],
                    'skills' => $skills
                ])
            ]);

            \Log::info('Application created successfully', ['application_id' => $application->id]);

            return response()->json([
                'message' => 'تم إرسال طلب التقديم بنجاح',
                'application_id' => $application->id,
                'status' => 'pending'
            ], 201);
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            \Log::error('Validation failed', [
                'job_id' => $jobId,
                'errors' => $e->errors()
            ]);
            
            // تحسين رسائل الخطأ
            $errors = $e->errors();
            $customMessages = [];
            
            foreach ($errors as $field => $messages) {
                if ($field === 'gpa') {
                    $customMessages[$field] = ['المعدل التراكمي يجب أن يكون بين 0 و 100 (مثال: 88)'];
                } elseif ($field === 'graduation_year') {
                    $customMessages[$field] = ['سنة التخرج يجب أن تكون بين 1950 و ' . (date('Y') + 1)];
                } else {
                    $customMessages[$field] = $messages;
                }
            }
            
            return response()->json([
                'message' => 'بيانات غير صحيحة',
                'errors' => $customMessages
            ], 422);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            \Log::error('Job not found', ['job_id' => $jobId]);
            
            return response()->json([
                'message' => 'الوظيفة غير موجودة'
            ], 404);
        } catch (\Exception $e) {
            \Log::error('Application submission failed', [
                'job_id' => $jobId,
                'error' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            $errorMessage = 'حدث خطأ أثناء إرسال طلب التقديم';
            if (app()->environment('local')) {
                $errorMessage .= ': ' . $e->getMessage();
            }
            
            return response()->json([
                'message' => $errorMessage
            ], 500);
        }
    }

    public function myApplications()
    {
        $userId = Auth::id();
        if (!$userId) {
            $defaultUser = \App\Models\User::first();
            $userId = $defaultUser ? $defaultUser->id : 1;
        }
        
        $applications = JobApplication::with('jobPost')
            ->where('user_id', $userId)
            ->orderBy('created_at', 'desc')
            ->get();

        return response()->json([
            'applications' => $applications,
            'count' => $applications->count(),
            'status_counts' => [
                'pending' => $applications->where('status', 'pending')->count(),
                'reviewed' => $applications->where('status', 'reviewed')->count(),
                'accepted' => $applications->where('status', 'accepted')->count(),
                'rejected' => $applications->where('status', 'rejected')->count()
            ]
        ]);
    }

    public function applicationStatus($applicationId)
    {
        $userId = Auth::id();
        if (!$userId) {
            $defaultUser = \App\Models\User::first();
            $userId = $defaultUser ? $defaultUser->id : 1;
        }
        
        $application = JobApplication::with('jobPost')
            ->where('user_id', $userId)
            ->findOrFail($applicationId);

        return response()->json([
            'application' => $application,
            'status_info' => [
                'pending' => 'قيد المراجعة',
                'reviewed' => 'تمت المراجعة',
                'accepted' => 'مقبول',
                'rejected' => 'مرفوض'
            ]
        ]);
    }

    public function downloadResume($applicationId)
    {
        $userId = Auth::id();
        if (!$userId) {
            $defaultUser = \App\Models\User::first();
            $userId = $defaultUser ? $defaultUser->id : 1;
        }
        
        $application = JobApplication::where('user_id', $userId)
            ->findOrFail($applicationId);

        if (!$application->resume_path) {
            return response()->json(['error' => 'الملف غير موجود'], 404);
        }

        $path = storage_path('app/public/' . $application->resume_path);
        
        if (!file_exists($path)) {
            return response()->json(['error' => 'الملف غير موجود'], 404);
        }

        // استخراج اسم الملف الأصلي
        $filename = basename($application->resume_path);
        
        return response()->download($path, $filename, [
            'Content-Type' => 'application/octet-stream',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"'
        ]);
    }
} 