<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
    <table>
        <tr><td>{{$vendor['name']}} has added a new product under {{$category['category_name']}} category.</td></tr>
        <tr><td>Review this product on <a href="{{url('admin/add-edit-product/' . $product_id)}}">this link</a></td></tr>
        <tr><td>Approve this product on <a href="{{url('admin/products?product_code=' . $product_code)}}">this link</a></td></tr>
    </table>
</body>
</html>