<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
    @yield('styles')
</head>
<body>
    <header>
        <h1>@yield('title')</h1>
    </header>
    <div>
        @if (session('success'))
            <p style="color: green;">{{ session('success') }}</p>
        @endif
    </div>
    <main>
        @yield('content')
    </main>
</body>
</html>