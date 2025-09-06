@extends('layouts.app')

@section('title', 'About Us | CodeCraft')

@section('content')
<div class="container mx-auto px-4 py-16">
    <div class="max-w-4xl mx-auto text-center">
        <h1 class="text-5xl font-extrabold text-white mb-6 leading-tight">
            Crafting Digital Experiences with Passion
        </h1>
        <p class="text-lg text-gray-300 mb-10">
            At CodeCraft, we believe in the power of well-crafted code to transform ideas into impactful digital solutions. We are a team dedicated to building beautiful, functional, and scalable web applications.
        </p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center mt-16">
        <div class="text-gray-300 text-lg leading-relaxed">
            <h2 class="text-3xl font-bold text-white mb-6">Our Mission</h2>
            <p class="mb-4">
                Our mission is to empower businesses and individuals with cutting-edge web technologies. We strive to deliver solutions that are not only aesthetically pleasing but also robust, secure, and optimized for performance. We are passionate about clean code, intuitive user experiences, and continuous learning.
            </p>
            <p>
                We specialize in Laravel development, building powerful backend systems, and creating dynamic, interactive frontends with modern JavaScript frameworks. Our approach is collaborative, ensuring that your vision is at the heart of every project.
            </p>
        </div>
        <div class="relative overflow-hidden rounded-lg shadow-xl transform hover:scale-105 transition duration-300 ease-in-out"> {{-- Applied hover to parent div --}}
            <img src="https://images.unsplash.com/photo-1552581234-26160f608093?q=80&w=1470&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Our Team" class="w-full h-full object-cover"> {{-- Removed hover from img --}}
            <div class="absolute inset-0 bg-gradient-to-br from-red-500/20 to-blue-500/20 rounded-lg"></div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center mt-20">
        <div class="relative order-2 md:order-1 overflow-hidden rounded-lg shadow-xl transform hover:scale-105 transition duration-300 ease-in-out"> {{-- Applied hover to parent div --}}
            <img src="https://images.unsplash.com/photo-1606857521015-7f9fcf423740?q=80&w=870&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Our Process" class="w-full h-full object-cover"> {{-- Removed hover from img --}}
            <div class="absolute inset-0 bg-gradient-to-br from-blue-500/20 to-red-500/20 rounded-lg"></div>
        </div>
        <div class="text-gray-300 text-lg leading-relaxed order-1 md:order-2">
            <h2 class="text-3xl font-bold text-white mb-6">Our Process</h2>
            <p class="mb-4">
                We follow an agile development methodology, ensuring transparency and flexibility throughout the project lifecycle. From initial concept and planning to development, testing, and deployment, we keep you informed and involved. Our goal is to exceed your expectations and build long-lasting partnerships.
            </p>
            <p>
                Every line of code we write is a step towards realizing your digital ambitions. We are committed to delivering high-quality, maintainable, and future-proof solutions that stand the test of time.
            </p>
        </div>
    </div>

    <div class="text-center mt-20">
        <h2 class="text-4xl font-bold text-white mb-8">Ready to Start Your Project?</h2>
        <a href="#contact" class="bg-red-600 hover:bg-red-700 text-white font-bold py-3 px-8 rounded-full text-xl transition duration-300 ease-in-out transform hover:scale-105 shadow-lg">
            Get in Touch
        </a>
    </div>
</div>
@endsection
