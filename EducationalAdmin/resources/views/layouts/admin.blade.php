{{-- resources/views/layouts/admin.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white">
            <div class="p-4">
                <div class="navbar-brand-logo">📚</div>
                <h1 class="text-2xl font-bold">Admin Dashboard</h1>
            </div>
            <nav class="mt-4">
                <a href="{{ route('admin.dashboard') }}" class="block py-2 px-4 hover:bg-gray-700">Dashboard</a>
                <a href="{{ route('admin.modules.index') }}" class="block py-2 px-4 hover:bg-gray-700">Modules</a>
                <a href="{{ route('admin.users.index') }}" class="block py-2 px-4 hover:bg-gray-700">Students</a>
                <a href="{{ route('admin.teachers.index') }}" class="block py-2 px-4 hover:bg-gray-700">Teachers</a>
            </nav>
        </div>
        
        <!-- Main Content -->
        <div class="flex-1 overflow-auto">
            <header class="bg-white shadow">
                <div class="px-4 py-4 flex justify-between items-center">
                    <h2 class="text-xl font-semibold text-gray-800">@yield('title')</h2>
                    <div class="flex items-center space-x-4">
                        <span>{{ Auth::user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-red-600 hover:text-red-800">Logout</button>
                        </form>
                    </div>
                </div>
            </header>
            <main class="p-6">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>