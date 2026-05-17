<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
    <script src="https://cdn.tailwindcss.com"></script>
    @yield('styles')
</head>

<body>
    <header class="bg-gray-50">
        <div class="max-w-4xl mx-auto px-4 py-5">
            <h1 class="text-xl font-medium text-gray-800">@yield('title')</h1>
        </div>
    </header>

    @if (session('success'))
        <div class="max-w-4xl mx-auto px-4 mt-4">
            <p class="text-green-800 bg-green-50 border border-green-100 p-3 rounded">{{ session('success') }}</p>
        </div>
    @endif

    <main class="max-w-4xl mx-auto px-4 mt-6">
        @yield('content')
    </main>
</body>

</html>