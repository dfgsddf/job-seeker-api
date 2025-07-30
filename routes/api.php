<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PolicyController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::get('/message', function () {
    return response()->json(['message' => 'مرحبًا من واجهة برمجة التطبيقات']);
});

// Authentication routes
Route::post('/login', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required'
    ]);

    $user = \App\Models\User::where('email', $request->email)->first();
    
    if (!$user || !Hash::check($request->password, $user->password)) {
        return response()->json(['message' => 'بيانات غير صحيحة'], 401);
    }

    $token = $user->createToken('auth-token')->plainTextToken;
    
    return response()->json([
        'message' => 'تم تسجيل الدخول بنجاح',
        'token' => $token,
        'user' => $user
    ]);
});

Route::post('/register', function (Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6|confirmed'
    ]);

    $user = \App\Models\User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password)
    ]);

    $token = $user->createToken('auth-token')->plainTextToken;
    
    return response()->json([
        'message' => 'تم التسجيل بنجاح',
        'token' => $token,
        'user' => $user
    ]);
});

// Public routes
Route::get('/users', [UserController::class, 'index']);
Route::get('/users/{id}', [UserController::class, 'show']);
Route::post('/users', [UserController::class, 'store']);

// Job routes
Route::get('/jobs', [JobController::class, 'index']);
Route::get('/jobs/{id}', [JobController::class, 'show']);
Route::post('/jobs/search', [JobController::class, 'search']);
Route::post('/jobs/{jobId}/apply', [JobApplicationController::class, 'submitApplication']);
Route::get('/jobs/{jobId}/apply', [JobApplicationController::class, 'showApplicationForm']);

// Company routes
Route::get('/companies', [CompanyController::class, 'index']);
Route::get('/companies/{id}', [CompanyController::class, 'show']);
Route::post('/companies', [CompanyController::class, 'store']);
Route::put('/companies/{id}', [CompanyController::class, 'update']);
Route::delete('/companies/{id}', [CompanyController::class, 'destroy']);

// Dashboard routes
Route::get('/dashboard/stats', [DashboardController::class, 'getDashboardStats']);

// Policy routes
Route::get('/policies', [PolicyController::class, 'index']);
Route::get('/policies/privacy', [PolicyController::class, 'getPrivacyPolicy']);
Route::get('/policies/terms', [PolicyController::class, 'getTermsOfService']);
Route::get('/policies/refund', [PolicyController::class, 'getRefundPolicy']);
Route::get('/policies/applications', [PolicyController::class, 'getApplicationsPolicy']);
Route::get('/policies/{id}', [PolicyController::class, 'show']);
Route::get('/policies/type/{type}', [PolicyController::class, 'getByType']);

// Admin routes (for managing policies)
Route::post('/policies', [PolicyController::class, 'store']);
Route::put('/policies/{id}', [PolicyController::class, 'update']);
Route::delete('/policies/{id}', [PolicyController::class, 'destroy']);

// Protected routes (require authentication)
Route::middleware('auth:sanctum')->group(function () {
    // Favorite routes
    Route::get('/favorites', [FavoriteController::class, 'index']);
    Route::post('/favorites', [FavoriteController::class, 'store']);
    Route::delete('/favorites/{id}', [FavoriteController::class, 'destroy']);
    Route::patch('/favorites/{id}/toggle-applied', [FavoriteController::class, 'toggleApplied']);
    Route::delete('/favorites', [FavoriteController::class, 'clearAll']);
    
    // Job Application routes
    Route::get('/my-applications', [JobApplicationController::class, 'myApplications']);
    Route::get('/applications/{applicationId}/status', [JobApplicationController::class, 'applicationStatus']);
    Route::get('/applications/{applicationId}/resume', [JobApplicationController::class, 'downloadResume']);
    
    // Dashboard additional routes
    Route::post('/favorites/add', [DashboardController::class, 'addToFavorites']);
    Route::delete('/favorites/remove', [DashboardController::class, 'removeFromFavorites']);
    Route::get('/user/{userId}/favorites', [DashboardController::class, 'getUserFavorites']);
    Route::patch('/favorites/update-status', [DashboardController::class, 'updateApplicationStatus']);
    Route::get('/user/{userId}/stats', [DashboardController::class, 'getUserStats']);
});
