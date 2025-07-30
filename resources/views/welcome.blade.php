<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Library(table-Model)</title>

    

</head>

<body>
    <h1>libri della tabella books che si rifersicono al model Book</h1>
    <ul>
        @foreach ($libri as $libro)
            <li>{{ $libro->name }}</li>
        @endforeach

    </ul>
    <h2>Oppure, se usi gli array invece che oggetti (ma Laravel Eloquent restituisce oggetti)</h2>
    <ul>
        @foreach ($libri as $libro)
            <li>TITOLO: {{ $libro['name'] }}  ANNO : {{ $libro['year'] }} </li>
        @endforeach

    </ul>



</body>

</html>
