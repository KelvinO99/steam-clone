<!-- resources/views/search/results.blade.php -->

<html>
<head>
    <title>Search Results</title>
</head>
<body>
    <h1>Search Results</h1>

    @foreach ($results as $result)
        <p>{{ $result->name }}</p>
    @endforeach
</body>
</html>
