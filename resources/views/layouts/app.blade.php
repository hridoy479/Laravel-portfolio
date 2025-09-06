<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'CodeCraft | Laravel Developer')</title>
    
    @vite('resources/css/app.css')
    
    <link href="https://fonts.googleapis.com/css2?family=Fira+Code:wght@300;400;500;600;700&family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    
    <style>
        .gradient-bg {
            background: linear-gradient(to bottom, #05070c, #0a0e17);
        }
        .hero-pattern {
            background-image: radial-gradient(circle at center, rgba(255, 45, 32, 0.1) 0%, transparent 70%);
        }
        .blog-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 50px -12px rgba(255, 45, 32, 0.25);
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background-color: #ff2d20;
            transition: width 0.3s;
        }
        .nav-link:hover::after {
            width: 100%;
        }
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #0f172a; }
        ::-webkit-scrollbar-thumb { background: #334155; border-radius: 4px; }
        ::-webkit-scrollbar-thumb:hover { background: #475569; }
    </style>

    @stack('head')
</head>
<body class="bg-gray-900 text-gray-100 font-sans antialiased">

    <!-- Header -->
    <!-- Header -->
<!-- Header -->
<header 
    class="fixed w-full bg-gray-900/90 backdrop-blur-md z-50 border-b border-gray-800" 
    x-data="{ open: false }"
>
    <nav class="container mx-auto px-4 py-3 flex justify-between items-center">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="text-2xl font-bold font-mono">
            <span class="text-red-500">&lt;</span>CodeCraft<span class="text-red-500">/&gt;</span>
        </a>

        <!-- Desktop Menu -->
        <div class="hidden md:flex space-x-8">
            <a href="{{ route('home') }}" class="nav-link relative text-gray-300 hover:text-white">Home</a>
            <a href="{{ route('projects.index') }}" class="nav-link relative text-gray-300 hover:text-white">Projects</a>
            <a href="{{ route('blogs.index') }}" class="nav-link relative text-gray-300 hover:text-white">Blog</a>
            <a href="{{ route('about') }}" class="nav-link relative text-gray-300 hover:text-white">About</a> {{-- Updated link --}}
            <a href="#contact" class="nav-link relative text-gray-300 hover:text-white">Contact</a>
        </div>

        <!-- CTA (Desktop only) -->
        <div class="hidden md:block">
            <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md font-medium transition">
                Get in Touch
            </button>
        </div>

        <!-- Hamburger (Mobile only) -->
        <button 
            @click="open = !open" 
            class="md:hidden text-gray-300 hover:text-white focus:outline-none"
        >
            <!-- Bars / Close -->
            <i x-show="!open" class="fa-solid fa-bars text-2xl"></i>
            <i x-show="open" class="fa-solid fa-xmark text-2xl"></i>
        </button>
    </nav>

    <!-- Mobile Menu -->
    <div 
        x-show="open" 
        x-transition 
        class="md:hidden absolute top-full left-0 w-full bg-gray-900 border-t border-gray-800"
    >
        <div class="px-6 py-6 space-y-6 flex flex-col">
            <a href="{{ route('home') }}" class="text-lg text-gray-300 hover:text-red-500">Home</a>
            <a href="{{ route('projects.index') }}" class="text-lg text-gray-300 hover:text-red-500">Projects</a>
            <a href="{{ route('blogs.index') }}" class="text-lg text-gray-300 hover:text-red-500">Blog</a>
            <a href="{{ route('about') }}" class="text-lg text-gray-300 hover:text-red-500">About</a> {{-- Updated link --}}
            <a href="#contact" class="text-lg text-gray-300 hover:text-red-500">Contact</a>
            <button class="w-full bg-red-500 hover:bg-red-600 text-white px-4 py-3 rounded-md font-medium">
                Get in Touch
            </button>
        </div>
    </div>
</header>


    <!-- Main Content -->
    <main class="pt-20">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 border-t border-gray-800 pt-12 pb-8">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
                <div>
                    <h3 class="text-xl font-bold mb-4">
                        <span class="text-red-500">&lt;</span>CodeCraft<span class="text-red-500">/&gt;</span>
                    </h3>
                    <p class="text-gray-400">Crafting exceptional web experiences with Laravel and modern web technologies.</p>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-4">Navigation</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-red-500 transition">Home</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-red-500 transition">Projects</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-red-500 transition">Blog</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-red-500 transition">About</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-red-500 transition">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-4">Services</h4>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-red-500 transition">Laravel Development</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-red-500 transition">API Development</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-red-500 transition">Vue.js Development</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-red-500 transition">Consulting</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-bold mb-4">Connect</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-red-500 transition text-xl"><i class="fab fa-github"></i></a>
                        <a href="#" class="text-gray-400 hover:text-red-500 transition text-xl"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-red-500 transition text-xl"><i class="fab fa-linkedin"></i></a>
                        <a href="#" class="text-gray-400 hover:text-red-500 transition text-xl"><i class="fab fa-dev"></i></a>
                    </div>
                </div>
            </div>
            <div class="text-center text-gray-500 text-sm">
                <p>&copy; 2025 CodeCraft. All rights reserved. Crafted with Laravel and Tailwind CSS.</p>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>