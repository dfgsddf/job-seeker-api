<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\JobPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = Favorite::with('jobPost')
            ->where('user_id', Auth::id())
            ->get();

        return response()->json([
            'favorites' => $favorites,
            'count' => $favorites->count(),
            'applied_count' => $favorites->where('is_applied', true)->count()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'job_post_id' => 'required|exists:job_posts,id'
        ]);

        $favorite = Favorite::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'job_post_id' => $request->job_post_id
            ],
            [
                'is_applied' => false
            ]
        );

        return response()->json([
            'message' => 'تم إضافة الوظيفة إلى المفضلة',
            'favorite' => $favorite->load('jobPost')
        ]);
    }

    public function destroy($id)
    {
        $favorite = Favorite::where('user_id', Auth::id())
            ->where('job_post_id', $id)
            ->firstOrFail();

        $favorite->delete();

        return response()->json([
            'message' => 'تم إزالة الوظيفة من المفضلة'
        ]);
    }

    public function toggleApplied($id)
    {
        $favorite = Favorite::where('user_id', Auth::id())
            ->where('job_post_id', $id)
            ->firstOrFail();

        $favorite->update([
            'is_applied' => !$favorite->is_applied,
            'applied_at' => !$favorite->is_applied ? now() : null
        ]);

        return response()->json([
            'message' => $favorite->is_applied ? 'تم تحديث حالة التقديم' : 'تم إلغاء حالة التقديم',
            'favorite' => $favorite->load('jobPost')
        ]);
    }

    public function clearAll()
    {
        Favorite::where('user_id', Auth::id())->delete();

        return response()->json([
            'message' => 'تم مسح جميع الوظائف المفضلة'
        ]);
    }
} 