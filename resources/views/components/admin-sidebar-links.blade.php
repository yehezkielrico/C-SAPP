<nav class="mt-8">
    <div class="px-4 space-y-2">
        <a href="{{ route('admin.dashboard') }}" class="group flex items-center px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-blue-100 dark:bg-[#1A2333]/70 text-blue-700 dark:text-white' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#1A2333]/50' }}">
            <div class="relative">
                <div class="absolute -inset-1 {{ request()->routeIs('admin.dashboard') ? 'opacity-50' : 'opacity-0 group-hover:opacity-30' }} blur-lg filter bg-gradient-to-r from-blue-600 to-blue-500 transition-opacity duration-200"></div>
                <svg class="relative w-5 h-5 mr-3 {{ request()->routeIs('admin.dashboard') ? 'text-blue-500' : 'text-gray-400 group-hover:text-blue-500' }} transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
            </div>
            Dashboard
        </a>

        <a href="{{ route('admin.users.index') }}" class="group flex items-center px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('admin.users.*') ? 'bg-blue-100 dark:bg-[#1A2333]/70 text-blue-700 dark:text-white' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#1A2333]/50' }}">
            <div class="relative">
                <div class="absolute -inset-1 {{ request()->routeIs('admin.users.*') ? 'opacity-50' : 'opacity-0 group-hover:opacity-30' }} blur-lg filter bg-gradient-to-r from-blue-600 to-blue-500 transition-opacity duration-200"></div>
                <svg class="relative w-5 h-5 mr-3 {{ request()->routeIs('admin.users.*') ? 'text-blue-500' : 'text-gray-400 group-hover:text-blue-500' }} transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                </svg>
            </div>
            Pengguna
        </a>

        <a href="{{ route('admin.modules.index') }}" class="group flex items-center px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('admin.modules.*') ? 'bg-blue-100 dark:bg-[#1A2333]/70 text-blue-700 dark:text-white' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#1A2333]/50' }}">
            <div class="relative">
                <div class="absolute -inset-1 {{ request()->routeIs('admin.modules.*') ? 'opacity-50' : 'opacity-0 group-hover:opacity-30' }} blur-lg filter bg-gradient-to-r from-blue-600 to-blue-500 transition-opacity duration-200"></div>
                <svg class="relative w-5 h-5 mr-3 {{ request()->routeIs('admin.modules.*') ? 'text-blue-500' : 'text-gray-400 group-hover:text-blue-500' }} transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
            </div>
            Modul
        </a>

        <a href="{{ route('admin.quizzes.index') }}" class="group flex items-center px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('admin.quizzes.*') ? 'bg-blue-100 dark:bg-[#1A2333]/70 text-blue-700 dark:text-white' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#1A2333]/50' }}">
            <div class="relative">
                <div class="absolute -inset-1 {{ request()->routeIs('admin.quizzes.*') ? 'opacity-50' : 'opacity-0 group-hover:opacity-30' }} blur-lg filter bg-gradient-to-r from-blue-600 to-blue-500 transition-opacity duration-200"></div>
                <svg class="relative w-5 h-5 mr-3 {{ request()->routeIs('admin.quizzes.*') ? 'text-blue-500' : 'text-gray-400 group-hover:text-blue-500' }} transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
            </div>
            Kuis
        </a>

        <a href="{{ route('admin.simulations.index') }}" class="group flex items-center px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('admin.simulations.*') ? 'bg-blue-100 dark:bg-[#1A2333]/70 text-blue-700 dark:text-white' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#1A2333]/50' }}">
            <div class="relative">
                <div class="absolute -inset-1 {{ request()->routeIs('admin.simulations.*') ? 'opacity-50' : 'opacity-0 group-hover:opacity-30' }} blur-lg filter bg-gradient-to-r from-blue-600 to-blue-500 transition-opacity duration-200"></div>
                <svg class="relative w-5 h-5 mr-3 {{ request()->routeIs('admin.simulations.*') ? 'text-blue-500' : 'text-gray-400 group-hover:text-blue-500' }} transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
            </div>
            Simulasi
        </a>

        <a href="{{ route('admin.surveys.index') }}" class="group flex items-center px-4 py-3 rounded-lg transition-all duration-200 {{ request()->routeIs('admin.surveys.*') ? 'bg-blue-100 dark:bg-[#1A2333]/70 text-blue-700 dark:text-white' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-[#1A2333]/50' }}">
            <div class="relative">
                <div class="absolute -inset-1 {{ request()->routeIs('admin.surveys.*') ? 'opacity-50' : 'opacity-0 group-hover:opacity-30' }} blur-lg filter bg-gradient-to-r from-blue-600 to-blue-500 transition-opacity duration-200"></div>
                <svg class="relative w-5 h-5 mr-3 {{ request()->routeIs('admin.surveys.*') ? 'text-blue-500' : 'text-gray-400 group-hover:text-blue-500' }} transition-colors duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                </svg>
            </div>
            Survei
        </a>
    </div>
</nav>
