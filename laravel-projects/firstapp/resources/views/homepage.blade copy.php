<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homepage</title>
</head>

<body>
    <h1>This is a blade template</h1>
    <p>sum of numbers {{ 2 + 2 }}</p>
    <p>The current year is {{ date('Y') }}</p>
    <ul>
        @foreach ($things as $thing)
            <li>{{ $thing }}</li>
        @endforeach
    </ul>
    <a href="/about"> Go to about page</a>
</body>

</html>
