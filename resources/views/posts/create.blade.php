@extends('layout.app')

@section('title', 'إضافة مقال جديد')

@section('body')
<div class="container" style="max-width: 600px; margin: 40px auto; padding: 0 20px;">
    <h1 style="margin-bottom: 30px;"> إضافة مقال جديد</h1>
    
    <form action="/posts" method="POST" style="background: #f9f9f9; padding: 30px; border-radius: 12px; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        @csrf
        
        <div style="margin-bottom: 20px;">
            <label for="title" style="display: block; font-weight: bold; margin-bottom: 5px;">العنوان</label>
            <input type="text" name="title" id="title" required 
                   style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 8px; font-size: 1rem;">
        </div>
        
        <div style="margin-bottom: 20px;">
            <label for="body" style="display: block; font-weight: bold; margin-bottom: 5px;">المحتوى</label>
            <textarea name="body" id="body" rows="6" required 
                      style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 8px; font-size: 1rem; resize: vertical;"></textarea>
        </div>
        
        <div style="display: flex; gap: 10px;">
            <button type="submit" style="background: #4CAF50; color: white; padding: 10px 24px; border: none; border-radius: 8px; font-size: 1rem; cursor: pointer;">
                 حفظ
            </button>
            <a href="/posts" style="background: #f44336; color: white; padding: 10px 24px; text-decoration: none; border-radius: 8px;">
                 إلغاء
            </a>
        </div>
    </form>
</div>
@endsection