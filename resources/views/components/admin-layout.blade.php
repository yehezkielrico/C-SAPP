<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ darkMode: localStorage.getItem('darkMode') !== 'false', mobileOpen: false, desktopOpen: true }" x-init="$watch('darkMode', val => localStorage.setItem('darkMode', val))" :class="{ 'dark': darkMode }">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }} - Admin</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased" :class="{ 'bg-gray-100 text-gray-900': !darkMode, 'bg-[#070A13] text-gray-100': darkMode }">
    <div class="min-h-screen">
        <!-- Sidebar (desktop) -->
        <div x-cloak x-show="desktopOpen"
            x-transition:enter="transform transition-transform duration-200"
            x-transition:enter-start="-translate-x-72"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transform transition-transform duration-200"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="-translate-x-72"
            class="hidden md:block fixed inset-y-0 left-0 w-72 bg-white/80 dark:bg-[#1A2333]/20 backdrop-blur-sm border-r border-gray-200 dark:border-gray-800 z-50">
            <div class="flex items-center justify-between h-16 px-6 border-b border-gray-800">
                <div class="flex items-center">
                    <div class="relative">
                        <div class="absolute -inset-1">
                            <div class="w-full h-full mx-auto opacity-30 blur-lg filter bg-gradient-to-r from-blue-600 to-blue-500"></div>
                        </div>
                        <svg class="relative w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                    </div>
                    <span class="ml-3 text-xl font-bold text-gray-900 dark:text-white">Admin Panel</span>
                    <!-- Sidebar toggle (inside sidebar header, next to logo) -->
                    <button @click="desktopOpen = !desktopOpen" aria-label="Toggle sidebar" class="ml-3 md:inline-flex items-center justify-center p-1 rounded-md hover:bg-gray-100 dark:hover:bg-[#1A2333]/50" style="z-index:10002;">
                        <svg x-show="desktopOpen" class="w-4 h-4 text-gray-700 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        <svg x-show="!desktopOpen" class="w-4 h-4 text-gray-700 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
            @include('components.admin-sidebar-links')
        </div>

        <!-- Mobile Sidebar (overlay) -->
        <div x-cloak x-show="mobileOpen" @keydown.window.escape="mobileOpen = false" class="md:hidden fixed inset-0" style="z-index: 9999;">
            <div class="absolute inset-0 bg-black/40" @click="mobileOpen = false" style="z-index: 9999;"></div>
            <div class="absolute inset-y-0 left-0 w-72 bg-dark dark:bg-[#0b1220] backdrop-blur-sm border-r border-gray-200 dark:border-gray-800 p-4 overflow-y-auto" @click.away="mobileOpen = false" style="z-index: 10000;">
                <!-- reuse nav content -->
                <div class="flex items-center h-16 px-2 border-b border-gray-800">
                    <div class="flex items-center">
                        <svg class="w-8 h-8 text-blue-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                        </svg>
                        <span class="ml-1 text-lg font-bold">Admin Panel</span>
                    </div>
                </div>
                <nav class="mt-4">
                    <div class="px-2 space-y-2">
                        @include('components.admin-sidebar-links')
                    </div>
                </nav>
            </div>
        </div>

        <!-- Main Content -->
        <div :class="desktopOpen ? 'md:ml-72 ml-0' : 'md:ml-0 ml-0'">
            <!-- Top Navigation -->
            <div class="bg-white/80 dark:bg-[#1A2333]/30 backdrop-blur-sm border-b border-gray-200 dark:border-gray-800 sticky top-0 z-40">
                <div class="relative flex items-center justify-between h-16 px-4 md:px-8">
                    <!-- Mobile hamburger -->
                    <div class="flex items-center md:hidden">
                        <button @click="mobileOpen = !mobileOpen" aria-label="Toggle sidebar" style="position: relative; z-index: 10001;" class="p-2 rounded-md bg-transparent hover:bg-gray-100 dark:hover:bg-[#1A2333]/50">
                            <svg class="w-6 h-6 text-gray-900 dark:text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>
                    <!-- Desktop sidebar toggle (absolute, always visible on md+) -->
                    <div class="hidden md:block absolute left-4 top-1/2 transform -translate-y-1/2">
                        <button @click="desktopOpen = !desktopOpen" aria-label="Toggle desktop sidebar" class="p-2 rounded-md hover:bg-gray-100 dark:hover:bg-[#1A2333]/50" style="position: relative; z-index: 10002;">
                            <svg x-show="desktopOpen" class="w-5 h-5 text-gray-100 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                            <svg x-show="!desktopOpen" class="w-5 h-5 text-gray-100 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>

                    <!-- Persistent open button when sidebar is closed -->
                    <div x-cloak x-show="!desktopOpen" class="hidden md:block">
                        <div class="fixed left-2 top-4 z-50">
                            <button @click="desktopOpen = true" aria-label="Open sidebar" class="p-2 bg-blue-600 text-white rounded-md shadow-lg hover:bg-blue-700">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <div class="flex-1 flex items-center justify-end">
                    <div class="flex items-center space-x-4">
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="flex items-center space-x-3 focus:outline-none">
                                <div class="w-10 h-10 rounded-full bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center text-white font-bold">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </div>
                                <div class="hidden md:block text-left">
                                    <div class="text-sm font-medium text-gray-900 dark:text-gray-300">{{ Auth::user()->name }}</div>
                                    <div class="text-xs text-gray-600 dark:text-gray-400">Administrator</div>
                                </div>
                                <i class="fas fa-chevron-down text-gray-400"></i>
                            </button>

                            <!-- Dropdown Menu -->
                            <div x-show="open" 
                                 @click.away="open = false"
                                 class="absolute right-0 mt-2 w-48 rounded-md shadow-lg bg-dark dark:bg-[#1A2333] border border-gray-200 dark:border-gray-800"
                                 x-transition:enter="transition ease-out duration-100"
                                 x-transition:enter-start="transform opacity-0 scale-95"
                                 x-transition:enter-end="transform opacity-100 scale-100"
                                 x-transition:leave="transition ease-in duration-75"
                                 x-transition:leave-start="transform opacity-100 scale-100"
                                 x-transition:leave-end="transform opacity-0 scale-95"
                                 style="display: none; z-index: 100;">
                                <div class="py-1">
                                    <a href="{{ route('profile.edit') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#1A2333]/70 hover:text-gray-900 dark:hover:text-white">
                                        <i class="fas fa-user mr-2"></i>Profile
                                    </a>
                                    <a href="{{ route('admin.dashboard') }}" class="block px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#1A2333]/70 hover:text-gray-900 dark:hover:text-white">
                                        <i class="fas fa-tachometer-alt mr-2"></i>Dashboard
                                    </a>
                                    <div class="border-t border-gray-800 my-1"></div>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#1A2333]/70 hover:text-gray-900 dark:hover:text-white">
                                            <i class="fas fa-sign-out-alt mr-2"></i>Logout
                            </button>
                        </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Page Content -->
            <main class="p-8 relative z-0">
                <!-- Flash Messages -->
                @if (session('success'))
                    <div class="mb-6">
                        <div class="bg-green-500/20 border border-green-500/30 text-green-400 px-4 py-3 rounded-lg relative backdrop-blur-sm" role="alert">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                                <span class="block sm:inline">{{ session('success') }}</span>
                            </div>
                        </div>
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-6">
                        <div class="bg-red-500/20 border border-red-500/30 text-red-400 px-4 py-3 rounded-lg relative backdrop-blur-sm" role="alert">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                <span class="block sm:inline">{{ session('error') }}</span>
                            </div>
                        </div>
                    </div>
                @endif

                {{ $slot }}
            </main>
        </div>
    </div>

    @stack('scripts')
</body>
</html> 