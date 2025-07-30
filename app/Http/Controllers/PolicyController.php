<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Policy;

class PolicyController extends Controller
{
    /**
     * عرض جميع السياسات النشطة
     */
    public function index()
    {
        try {
            $policies = Policy::active()->ordered()->get();
            
            return response()->json([
                'success' => true,
                'policies' => $policies
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ في جلب السياسات',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * عرض سياسة محددة
     */
    public function show($id)
    {
        try {
            $policy = Policy::findOrFail($id);
            
            if (!$policy->is_active) {
                return response()->json([
                    'success' => false,
                    'message' => 'هذه السياسة غير متاحة'
                ], 404);
            }
            
            return response()->json([
                'success' => true,
                'policy' => $policy
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'لم يتم العثور على السياسة',
                'error' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * عرض السياسات حسب النوع
     */
    public function getByType($type)
    {
        try {
            $policies = Policy::active()->byType($type)->ordered()->get();
            
            return response()->json([
                'success' => true,
                'policies' => $policies,
                'type' => $type
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ في جلب السياسات',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * عرض سياسة الاسترداد
     */
    public function getRefundPolicy()
    {
        try {
            $refundPolicy = Policy::active()->byType('refund')->first();
            
            if (!$refundPolicy) {
                return response()->json([
                    'success' => false,
                    'message' => 'سياسة الاسترداد غير متاحة'
                ], 404);
            }
            
            return response()->json([
                'success' => true,
                'policy' => $refundPolicy
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ في جلب سياسة الاسترداد',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * عرض سياسة الخصوصية
     */
    public function getPrivacyPolicy()
    {
        try {
            $privacyPolicy = Policy::active()->byType('privacy')->first();
            
            if (!$privacyPolicy) {
                return response()->json([
                    'success' => false,
                    'message' => 'سياسة الخصوصية غير متاحة'
                ], 404);
            }
            
            return response()->json([
                'success' => true,
                'policy' => $privacyPolicy
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ في جلب سياسة الخصوصية',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * عرض شروط الاستخدام
     */
    public function getTermsOfService()
    {
        try {
            $termsPolicy = Policy::active()->byType('terms')->first();
            
            if (!$termsPolicy) {
                return response()->json([
                    'success' => false,
                    'message' => 'شروط الاستخدام غير متاحة'
                ], 404);
            }
            
            return response()->json([
                'success' => true,
                'policy' => $termsPolicy
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ في جلب شروط الاستخدام',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * عرض سياسة التطبيقات
     */
    public function getApplicationsPolicy()
    {
        try {
            $applicationsPolicy = Policy::active()->byType('applications')->first();
            
            if (!$applicationsPolicy) {
                return response()->json([
                    'success' => false,
                    'message' => 'سياسة التطبيقات غير متاحة'
                ], 404);
            }
            
            return response()->json([
                'success' => true,
                'policy' => $applicationsPolicy
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ في جلب سياسة التطبيقات',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * إنشاء سياسة جديدة (للمديرين فقط)
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'content' => 'required|string',
                'type' => 'required|string|in:privacy,terms,applications,refund',
                'icon' => 'nullable|string',
                'order' => 'nullable|integer|min:0',
                'is_active' => 'boolean'
            ]);

            $policy = Policy::create($request->all());

            return response()->json([
                'success' => true,
                'message' => 'تم إنشاء السياسة بنجاح',
                'policy' => $policy
            ], 201);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ في إنشاء السياسة',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * تحديث سياسة موجودة (للمديرين فقط)
     */
    public function update(Request $request, $id)
    {
        try {
            $policy = Policy::findOrFail($id);

            $request->validate([
                'title' => 'sometimes|required|string|max:255',
                'content' => 'sometimes|required|string',
                'type' => 'sometimes|required|string|in:privacy,terms,applications,refund',
                'icon' => 'nullable|string',
                'order' => 'nullable|integer|min:0',
                'is_active' => 'boolean'
            ]);

            $policy->update($request->all());

            return response()->json([
                'success' => true,
                'message' => 'تم تحديث السياسة بنجاح',
                'policy' => $policy
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ في تحديث السياسة',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * حذف سياسة (للمديرين فقط)
     */
    public function destroy($id)
    {
        try {
            $policy = Policy::findOrFail($id);
            $policy->delete();

            return response()->json([
                'success' => true,
                'message' => 'تم حذف السياسة بنجاح'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ في حذف السياسة',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
