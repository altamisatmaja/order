<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    test render eloquent
    <h3>get by id</h3>
    {{ $getById }}
    <h3>get all</h3>
    {{ $getAll }}
    <h3>Where</h3>
    {{ $where }}
    <h3>paginate</h3>
    {{$paginate}}
    <h3>join table</h3>
    {{$joinTable}}
    <h3>order with direct join</h3>
    {{$order1WithJoin}}
</body>

</html>
