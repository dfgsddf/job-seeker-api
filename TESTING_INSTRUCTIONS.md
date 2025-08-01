# تعليمات اختبار النظام

## ✅ المشكلة تم حلها!

تم إصلاح مشكلة عدم ظهور الطلبات في صفحة "طلباتي". المشكلة كانت في:

1. **عدم إرسال التوكن مع طلب التقديم**
2. **عدم حماية مسار التقديم بالمصادقة**

## 🔧 الإصلاحات المطبقة:

### 1. حماية مسار التقديم
```php
// في routes/api.php
Route::post('/jobs/{jobId}/apply', [JobApplicationController::class, 'submitApplication'])->middleware('auth:sanctum');
```

### 2. إرسال التوكن مع طلب التقديم
```javascript
// في resources/views/job-application.blade.php
const token = localStorage.getItem('authToken');
if (token) {
    headers['Authorization'] = `Bearer ${token}`;
}
```

### 3. إجبار المصادقة في الخادم
```php
// في JobApplicationController@submitApplication
$userId = Auth::id();
if (!$userId) {
    return response()->json(['message' => 'يجب تسجيل الدخول أولاً'], 401);
}
```

## 🧪 كيفية اختبار النظام:

### الخطوة 1: تسجيل الدخول
1. اذهب إلى: `http://127.0.0.1:8000/login`
2. سجل دخول بـ:
   - البريد الإلكتروني: `testuser5@example.com`
   - كلمة المرور: `password123`

### الخطوة 2: التقديم على وظيفة
1. اذهب إلى: `http://127.0.0.1:8000/job-app`
2. اختر أي وظيفة واضغط "تقدم الآن"
3. املأ النموذج بجميع البيانات المطلوبة
4. ارفع ملف PDF للسيرة الذاتية
5. اضغط "إرسال الطلب"

### الخطوة 3: التحقق من الطلب
1. اذهب إلى: `http://127.0.0.1:8000/my-applications`
2. ستجد طلبك معروض مع تفاصيل الوظيفة

## ✅ النتائج المتوقعة:

- ✅ سيتم إرسال الطلب بنجاح
- ✅ سيظهر الطلب في صفحة "طلباتي"
- ✅ سيتم ربط الطلب بالمستخدم المسجل دخول
- ✅ ستظهر تفاصيل الوظيفة مع الطلب

## 🔍 للتحقق من أن النظام يعمل:

يمكنك استخدام المستخدم التجريبي الذي تم إنشاؤه:
- البريد: `testuser5@example.com`
- كلمة المرور: `password123`

هذا المستخدم لديه طلب واحد تم تقديمه بنجاح ويمكن رؤيته في صفحة "طلباتي".

## 📝 ملاحظات مهمة:

1. **يجب تسجيل الدخول أولاً** قبل التقديم على أي وظيفة
2. **يجب رفع ملف PDF** للسيرة الذاتية
3. **يجب ملء جميع الحقول المطلوبة** في النموذج
4. **رسالة التقديم يجب أن تكون 100 حرف على الأقل**

---

**🎉 النظام الآن يعمل بشكل صحيح!** 