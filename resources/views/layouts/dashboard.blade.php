<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard | CodeCraft')</title>

    @vite('resources/css/app.css')

    <!-- Alpine.js -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    {{-- <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/envi9619huze2xr1erzgolmcb7rfponcwtd4b6vylo4nmo6u/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script> --}}
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script> --}} {{-- Removed this line --}}
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body { font-family: 'Inter', sans-serif; }

        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #1e293b; }
        ::-webkit-scrollbar-thumb { background: #334155; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #475569; }

        .sidebar-link:hover, .sidebar-link.active {
            background-color: #ff2d20;
            color: white;
        }
    </style>

    @stack('head')
</head>
<body class="bg-gray-900 text-gray-100 flex">

    <!-- Sidebar -->
    <aside x-data="{ open: true }" class="bg-gray-800 w-64 min-h-screen transition-all duration-300" :class="{'-translate-x-64': !open, 'translate-x-0': open}" >
        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-700">
            <h1 class="text-2xl font-bold text-red-500">&lt;CodeCraft/&gt;</h1>
            <button @click="open = !open" class="text-gray-400 md:hidden">
                <i class="fas fa-bars"></i>
            </button>
        </div>

        <nav class="mt-6 px-2">
            <a href="{{ route('dashboard') }}" class="sidebar-link block px-4 py-3 rounded-md mb-2 text-gray-300 transition duration-200">
                <i class="fas fa-tachometer-alt mr-2"></i> Dashboard
            </a>
            <a href="{{ route('dashboard.project')  }}" class="sidebar-link block px-4 py-3 rounded-md mb-2 text-gray-300 transition duration-200">
                <i class="fas fa-rocket mr-2"></i> Projects
            </a>
            <a href="{{ route('admin.blog.index') }}" class="sidebar-link block px-4 py-3 rounded-md mb-2 text-gray-300 transition duration-200">
                <i class="fas fa-newspaper mr-2"></i> Blog
            </a>
            <a href="{{ route('admin.users.index') }}" class="sidebar-link block px-4 py-3 rounded-md mb-2 text-gray-300 transition duration-200">
                <i class="fas fa-users mr-2"></i> Users
            </a>
            <a href="{{ route('admin.settings.index') }}" class="sidebar-link block px-4 py-3 rounded-md mb-2 text-gray-300 transition duration-200">
                <i class="fas fa-cog mr-2"></i> Settings
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col min-h-screen">
        <!-- Topbar -->
        <header class="flex items-center justify-between bg-gray-900 px-6 py-4 border-b border-gray-700">
            <h2 class="text-xl font-semibold">@yield('header', 'Dashboard')</h2>
            <div class="flex items-center space-x-4">
                <form action="{{ route('admin.search.index') }}" method="GET" class="flex items-center">
                    <input type="text" name="query" placeholder="Search..." class="bg-gray-800 text-gray-200 px-3 py-2 rounded-md focus:outline-none focus:ring-2 focus:ring-red-500">
                    <button type="submit" class="ml-2 bg-red-500 hover:bg-red-600 px-3 py-2 rounded-md text-white font-medium transition">
                        <i class="fas fa-search"></i> Search
                    </button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-600 px-4 py-2 rounded-md font-medium transition">
                        Log Out
                    </button>
                </form>
            </div>
        </header>

        <!-- Content -->
        <main class="flex-1 p-6 bg-gray-900">
            @yield('content')
        </main>
    </div>

    @stack('scripts')
</body>
</html>
