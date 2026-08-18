<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
// التحقق من صحة المدخلات المرسلة قبل البدء بأي عملية
        $request->validate([
            'email' => 'required|email', // حقل الإيميل مطلوب ويجب أن يكون بصيغة بريد إلكتروني صحيحة
            'password' => 'required',     // حقل كلمة المرور مطلوب
        ]);

        //محاولة مطابقة الإيميل والباسورد مع البيانات التابعة للمستخدم في قاعدة البيانات
        if (!Auth::attempt($request->only('email', 'password'))) {
            // 10. في حال كانت البيانات غير صحيحة، يرجع response بصيغة JSON مع رسالة خطأ وكود 401
            return response()->json(['message' => 'بيانات الدخول غير صحيحة'], 401);
        }

        //جلب بيانات المستخدم المطلوبة من قاعدة البيانات باستخدام الإيميل، أو إرجاع خطأ 404 لو لم يجد السجل
        $user = User::where('email', $request->email)->firstOrFail();

        // إنشاء رمز دخول جديد (Token) للمستخدم باستخدام Laravel Sanctum وتحويله لنص عادي
        $token = $user->createToken('auth_token')->plainTextToken;

        // إرجاع الرد النهائي للتطبيق أو لبرنامج Postman محتوياً على الـ Token
        return response()->json([
            'access_token' => $token, // النص الخاص بالـ Token لاستخدامه في الطلبات القادمة
            'token_type' => 'Bearer',  // نوع الـ Token المعتمد استاندارد (Bearer)
        ]);
    }
}
