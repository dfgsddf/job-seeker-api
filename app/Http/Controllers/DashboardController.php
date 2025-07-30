<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JobApplication;
use App\Models\Favorite;
use App\Models\JobPost;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * الحصول على إحصائيات لوحة التحكم
     */
    public function getDashboardStats()
    {
        try {
            // إحصائيات التطبيقات المرسلة
            $sentApplications = JobApplication::count();
            
            // إحصائيات المشاهدات (محاكاة - يمكن ربطها بنظام تتبع حقيقي)
            $weeklyViews = JobPost::sum('views') + rand(5, 20); // إضافة عدد عشوائي للمحاكاة
            
            // إحصائيات الوظائف المحفوظة
            $savedJobs = Favorite::count();
            
            // إحصائيات إضافية
            $totalJobs = JobPost::where('is_active', true)->count();
            $totalCompanies = \App\Models\Company::where('is_active', true)->count();
            $totalUsers = User::count();
            
            return response()->json([
                'success' => true,
                'stats' => [
                    'sent_applications' => $sentApplications,
                    'weekly_views' => $weeklyViews,
                    'saved_jobs' => $savedJobs,
                    'total_jobs' => $totalJobs,
                    'total_companies' => $totalCompanies,
                    'total_users' => $totalUsers
                ]
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ في جلب الإحصائيات',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * إضافة وظيفة للمفضلة
     */
    public function addToFavorites(Request $request)
    {
        try {
            $request->validate([
                'job_id' => 'required|exists:job_posts,id',
                'user_id' => 'required|exists:users,id'
            ]);

            // التحقق من عدم وجود الوظيفة في المفضلة مسبقاً
            $existingFavorite = Favorite::where('user_id', $request->user_id)
                ->where('job_post_id', $request->job_id)
                ->first();

            if ($existingFavorite) {
                return response()->json([
                    'success' => false,
                    'message' => 'الوظيفة موجودة في المفضلة بالفعل'
                ], 400);
            }

            $favorite = Favorite::create([
                'user_id' => $request->user_id,
                'job_post_id' => $request->job_id,
                'is_applied' => false
            ]);

            return response()->json([
                'success' => true,
                'message' => 'تم إضافة الوظيفة إلى المفضلة بنجاح',
                'favorite' => $favorite
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ في إضافة الوظيفة للمفضلة',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * إزالة وظيفة من المفضلة
     */
    public function removeFromFavorites(Request $request)
    {
        try {
            $request->validate([
                'job_id' => 'required|exists:job_posts,id',
                'user_id' => 'required|exists:users,id'
            ]);

            $favorite = Favorite::where('user_id', $request->user_id)
                ->where('job_post_id', $request->job_id)
                ->first();

            if (!$favorite) {
                return response()->json([
                    'success' => false,
                    'message' => 'الوظيفة غير موجودة في المفضلة'
                ], 404);
            }

            $favorite->delete();

            return response()->json([
                'success' => true,
                'message' => 'تم إزالة الوظيفة من المفضلة بنجاح'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ في إزالة الوظيفة من المفضلة',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * الحصول على الوظائف المفضلة للمستخدم
     */
    public function getUserFavorites($userId)
    {
        try {
            $favorites = Favorite::with('jobPost')
                ->where('user_id', $userId)
                ->get();

            return response()->json([
                'success' => true,
                'favorites' => $favorites
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ في جلب الوظائف المفضلة',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * تحديث حالة التقديم على الوظيفة
     */
    public function updateApplicationStatus(Request $request)
    {
        try {
            $request->validate([
                'favorite_id' => 'required|exists:favorites,id',
                'is_applied' => 'required|boolean'
            ]);

            $favorite = Favorite::findOrFail($request->favorite_id);
            $favorite->update([
                'is_applied' => $request->is_applied,
                'applied_at' => $request->is_applied ? now() : null
            ]);

            return response()->json([
                'success' => true,
                'message' => $request->is_applied ? 
                    'تم تحديث حالة التقديم إلى "تم التقديم"' : 
                    'تم تحديث حالة التقديم إلى "لم يتم التقديم"',
                'favorite' => $favorite
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ في تحديث حالة التقديم',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * الحصول على إحصائيات المستخدم
     */
    public function getUserStats($userId)
    {
        try {
            $userApplications = JobApplication::where('user_id', $userId)->count();
            $userFavorites = Favorite::where('user_id', $userId)->count();
            $userAppliedJobs = Favorite::where('user_id', $userId)
                ->where('is_applied', true)
                ->count();

            return response()->json([
                'success' => true,
                'stats' => [
                    'applications' => $userApplications,
                    'favorites' => $userFavorites,
                    'applied_jobs' => $userAppliedJobs
                ]
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ في جلب إحصائيات المستخدم',
                'error' => $e->getMessage()
            ], 500);
        }
    }
} 