<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // تعديل جدول موجود (posts) وليس إنشاء جدول جديد
        Schema::table('posts', function (Blueprint $table) {
            // إضافة عمود user_id كـ Foreign Key
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
        // فقط احذف العمود، والمفتاح الأجنبي سيُحذف تلقائياً (إن كان موجوداً)
            $table->dropColumn('user_id');
        });
    }
};