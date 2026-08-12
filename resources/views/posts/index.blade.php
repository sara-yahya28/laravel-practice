@extends('layout.app')

@section('title', 'جميع المقالات')

@section('content')
{{-- إضافة CSS لتثبيت الـ Navbar وإزالة الهوامش --}}
<style>
    /* إزالة الهوامش من الصفحة */
    body {
        margin: 0;
    }
</style>

<div class="container" style="max-width: 800px; margin: 0 auto; padding: 0 20px;">
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 30px; margin-top: 0;">
        <h1> جميع المقالات</h1>
        <a href="{{ route('posts.create') }}" style="background: #4CAF50; color: white; padding: 8px 16px; text-decoration: none; border-radius: 8px;">
             إضافة مقال
        </a>
    </div>

    @forelse ($posts as $post)
        <article style="background: #f9f9f9; border-radius: 12px; padding: 20px; margin-bottom: 20px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
<a href="{{ route('posts.show', $post->id) }}" style="text-decoration: none; color: #333;">
    <h2 style="margin-top: 0; color: #333;">{{ $post->title }}</h2>
</a>      
      <p style="color: #555; line-height: 1.6;">{{ $post->body }}</p>
            
            <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 15px; border-top: 1px solid #ddd; padding-top: 10px;">
                <span style="color: #777; font-size: 0.9rem;">
                     كتب بواسطة: <strong>{{ $post->user->name }}</strong>
                </span>
                
                <div style="display: flex; gap: 10px;">
                    {{-- زر التعديل --}}
                    <a href="{{ route('posts.edit', $post->id) }}" style="color: #2196F3; text-decoration: none; font-size: 0.9rem;"> تعديل</a>
                    
                    {{-- زر الحذف (رابط لصفحة التأكيد) --}}
                    <a href="{{ route('posts.delete', $post->id) }}" 
                       style="color: #f44336; text-decoration: none; font-size: 0.9rem;">
                         حذف
                    </a>
                </div>
            </div>
        </article>
    @empty
        <div style="text-align: center; padding: 60px 20px; background: #f9f9f9; border-radius: 12px;">
            <p style="font-size: 1.2rem; color: #999;">📭 عفوًا، لا توجد أي مقالات مضافة حاليًا.</p>
            <a href="{{ route('posts.create') }}" style="display: inline-block; margin-top: 15px; background: #4CAF50; color: white; padding: 10px 20px; text-decoration: none; border-radius: 8px;">
                 أضف أول مقال
            </a>
        </div>
    @endforelse
</div>
@endsection