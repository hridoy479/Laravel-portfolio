@extends('layouts.app')

@section('title', 'Home | CodeCraft')

@section('content')

<!-- Hero Section -->
<section id="home" class="gradient-bg min-h-screen flex items-center pt-16 pb-28 relative">
    <div class="hero-pattern absolute inset-0"></div>
    <div class="container mx-auto px-4 flex flex-col md:flex-row items-center relative z-10">
        <div class="md:w-1/2 mb-10 md:mb-0">
            <h1 class="text-4xl md:text-6xl font-bold leading-tight mb-6">
                Modern <span class="text-red-500">Laravel</span> Development<br>With Excellence
            </h1>
            <p class="text-xl text-gray-400 mb-8">
                Crafting high-performance web applications with clean code and modern practices. 
                Specializing in Laravel, Vue.js, and Tailwind CSS.
            </p>
            <div class="flex space-x-4">
                <button class="bg-red-500 hover:bg-red-600 text-white px-6 py-3 rounded-md font-medium transition transform hover:-translate-y-1">
                    View Projects
                </button>
                <button class="border border-gray-700 hover:border-red-500 text-white px-6 py-3 rounded-md font-medium transition">
                    Read Blog
                </button>
            </div>
        </div>
        <div class="md:w-1/2 flex justify-center">
            <div class="relative">
                <div class="absolute -inset-4 border border-red-500/30 rounded-xl rotate-6"></div>
                <div class="absolute -inset-8 border border-red-500/10 rounded-xl rotate-3"></div>
                <div class="relative bg-gray-800 p-6 rounded-xl shadow-2xl">
                    <div class="flex space-x-2 mb-4">
                        <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                        <div class="w-3 h-3 bg-yellow-500 rounded-full"></div>
                        <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                    </div>
                    <pre class="font-mono text-sm">
<span class="text-blue-400">class</span> <span class="text-yellow-400">Developer</span> {
    <span class="text-blue-400">public</span> <span class="text-blue-400">function</span> <span class="text-green-400">skills</span>() {
        <span class="text-blue-400">return</span> [
            <span class="text-yellow-400">'Laravel'</span>,
            <span class="text-yellow-400">'Vue.js'</span>,
            <span class="text-yellow-400">'Tailwind CSS'</span>,
            <span class="text-yellow-400">'Livewire'</span>,
            <span class="text-yellow-400">'Alpine.js'</span>
        ];
    }
}</pre>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Blog Section -->
<section id="blog" class="py-20 bg-gray-900">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Latest <span class="text-red-500">Blog</span> Posts</h2>
            <p class="text-gray-400 max-w-2xl mx-auto">
                Sharing knowledge, insights, and tutorials about Laravel development, modern PHP practices, and full-stack development.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($blogs as $blog)
                <article class="blog-card bg-gray-800 rounded-xl overflow-hidden transition-all duration-300 hover:shadow-xl">
                    <!-- You can replace this with an image column from DB -->
                    <div class="h-48 bg-gradient-to-r from-red-500/20 to-blue-500/20 flex items-center justify-center">
                        <span class="text-5xl">📝</span>
                    </div>

                    <div class="p-6">
                        <div class="flex items-center text-sm text-gray-400 mb-4">
                            <span>{{ $blog->created_at->format('F d, Y') }}</span>
                            <span class="mx-2">•</span>
                            <span>{{ $blog->read_time }} min read</span>
                        </div>

                        <h3 class="text-xl font-bold mb-3">{{ $blog->title }}</h3>
                        <p class="text-gray-400 mb-4">{{ Str::limit($blog->content, 120) }}</p>

                        <a href="{{ route('blogs.show', $blog->id) }}" class="text-red-500 font-medium hover:text-red-400 flex items-center">
                            Read more
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                            </svg>
                        </a>
                    </div>
                </article>
            @endforeach
        </div>

        <div class="text-center mt-12">
            <a href="{{ route('blogs.index') }}" class="inline-flex items-center text-red-500 hover:text-red-400 font-medium">
                View all blog posts
                <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                </svg>
            </a>
        </div>
    </div>
</section>


<!-- Features Section -->
<section class="py-20 bg-gray-800">
    <div class="container mx-auto px-4">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold mb-4">Why <span class="text-red-500">Laravel</span>?</h2>
            <p class="text-gray-400 max-w-2xl mx-auto">Laravel is the PHP framework for modern web artisans, providing an elegant and expressive development experience.</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-gray-900 p-6 rounded-xl border border-gray-700 hover:border-red-500 transition">
                <div class="text-red-500 text-3xl mb-4">🚀</div>
                <h3 class="text-xl font-bold mb-3">Blazing Fast Performance</h3>
                <p class="text-gray-400">Laravel's optimized execution and caching mechanisms ensure your applications run at lightning speed.</p>
            </div>
            <div class="bg-gray-900 p-6 rounded-xl border border-gray-700 hover:border-red-500 transition">
                <div class="text-red-500 text-3xl mb-4">🛡️</div>
                <h3 class="text-xl font-bold mb-3">Robust Security</h3>
                <p class="text-gray-400">Built-in protection against SQL injection, CSRF, XSS, and other common security vulnerabilities.</p>
            </div>
            <div class="bg-gray-900 p-6 rounded-xl border border-gray-700 hover:border-red-500 transition">
                <div class="text-red-500 text-3xl mb-4">⚙️</div>
                <h3 class="text-xl font-bold mb-3">Elegant Ecosystem</h3>
                <p class="text-gray-400">From Forge to Vapor, Laravel's ecosystem provides a complete solution for deploying and managing applications.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 gradient-bg">
    <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Build Something <span class="text-red-500">Amazing</span>?</h2>
        <p class="text-xl text-gray-400 max-w-2xl mx-auto mb-10">Let's discuss how we can transform your ideas into a powerful Laravel application.</p>
        <button class="bg-red-500 hover:bg-red-600 text-white px-8 py-4 rounded-md font-medium text-lg transition transform hover:-translate-y-1">
            Start a Project
        </button>
    </div>
</section>

@endsection
