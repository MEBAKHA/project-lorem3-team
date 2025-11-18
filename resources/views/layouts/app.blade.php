<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard') - Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .sidebar-active {
            @apply bg-blue-600 text-white;
        }
        .transition-smooth {
            transition: all 0.3s ease;
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-gradient-to-b from-gray-900 to-gray-800 text-white transition-smooth" x-data="{ open: true }">
            <div class="p-6 border-b border-gray-700">
                <h1 class="text-2xl font-bold flex items-center gap-2">
                    <i class="fas fa-chart-line"></i> Admin Panel
                </h1>
                <p class="text-gray-400 text-sm mt-1">{{ config('app.name', 'Laravel') }}</p>
            </div>

            <nav class="p-4">
                <!-- Admin Links -->
                @if(auth()->check() && auth()->user()->role === 'admin')
                    <div class="space-y-2">
                        <a href="{{ route('admin.dashboard') }}" 
                           class="flex items-center gap-3 px-4 py-3 rounded-lg transition-smooth {{ request()->routeIs('admin.dashboard') ? 'sidebar-active bg-blue-600' : 'text-gray-300 hover:bg-gray-700' }}">
                            <i class="fas fa-gauge-high w-5"></i>
                            <span>Dashboard</span>
                        </a>
                        
                        <a href="{{ route('admin.users') }}"
                           class="flex items-center gap-3 px-4 py-3 rounded-lg transition-smooth {{ request()->routeIs('admin.users*') ? 'sidebar-active bg-blue-600' : 'text-gray-300 hover:bg-gray-700' }}">
                            <i class="fas fa-users w-5"></i>
                            <span>Users</span>
                        </a>
                    </div>
                @else
                    <!-- User Links -->
                    <div class="space-y-2">
                        <a href="{{ route('user.dashboard') }}"
                           class="flex items-center gap-3 px-4 py-3 rounded-lg transition-smooth {{ request()->routeIs('user.dashboard') ? 'sidebar-active bg-blue-600' : 'text-gray-300 hover:bg-gray-700' }}">
                            <i class="fas fa-home w-5"></i>
                            <span>Dashboard</span>
                        </a>
                        
                        <a href="{{ route('user.profile') }}"
                           class="flex items-center gap-3 px-4 py-3 rounded-lg transition-smooth {{ request()->routeIs('user.profile') ? 'sidebar-active bg-blue-600' : 'text-gray-300 hover:bg-gray-700' }}">
                            <i class="fas fa-user w-5"></i>
                            <span>Profile</span>
                        </a>
                    </div>
                @endif

                <hr class="my-6 border-gray-700">

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}" class="block">
                    @csrf
                    <button type="submit" class="w-full flex items-center gap-3 px-4 py-3 rounded-lg text-gray-300 hover:bg-red-600 hover:text-white transition-smooth">
                        <i class="fas fa-sign-out-alt w-5"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Top Navigation Bar -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4 flex justify-between items-center">
                    <h2 class="text-xl font-semibold text-gray-800">@yield('page-title', 'Dashboard')</h2>
                    <div class="flex items-center gap-6">
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="flex items-center gap-2 text-gray-700 hover:text-gray-900 transition">
                                <img src="https://ui-avatars.com/api/?name={{ auth()->user()->name }}&background=random" 
                                     class="w-10 h-10 rounded-full" alt="Profile">
                                <span class="hidden sm:inline">{{ auth()->user()->name }}</span>
                                <i class="fas fa-chevron-down text-sm"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 overflow-auto p-4 sm:p-6 lg:p-8">
                @if($errors->any())
                    <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                        <strong>Errors!</strong>
                        <ul class="mt-2 list-disc list-inside">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if(session('success'))
                    <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg flex items-center justify-between">
                        <span><i class="fas fa-check-circle mr-2"></i>{{ session('success') }}</span>
                        <button onclick="this.parentElement.style.display='none';" class="text-green-700 hover:text-green-900">&times;</button>
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
