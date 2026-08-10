<nav style="background-color: #855885; padding: 15px 30px; display: flex; justify-content: space-between; align-items: center; direction: rtl; font-family: Arial, sans-serif; box-shadow: 0 2px 5px rgba(0,0,0,0.1);">
    
    {{-- العنوان (الجهة اليمنى) --}}
    <span style="font-size: 28px; color: white; font-weight: bold;">
        مدونتي
    </span>

    {{-- الروابط (الجهة اليسرى) --}}
    <div style="display: flex; gap: 15px; align-items: center;">
        <a href="{{ route('posts.index') }}" 
           style="color: white; text-decoration: none; font-size: 18px; padding: 8px 15px; border-radius: 6px; transition: 0.3s;">
            الرئيسية
        </a>
        <a href="{{ route('posts.create') }}" 
           style="color: white; text-decoration: none; font-size: 18px; padding: 8px 15px; border-radius: 6px; background-color: rgba(255,255,255,0.2); transition: 0.3s;">
            إضافة مقال
        </a>
    </div>

</nav>