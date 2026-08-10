@extends('layout.app')

@section('title', 'تعديل المقال')

@section('content')
<div class="container" style="max-width: 600px; margin: 40px auto; padding: 0 20px;">
    <h1 style="margin-bottom: 30px;">✏️ تعديل المقال</h1>
    
    {{-- نرسل البيانات إلى نفس الرابط مع PUT --}}
    <form action="/posts/{{ $post->id }}" method="POST" style="background: #f9f9f9; padding: 30px; border-radius: 12px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        @csrf
        @method('PUT') {{-- هذه أهم خطوة! --}}
        
        <div style="margin-bottom: 20px;">
            <label for="title" style="display: block; font-weight: bold; margin-bottom: 5px;">العنوان</label>
            {{-- old() تحافظ على القيمة الجديدة لو حصل خطأ في التحقق --}}
            <input type="text" name="title" id="title" required 
                   value="{{ old('title', $post->title) }}"
                   style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 8px; font-size: 1rem;">
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="body" style="display: block; font-weight: bold; margin-bottom: 5px;">المحتوى</label>
            <textarea name="body" id="body" rows="6" required 
                      style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 8px; font-size: 1rem; resize: vertical;">{{ old('body', $post->body) }}</textarea>
        </div>
        
        <div style="display: flex; gap: 10px;">
            <button type="submit" style="background: #2196F3; color: white; padding: 10px 24px; border: none; border-radius: 8px; font-size: 1rem; cursor: pointer;">
                 تحديث
            </button>
            <a href="/posts" style="background: #f44336; color: white; padding: 10px 24px; text-decoration: none; border-radius: 8px;">
                 إلغاء
            </a>
        </div>
    </form>
</div>
@endsection