<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <h5 style="text-align: center">Report On Sizes</h5>
    <table>
        <thead>
            <tr>
                <th scope="col">Ser No</th>
                <th scope="col">Size</th>
                <th scope="col">Description</th>
            </tr>
        </thead>
        <tbody>
            @php
            $sl=1;
            @endphp
            @foreach ($sizes as $size)
            <tr>
                <th scope="row">{{ $sl++ }}</th>
                <td>{{ $size->title ?? '' }}</td>
                <td>{{ $size->description ?? 'No Description Set' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
