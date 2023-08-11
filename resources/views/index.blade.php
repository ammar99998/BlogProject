<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <style>
table ,tr,td{
    border:1px solid black;
}

    </style>
</head>
<body>
    <h1>this is index page which i created it</h1>
    <table >
        @php
        $i=0;
    @endphp
    <tr>
        <th scope="row">NO.</th>
        <th scope="row">name</th>
        <th scope="row">age</th>
        <th scope="row">phone</th>
        <th scope="row">pictuer</th>
    </tr>

        @foreach($emp as $item)
        <tr>
            <td scope="row">{{++$i}}</td>
            <td>{{$item->name_emp}} </td>
            <td>{{$item->age}} </td>
            <td>{{$item->phone}} </td>
            <td>
                 <img src={{$item->photo}} alt="{{$item->photo}}" width="100" height="100">
            </td>
        </tr>

        @endforeach

    </table>
    <div>


        {{$emp->links()}}

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</body>
</html>
