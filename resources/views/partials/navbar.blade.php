<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        /*Start navbar */
        :root{
            --primary-color:#855885;
        }
.navbar {
    width: 100%;
    padding: 10px 20px;
    display: flex;
    justify-content: flex-start;  /* التعديل هنا (بدلاً من space-between) */
    align-items: center;
    background-color: var(--primary-color);
    box-sizing: border-box;
}
.navbar__logo {
    width: 50px;
    border-radius: 100%;
    flex-shrink: 0;
}

/* القائمة الرئيسية */
.navbar__menu {
    display: flex;
    gap: 12px;
    list-style: none;
    align-items: center;
    margin: 0 auto;         
    padding: 0;
    order: 2; 
}

/* زر ساهم معنا */
.cta {
    text-decoration: none;
    color: var(--text-light);
    border: 2px solid var(--accent-color);
    border-radius: 12px;
    padding: 8px 14px;
    transition: all 0.3s ease;
    display: inline-block;
    white-space: nowrap;
    flex-shrink: 0;
    order: 3; 
}

.navbar__toggle {
    order: 4;
}

.navbar__checkbox {
    display: none;
}

/* الروابط والعناوين */
.navbar__link {
    text-decoration: none;
    color: var(--text-light);
    padding: 6px 10px;
    border-radius: 8px;
    transition: all 0.3s ease;
    display: inline-block;
    white-space: nowrap;
    font-size: 0.95rem;
}

.navbar__link:hover,
.cta:hover {
    background-color: #4CAF50;
    border-radius: 10px;
}

/* Dropdown Container */
.navbar__link--dropdown {
    position: relative;
}

/* Dropdown Menu Base Styles */
.navbar__dropdown {
    display: none;
    position: absolute;
    top: 100%;
    right: 50%;
    transform: translateX(50%);
    background-color: var(--primary-color);
    min-width: 180px;
    height: auto;
    padding: 10px 0;
    margin: 0;
    list-style: none;
    border-radius: 10px;
    box-shadow: 0px 8px 16px rgba(0, 0, 0, 0.2);
    z-index: 100;
}

/* إظهار القائمة عند التمرير */
.navbar__link--dropdown:hover .navbar__dropdown {
    display: flex;
    flex-direction: column;
    gap: 5px;
}

/* تنسيق عناصر القائمة المنسدلة */
.navbar__dropdown li a {
    display: block;
    padding: 10px 15px;
    color: var(--text-light);
    text-decoration: none;
    white-space: nowrap;
    text-align: center;
    transition: background 0.3s;
}

.navbar__dropdown li a:hover {
    background-color: var(--primary-light);
}

/* ------------------------------------------------ */
/*  الشاشات المتوسطة والتابلت (مابين 768px و 1150px)  */
/* ------------------------------------------------ */
@media (max-width: 1150px) and (min-width: 769px) {
    .navbar {
        padding: 10px 10px;
    }

    .navbar__menu {
        gap: 6px;
        margin-right: 15px; /* تقليل المسافة المقتطعة في الشاشات المتوسطة حتى يستمر الشكل متناسق */
    }

    .navbar__link {
        padding: 5px 6px;
        font-size: 0.85rem;
    }

    .cta {
        padding: 6px 10px;
        font-size: 0.85rem;
    }
}

/* ------------------------------------------------ */
/* --- قائمة الموبايل / الهمبرجر (أقل من 768px) --- */
/* ------------------------------------------------ */
@media (max-width: 768px) {
    .navbar__menu {
        flex-direction: column;
        width: 100%;
        order: 5;
        margin-right: 0; /* إلغاء التباعد في الموبايل لتتوسط القائمة بالشكل المطلوب */
    }

    .cta {
        margin-right: 0;
        order: 2;
    }

    .navbar__link {
        font-size: 1rem;
    }

    .navbar__link--dropdown {
        width: 100%;
        text-align: center;
    }

    .navbar__dropdown {
        position: relative;
        top: 0;
        right: 0;
        transform: none;
        box-shadow: none;
        background-color: rgba(0, 0, 0, 0.1);
        width: 100%;
        margin-top: 5px;
    }
}
    </style>
</head>
<body>
    <nav class="navbar">
        <a href="index.html"><img src="images/logo.webp" alt="شعار الصندوق" class="navbar__logo"></a>
        <!-- كود القائمة لشاشات الجوال (Hamburger Menu) -->
    <input type="checkbox" id="menu-toggle" class="navbar__checkbox">
    <a href="contribute.html" class="cta">ساهم معنا</a>
    <label for="menu-toggle" class="navbar__toggle">
        <span></span>
        <span></span>
        <span></span>
    </label>
        <ul class="navbar__menu">
            <li><a href="index.html" class="navbar__link">الرئيسية</a></li>
            <li><a href="village.html" class="navbar__link">عن القرية</a></li>
            <li><a href="team.html" class="navbar__link">عن الفريق</a></li>
            <li class="navbar__link navbar__link--dropdown">
                <a href="projects.html" class="navbar__link">المشاريع</a>
                <ul class="navbar__dropdown">
                    <li><a href="solidarity.html" class="navbar__link">المشاريع التكافلية</a></li>
                    <li><a href="projects.html" class="navbar__link">المشاريع التنموية</a></li>
                </ul>
            </li>
            <li><a href="news.html" class="navbar__link navbar__link--active">الاخبار</a></li>
            <li><a href="governance.html" class="navbar__link">الحوكمة</a></li>
            <li><a href="contact.html" class="navbar__link">تواصل معنا</a></li>
            <li><a href="about.html" class="navbar__link">عن الصندوق</a></li>
        </ul>
    </nav>
</body>
</html>