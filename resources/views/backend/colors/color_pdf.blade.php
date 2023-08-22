<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        table{
            border-collapse: collapse;
            width: 100%;
        }

        table, th, td, tr{
            border: 1px solid;
        }
    </style>
</head>
<body>

    <h5 style="text-align: center">Report On Colors</h5>
    <table>
        <thead>
            <tr>
                <th scope="col">Ser No</th>
                <th scope="col">Color</th>
            </tr>
        </thead>
        <tbody>
            @php
            $sl=1;
            @endphp
            @foreach ($colors as $color)
            <tr>
                <th scope="row">{{ $sl++ }}</th>
                <td>{{ $color->title ?? '' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
