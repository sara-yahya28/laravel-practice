@extends('layout.app')

@section('title', 'حذف المقال')

@section('content')
<div style="max-width: 600px; margin: 60px auto; padding: 30px; background: #fff; border-radius: 12px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); text-align: center;">
    
    <h2 style="color: #d32f2f; margin-bottom: 20px;">⚠️ تأكيد الحذف</h2>
    
    <p style="font-size: 18px; margin: 20px 0;">
        هل أنت متأكد من حذف المقال التالي؟
    </p>
    
    <div style="background: #f5f5f5; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
        <strong style="font-size: 18px;">{{ $post->title }}</strong>
    </div>
    
    <p style="color: #999; font-size: 14px; margin-bottom: 30px;">
        لا يمكن التراجع عن هذا الإجراء.
    </p>
    
    <div style="display: flex; gap: 15px; justify-content: center;">
        {{-- زر الحذف الفعلي --}}
        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" 
                    style="background: #d32f2f; color: white; padding: 10px 30px; border: none; border-radius: 8px; font-size: 16px; cursor: pointer;">
                نعم، احذف
            </button>
        </form>
        
        {{-- زر الإلغاء --}}
        <a href="{{ route('posts.index') }}" 
           style="background: #ccc; color: #333; padding: 10px 30px; text-decoration: none; border-radius: 8px; font-size: 16px;">
            إلغاء
        </a>
    </div>
</div>
@endsection