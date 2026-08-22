<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('جميع المقالات') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    
                    {{-- زر إضافة مقال --}}
                    <div class="flex justify-between items-center mb-4">
                        <h1 class="text-2xl font-bold">قائمة المقالات</h1>
                        <a href="{{ route('posts.create') }}" 
                           class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-sm">
                            + إضافة مقال جديد
                        </a>
                    </div>

                    {{-- عرض المقالات --}}
                    @forelse ($posts as $post)
                        <div class="bg-gray-100 dark:bg-gray-700 rounded-lg p-4 mb-4">
                            <a href="{{ route('posts.show', $post->id) }}" 
                               class="text-blue-600 hover:text-blue-900 font-medium text-lg">
                                {{ $post->title }}
                            </a>
                            <p class="text-gray-600 dark:text-gray-300 mt-2">{{ Str::limit($post->body, 100) }}</p>
                            
                            <div class="flex justify-between items-center mt-3 pt-3 border-t border-gray-300 dark:border-gray-600">
                                <span class="text-sm text-gray-500"> بواسطة: {{ $post->user->name }}</span>
                                <div class="flex gap-2">
                                    <a href="{{ route('posts.edit', $post->id) }}" 
                                       class="bg-yellow-500 hover:bg-yellow-700 text-white text-sm px-3 py-1 rounded">
                                        تعديل
                                    </a>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                class="bg-red-500 hover:bg-red-700 text-white text-sm px-3 py-1 rounded"
                                                onclick="return confirm('هل أنت متأكد من حذف هذا المقال؟')">
                                            حذف
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-12">
                            <p class="text-gray-500 text-lg">📭 لا توجد مقالات حتى الآن</p>
                            <a href="{{ route('posts.create') }}" 
                               class="mt-4 inline-block bg-blue-500 hover:bg-blue-700 text-white px-4 py-2 rounded">
                                أضف أول مقال
                            </a>
                        </div>
                    @endforelse

                </div>
            </div>
        </div>
    </div>
</x-app-layout>