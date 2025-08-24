<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Fire Detection Platform')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col">
        <!-- Navbar -->
        <nav class="bg-white shadow p-4">
            <a href="{{ route('dashboard') }}" class="mr-4">Dashboard</a>
            <a href="{{ route('profile.edit') }}" class="mr-4">Profile</a>
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="text-red-600">Logout</button>
            </form>
        </nav>

        <!-- Content -->
        <main class="flex-1 p-6">
            @yield('content')
        </main>
    </div>
</body>
</html>
