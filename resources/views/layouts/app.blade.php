<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Fire Detection Platform')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] flex p-6 lg:p-8 flex-row min-h-screen">
    <div class="min-h-screen flex flex-col">
        <!-- Navbar -->
        <nav class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18]  shadow p-4">
            <a href="{{ route('dashboard') }}" class=" text-white mr-4">Dashboard</a>
            <a href="{{ route('profile.edit') }}" class="text-white mr-4">Profile</a>
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
