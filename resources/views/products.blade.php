<!DOCTYPE html>
<html>
<head>
    <title>قائمة المنتجات</title>
    <style>
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: right; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>جميع المنتجات</h1>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>الاسم</th>
                <th>السعر</th>
                <th>التصنيف</th>
                <th>تاريخ الإضافة</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->price }} ريال</td>
                <td>{{ $product->category->name ?? 'بدون تصنيف' }}</td>
                <td>{{ $product->created_at->format('Y-m-d') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>