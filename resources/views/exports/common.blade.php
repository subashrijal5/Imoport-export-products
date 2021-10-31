<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title ?? ''}}</title>
</head>

<body>
    <table>
        <thead>
            <tr>
               @forelse ($columns as $column)
               @if ($column != 'id')
                <th>{{str_replace('_', ' ', ucfirst($column))}}</th>
               @endif
               @empty
                <th>No columns on this table</th>
               @endforelse
            </tr>
        </thead>
        <tbody>
            @forelse ($datas as$data)
            @foreach ($data as $key => $value)
                @if (in_array($key, $columns) && $key != 'id')
                    <th>{{$value ?? ''}}</th>
                @endif
            @endforeach
       @empty
       @endforelse
        </tbody>
    </table>
</body>

</html>
