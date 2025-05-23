<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>Get</h3>
    {{ $get }}
    <h2>First</h2>
    {{ $first }}
    <h2>Value</h2>
    {{ $value }}
    <h2>Pluck</h2>
    {{ $pluck }}
    <h2>Where</h2>
    {{ $where }}
    <h2>orWhere</h2>
    {{ $orWhere }}
    <h2>limitWhere</h2>
    {{ $limitWhere }}
    {{-- {{ $insertOrderDetail }} --}}
    <h2>Order detail get</h2>
    {{ $getDetail}}

    {{-- {{ $updateData }} --}}
    {{ $deleteData }}
    <h2>Get detail, order by descending</h2>
    {{ $getOrderByDetail }}

    <h2>Paginate</h2>
    {{ $paginate }}

    <h2>sum</h2>
    {{ $sum }}

    <h2>count</h2>
    {{ $count }}

    <h2>avg</h2>
    {{ $avg }}

    <h2>max</h2>
    {{ $max }}

    <h2>min</h2>
    {{ $min }}

    <h2>Paginate count</h2>
    {{ $paginateCount }}
</body>
</html>