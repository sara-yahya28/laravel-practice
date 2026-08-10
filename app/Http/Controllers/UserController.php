<?php

namespace App\Http\Controllers;

use App\Models\User; // استيراد النموذج
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * عرض قائمة جميع المستخدمين.
     */
    public function index()
    {
        // جلب كل المستخدمين من قاعدة البيانات
        $users = User::all();

        // عرض القالب مع تمرير البيانات
return view('user', compact('users'));    }

    /**
     * عرض نموذج إضافة مستخدم جديد.
     */
    public function create()
    {
        // عرض صفحة النموذج
        return view('users.create');
    }

    /**
     * حفظ مستخدم جديد في قاعدة البيانات.
     */
    public function store(Request $request)
    {
        // التحقق من صحة البيانات المدخلة
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:8',
        ]);

        // إنشاء المستخدم مع تشفير كلمة المرور
        $user = User::create([
            'name'     => $validated['name'],
            'email'    => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        // إعادة التوجيه إلى صفحة قائمة المستخدمين مع رسالة نجاح
        return redirect()->route('users.index')->with('success', 'تم إضافة المستخدم بنجاح!');
    }

    /**
     * عرض بيانات مستخدم محدد.
     */
    public function show(string $id)
    {
        // البحث عن المستخدم أو إرجاع خطأ 404
        $user = User::findOrFail($id);

        // عرض صفحة تفاصيل المستخدم
        return view('users.show', compact('user'));
    }

    /**
     * عرض نموذج تعديل مستخدم محدد.
     */
    public function edit(string $id)
    {
        // البحث عن المستخدم
        $user = User::findOrFail($id);

        // عرض نموذج التعديل مع بيانات المستخدم
        return view('users.edit', compact('user'));
    }

    /**
     * تحديث بيانات مستخدم محدد.
     */
    public function update(Request $request, string $id)
    {
        // البحث عن المستخدم
        $user = User::findOrFail($id);

        // التحقق من صحة البيانات (مع تجاهل البريد الإلكتروني الحالي)
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8',
        ]);

        // تحديث الحقول الأساسية
        $user->name  = $validated['name'];
        $user->email = $validated['email'];

        // إذا تم إدخال كلمة مرور جديدة، قم بتحديثها
        if (!empty($validated['password'])) {
            $user->password = bcrypt($validated['password']);
        }

        $user->save();

        // التوجيه إلى صفحة التفاصيل مع رسالة نجاح
        return redirect()->route('users.show', $user->id)->with('success', 'تم تحديث المستخدم بنجاح!');
    }

    /**
     * حذف مستخدم محدد.
     */
    public function destroy(string $id)
    {
        // البحث عن المستخدم وحذفه
        $user = User::findOrFail($id);
        $user->delete();

        // التوجيه إلى القائمة مع رسالة نجاح
        return redirect()->route('users.index')->with('success', 'تم حذف المستخدم بنجاح!');
    }
}