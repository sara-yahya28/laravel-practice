<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $post->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    <a href="{{ route('posts.index') }}" class="text-blue-600 hover:text-blue-900 inline-block mb-4">
                        ⬅ العودة
                    </a>

                    <article>
                        <h1 class="text-2xl font-bold">{{ $post->title }}</h1>

                        {{-- الطوابع الزمنية --}}
                        <div class="text-sm text-gray-500 mt-2 pb-3 border-b border-gray-300 dark:border-gray-700">
                            <div> تاريخ النشر: {{ $post->created_at->format('d/m/Y h:i A') }} ({{ $post->created_at->diffForHumans() }})</div>
                            @if($post->created_at != $post->updated_at)
                                <div> آخر تعديل: {{ $post->updated_at->format('d/m/Y h:i A') }} ({{ $post->updated_at->diffForHumans() }})</div>
                            @endif
                        </div>

                        <div class="mt-4 leading-relaxed whitespace-pre-wrap">{{ $post->body }}</div>

                        <div class="mt-4 pt-3 border-t border-gray-300 dark:border-gray-700 text-sm text-gray-500">
                             كتب بواسطة: <strong>{{ $post->user->name }}</strong>
                        </div>

                        <div class="mt-4 flex gap-2">
                            <a href="{{ route('posts.edit', $post->id) }}" 
                               class="bg-yellow-500 hover:bg-yellow-700 text-white px-4 py-2 rounded text-sm">
                                تعديل
                            </a>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="bg-red-500 hover:bg-red-700 text-white px-4 py-2 rounded text-sm"
                                        onclick="return confirm('هل أنت متأكد من حذف هذا المقال؟')">
                                    حذف
                                </button>
                            </form>
                        </div>
                    </article>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>