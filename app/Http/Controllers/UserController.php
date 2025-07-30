<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // ✅ عرض كل المستخدمين
    public function index()
    {
        return response()->json(User::all());
    }

    // ✅ عرض مستخدم حسب ID
    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    // ✅ إنشاء مستخدم جديد مع تحقق من البيانات
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
        ]);

        $user = User::create($validated);

        return response()->json([
            'message' => 'User created',
            'user' => $user
        ], 201);
    }
}
