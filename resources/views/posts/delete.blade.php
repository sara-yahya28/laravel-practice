<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('تأكيد الحذف') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 text-center">
                    
                    <h2 class="text-2xl font-bold text-red-600 mb-4">⚠️ تأكيد الحذف</h2>
                    
                    <p class="text-lg mb-4">هل أنت متأكد من حذف المقال التالي؟</p>
                    
                    <div class="bg-gray-100 dark:bg-gray-700 p-4 rounded-lg mb-4 inline-block">
                        <strong class="text-lg">{{ $post->title }}</strong>
                    </div>
                    
                    <p class="text-sm text-gray-500 mb-6">لا يمكن التراجع عن هذا الإجراء.</p>
                    
                    <div class="flex gap-4 justify-center">
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500">
                                نعم، احذف
                            </button>
                        </form>
                        
                        <a href="{{ route('posts.index') }}" 
                           class="inline-flex items-center px-4 py-2 bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-500">
                            إلغاء
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>