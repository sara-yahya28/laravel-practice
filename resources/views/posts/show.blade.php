@extends('layout.app')

@section('title', $post->title)

@section('content')
<div style="max-width: 800px; margin: 20px auto; padding: 0 20px;">
    <a href="{{ route('posts.index') }}" style="display: inline-block; margin-bottom: 20px; color: #855885;">⬅ العودة</a>

    <article style="background: #f9f9f9; border-radius: 12px; padding: 30px; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
        <h1 style="margin-top: 0;">{{ $post->title }}</h1>

        {{-- الطوابع الزمنية --}}
        <div style="color: #777; font-size: 0.9rem; margin: 15px 0; padding-bottom: 15px; border-bottom: 1px solid #ddd;">
            <div>📅 تاريخ النشر: {{ $post->created_at->format('d/m/Y h:i A') }} ({{ $post->created_at->diffForHumans() }})</div>
            @if($post->created_at != $post->updated_at)
                <div>✏️ آخر تعديل: {{ $post->updated_at->format('d/m/Y h:i A') }} ({{ $post->updated_at->diffForHumans() }})</div>
            @endif
        </div>

        <div style="line-height: 1.8; white-space: pre-wrap;">{{ $post->body }}</div>

        <div style="margin-top: 20px; padding-top: 15px; border-top: 1px solid #ddd; color: #777;">
            كتب بواسطة: <strong>{{ $post->user->name }}</strong>
        </div>


        <div style="margin-top: 20px; display: flex; gap: 10px;">
            <a href="{{ route('posts.edit', $post->id) }}" style="background: #2196F3; color: white; padding: 8px 16px; text-decoration: none; border-radius: 6px;">تعديل</a>
<form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display: inline;">
    @csrf
    @method('DELETE')
    <button type="submit" onclick="return confirm('هل أنت متأكد؟')" 
            style="background: red;color: white;border: none;margin-top: 5px;padding: 5px 10px;border-radius: 5px;">
        حذف
    </button>
</form>
        </div>
    </article>
</div>
@endsection