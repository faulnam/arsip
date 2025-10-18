<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Rumah BUMN Sidoarjo — Arsip & Event Pelatihan</title>
    
    <meta name="author" content="znafisss">
    <meta name="description" content="Rumah BUMN Sidoarjo - Arsip Digital & Dokumentasi Kegiatan Pelatihan">
    <meta name="keywords" content="Rumah BUMN Sidoarjo, Arsip Digital, Pelatihan UMKM, Event Kegiatan, Dokumentasi Pelatihan, Sidoarjo, UMKM, Kolaborasi UMKM">
    <meta name="robots" content="index, follow">
    
    <link rel="icon" href="https://cdn-icons-png.flaticon.com/512/4076/4076549.png" type="image/png">
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-50 text-gray-900 antialiased">

    <!-- Navbar -->
    <nav class="bg-white border-b border-gray-200 fixed w-full top-0 z-50 shadow-sm" x-data="{ open: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <!-- Logo & Brand -->
                <div class="flex items-center">
                    <a href="{{ route('landing') }}" class="flex items-center space-x-3">
                        <img src="https://cdn-icons-png.flaticon.com/512/4076/4076549.png" alt="Logo" class="w-10 h-10 rounded-full">
                        <span class="text-lg font-semibold text-gray-800">Rumah BUMN Sidoarjo</span>
                    </a>
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('landing') }}" class="text-gray-700 hover:text-gray-900 font-medium transition-colors">Beranda</a>
                    <a href="#arsip" class="text-gray-700 hover:text-gray-900 font-medium transition-colors">Arsip</a>
                    <a href="#events" class="text-gray-700 hover:text-gray-900 font-medium transition-colors">Event</a>
                    <a href="#tentang" class="text-gray-700 hover:text-gray-900 font-medium transition-colors">Tentang</a>
                    <a href="#kontak" class="text-gray-700 hover:text-gray-900 font-medium transition-colors">Kontak</a>
                    <a href="{{ route('login') }}" class="inline-flex items-center px-4 py-2 bg-gray-800 hover:bg-gray-900 text-white font-medium rounded-lg transition-colors duration-200">
                        Masuk
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="flex md:hidden items-center">
                    <button @click="open = !open" class="text-gray-700 hover:text-gray-900 focus:outline-none">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                            <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-show="open" @click.away="open = false" class="md:hidden border-t border-gray-200">
            <div class="px-4 pt-2 pb-3 space-y-1">
                <a href="{{ route('landing') }}" class="block px-3 py-2 text-gray-700 hover:bg-gray-50 rounded-lg font-medium transition-colors">Beranda</a>
                <a href="#arsip" class="block px-3 py-2 text-gray-700 hover:bg-gray-50 rounded-lg font-medium transition-colors">Arsip</a>
                <a href="#events" class="block px-3 py-2 text-gray-700 hover:bg-gray-50 rounded-lg font-medium transition-colors">Event</a>
                <a href="#tentang" class="block px-3 py-2 text-gray-700 hover:bg-gray-50 rounded-lg font-medium transition-colors">Tentang</a>
                <a href="#kontak" class="block px-3 py-2 text-gray-700 hover:bg-gray-50 rounded-lg font-medium transition-colors">Kontak</a>
                <a href="{{ route('login') }}" class="block px-3 py-2 bg-gray-800 text-white rounded-lg font-medium text-center hover:bg-gray-900 transition-colors">Masuk</a>
            </div>
        </div>
    </nav>

    <!-- Banner Carousel -->
    <section class="relative pt-16" x-data="{ 
        currentBanner: 0, 
        banners: [
            {
                image: 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=1200&h=500&fit=crop',
                title: 'Selamat Datang di Rumah BUMN Sidoarjo',
                subtitle: 'Pusat Pelatihan & Pemberdayaan UMKM'
            },
            {
                image: 'https://images.unsplash.com/photo-1552664730-d307ca884978?w=1200&h=500&fit=crop',
                title: 'Program Pelatihan Berkualitas',
                subtitle: 'Tingkatkan Kompetensi dan Daya Saing UMKM Anda'
            },
            {
                image: 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=1200&h=500&fit=crop',
                title: 'Kolaborasi untuk Kemajuan',
                subtitle: 'Bersama Membangun Ekosistem UMKM yang Kuat'
            }
        ]
    }" x-init="setInterval(() => { currentBanner = (currentBanner + 1) % banners.length }, 5000)">
        <div class="relative h-[400px] md:h-[500px] overflow-hidden">
            <!-- Banner Images -->
            <template x-for="(banner, index) in banners" :key="index">
                <div x-show="currentBanner === index"
                     x-transition:enter="transition ease-out duration-700"
                     x-transition:enter-start="opacity-0 transform translate-x-full"
                     x-transition:enter-end="opacity-100 transform translate-x-0"
                     x-transition:leave="transition ease-in duration-300"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"
                     class="absolute inset-0">
                    <!-- Background Image -->
                    <img :src="banner.image" 
                         :alt="banner.title"
                         class="w-full h-full object-cover">
                    
                    <!-- Overlay -->
                    <div class="absolute inset-0 bg-gradient-to-r from-gray-900/80 via-gray-900/50 to-transparent"></div>
                    
                    <!-- Content -->
                    <div class="absolute inset-0 flex items-center">
                        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 w-full">
                            <div class="max-w-2xl">
                                <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-4" 
                                    x-text="banner.title"></h2>
                                <p class="text-lg md:text-xl text-gray-200 mb-8" 
                                   x-text="banner.subtitle"></p>
                                <div class="flex flex-wrap gap-4">
                                    <a href="#arsip" 
                                       class="inline-flex items-center px-6 py-3 bg-white hover:bg-gray-100 text-gray-800 font-semibold rounded-lg transition-colors duration-200 shadow-lg">
                                        Lihat Arsip
                                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                    <a href="#events" 
                                       class="inline-flex items-center px-6 py-3 bg-gray-800 hover:bg-gray-900 text-white font-semibold rounded-lg transition-colors duration-200 border-2 border-white">
                                        Event Terbaru
                                        <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </template>

            <!-- Navigation Arrows -->
            <button @click="currentBanner = currentBanner === 0 ? banners.length - 1 : currentBanner - 1"
                    class="absolute left-4 top-1/2 -translate-y-1/2 w-12 h-12 flex items-center justify-center bg-white/20 hover:bg-white/30 backdrop-blur-sm text-white rounded-full transition-all duration-200 z-10">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
            </button>
            <button @click="currentBanner = (currentBanner + 1) % banners.length"
                    class="absolute right-4 top-1/2 -translate-y-1/2 w-12 h-12 flex items-center justify-center bg-white/20 hover:bg-white/30 backdrop-blur-sm text-white rounded-full transition-all duration-200 z-10">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </button>

            <!-- Indicators -->
            <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex space-x-3 z-10">
                <template x-for="(banner, index) in banners" :key="index">
                    <button @click="currentBanner = index"
                            :class="currentBanner === index ? 'bg-white w-8' : 'bg-white/50 w-3'"
                            class="h-3 rounded-full transition-all duration-300"></button>
                </template>
            </div>
        </div>
    </section>

    <!-- Search & Filter Section -->
    <section class="bg-white py-8 shadow-sm -mt-8 relative z-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <form method="GET" action="{{ route('landing') }}" class="flex flex-col md:flex-row gap-4">
                <input type="text" 
                       name="search" 
                       value="{{ request('search') }}" 
                       class="flex-1 px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors" 
                       placeholder="🔎 Cari event berdasarkan judul, pemateri, atau lokasi...">

                <select name="category" 
                        class="px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                        onchange="this.form.submit()">
                    <option value="">Semua Kategori</option>
                    @foreach ($categories as $cat)
                        <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>

                <button type="submit" 
                        class="px-6 py-3 bg-gray-800 hover:bg-gray-900 text-white font-medium rounded-lg transition-colors duration-200">
                    Cari
                </button>
            </form>
        </div>
    </section>


    <!-- Arsip & Pelatihan Section -->
    <section id="arsip" class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-3">
                    <svg class="w-8 h-8 inline-block mr-2 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                    </svg>
                    Arsip & Pelatihan Terbaru
                </h2>
                <p class="text-gray-600">
                    Dokumentasi dan materi pelatihan dari kegiatan Rumah BUMN Sidoarjo
                </p>
                <div class="w-24 h-1 bg-gray-800 mx-auto mt-4 rounded-full"></div>
            </div>

            @if(isset($archives) && $archives->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($archives as $archive)
                        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow duration-200">
                            <!-- Image -->
                            <div class="aspect-video w-full bg-gray-100 overflow-hidden">
                                @if($archive->documentation)
                                    <img src="{{ asset('storage/'.$archive->documentation) }}" 
                                         class="w-full h-full object-cover hover:scale-105 transition-transform duration-300" 
                                         alt="{{ $archive->title }}">
                                @elseif($archive->event && $archive->event->poster)
                                    <img src="{{ asset('storage/'.$archive->event->poster) }}" 
                                         class="w-full h-full object-cover hover:scale-105 transition-transform duration-300" 
                                         alt="{{ $archive->title }}">
                                @else
                                    <img src="https://placehold.co/600x400/e5e7eb/6b7280?text=Arsip" 
                                         class="w-full h-full object-cover" 
                                         alt="{{ $archive->title }}">
                                @endif
                            </div>
                            
                            <!-- Content -->
                            <div class="p-6">
                                <h5 class="text-lg font-semibold text-gray-800 mb-2 line-clamp-2">{{ $archive->title }}</h5>
                                <p class="text-sm text-gray-500 mb-4 flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    @if($archive->event)
                                        {{ \Carbon\Carbon::parse($archive->event->date_start)->format('d M Y') }}
                                    @else
                                        {{ \Carbon\Carbon::parse($archive->created_at)->format('d M Y') }}
                                    @endif
                                </p>
                                <a href="{{ route('admin.archives.show', $archive->id) }}" 
                                   class="inline-flex items-center text-gray-800 hover:text-gray-900 font-medium transition-colors">
                                    Lihat Detail 
                                    <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="text-center py-12">
                    <img src="https://cdn-icons-png.flaticon.com/512/4076/4076549.png" width="100" alt="No Data" class="mx-auto mb-4 opacity-50">
                    <h5 class="text-lg text-gray-600">Belum ada arsip atau pelatihan yang tersedia.</h5>
                </div>
            @endif
        </div>
    </section>

    <!-- Event & Kegiatan Section -->
    <section id="events" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-3">
                    <svg class="w-8 h-8 inline-block mr-2 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    Event & Kegiatan Terbaru
                </h2>
                <p class="text-gray-600">
                    Ikuti berbagai event dan kegiatan menarik dari Rumah BUMN Sidoarjo
                </p>
                <div class="w-24 h-1 bg-gray-800 mx-auto mt-4 rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($events as $event)
                    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden hover:shadow-md transition-shadow duration-200">
                        <!-- Image -->
                        <div class="aspect-video w-full bg-gray-100 overflow-hidden">
                            @if ($event->poster)
                                <img src="{{ asset('storage/' . $event->poster) }}" 
                                     alt="{{ $event->title }}" 
                                     class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">
                            @else
                                <img src="https://placehold.co/600x400/e5e7eb/6b7280?text=Event" 
                                     alt="No Image" 
                                     class="w-full h-full object-cover">
                            @endif
                        </div>
                        
                        <!-- Content -->
                        <div class="p-6">
                            <h5 class="text-lg font-semibold text-gray-800 mb-3 line-clamp-2">{{ $event->title }}</h5>
                            
                            <div class="space-y-2 mb-4">
                                <p class="text-sm text-gray-600 flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                    {{ \Carbon\Carbon::parse($event->date_start)->format('d M Y') }}
                                </p>
                                <p class="text-sm text-gray-600 flex items-center">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                    {{ $event->location ?? 'Lokasi belum ditentukan' }}
                                </p>
                            </div>
                            
                            @if($event->description)
                                <p class="text-sm text-gray-600 mb-4 line-clamp-2">{{ $event->description }}</p>
                            @endif
                            
                            <a href="{{ route('events.show', $event->id) }}" 
                               class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-800 font-medium rounded-lg transition-colors duration-200">
                                Lihat Detail
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-full text-center py-12">
                        <svg class="w-16 h-16 mx-auto mb-4 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <h5 class="text-lg text-gray-600">Tidak ada event yang ditemukan.</h5>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

     <!-- Tentang Section -->
    <section id="tentang" class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Image Carousel -->
                <div class="relative" x-data="{ currentSlide: 0, slides: [
                    'https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=600&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=600&h=400&fit=crop',
                    'https://images.unsplash.com/photo-1556761175-4b46a572b786?w=600&h=400&fit=crop'
                ] }" x-init="setInterval(() => { currentSlide = (currentSlide + 1) % slides.length }, 3000)">
                    <div class="aspect-video rounded-lg overflow-hidden shadow-lg bg-gray-200">
                        <template x-for="(slide, index) in slides" :key="index">
                            <img :src="slide" 
                                 x-show="currentSlide === index"
                                 x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="opacity-0"
                                 x-transition:enter-end="opacity-100"
                                 class="w-full h-full object-cover" 
                                 alt="Rumah BUMN">
                        </template>
                    </div>
                    
                    <!-- Carousel Indicators -->
                    <div class="flex justify-center mt-4 space-x-2">
                        <template x-for="(slide, index) in slides" :key="index">
                            <button @click="currentSlide = index"
                                    :class="currentSlide === index ? 'bg-gray-800' : 'bg-gray-300'"
                                    class="w-2 h-2 rounded-full transition-colors duration-200"></button>
                        </template>
                    </div>
                </div>

                <!-- Content -->
                <div>
                    <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center lg:text-left">
                        Tentang Rumah BUMN Sidoarjo
                    </h2>
                    <div class="space-y-4 text-gray-600 leading-relaxed">
                        <p class="text-justify">
                            <strong class="text-gray-800">Rumah BUMN Sidoarjo</strong> merupakan wadah kolaborasi dan pemberdayaan bagi pelaku UMKM di wilayah Sidoarjo.
                            Melalui berbagai program pelatihan, pendampingan, dan pengarsipan digital kegiatan, Rumah BUMN berkomitmen untuk
                            meningkatkan daya saing UMKM agar mampu tumbuh dan berinovasi di era digital.
                        </p>
                        <p class="text-justify">
                            Website ini dikembangkan untuk mempermudah akses terhadap arsip pelatihan, dokumentasi kegiatan, dan informasi event
                            yang diselenggarakan, sehingga transparansi dan kolaborasi antar pelaku UMKM dapat terjaga dengan baik.
                        </p>
                    </div>
                    <div class="mt-6 text-center lg:text-left">
                        <a href="#kontak" class="inline-flex items-center px-6 py-3 bg-gray-800 hover:bg-gray-900 text-white font-medium rounded-lg transition-colors duration-200">
                            Hubungi Kami
                            <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-3">Pertanyaan yang Sering Muncul</h2>
                <div class="w-24 h-1 bg-gray-800 mx-auto mt-4 rounded-full"></div>
            </div>

            <div class="max-w-3xl mx-auto space-y-3" x-data="{ openFaq: null }">
                <!-- FAQ 1 -->
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button @click="openFaq = openFaq === 1 ? null : 1" 
                            class="w-full px-6 py-4 text-left bg-white hover:bg-gray-50 transition-colors duration-200 flex items-center justify-between">
                        <span class="font-medium text-gray-800">Bagaimana cara mengunggah arsip baru?</span>
                        <svg :class="openFaq === 1 ? 'rotate-180' : ''" 
                             class="w-5 h-5 text-gray-600 transition-transform duration-200" 
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="openFaq === 1" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 transform -translate-y-2"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         class="px-6 py-4 bg-gray-50 text-gray-600 border-t border-gray-200">
                        Admin dapat mengunggah arsip baru melalui menu <strong>Dashboard → Tambah Arsip</strong> setelah login.
                    </div>
                </div>

                <!-- FAQ 2 -->
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button @click="openFaq = openFaq === 2 ? null : 2" 
                            class="w-full px-6 py-4 text-left bg-white hover:bg-gray-50 transition-colors duration-200 flex items-center justify-between">
                        <span class="font-medium text-gray-800">Siapa yang dapat mengakses data arsip?</span>
                        <svg :class="openFaq === 2 ? 'rotate-180' : ''" 
                             class="w-5 h-5 text-gray-600 transition-transform duration-200" 
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="openFaq === 2" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 transform -translate-y-2"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         class="px-6 py-4 bg-gray-50 text-gray-600 border-t border-gray-200">
                        Data arsip hanya dapat diakses oleh pengguna dengan peran <strong>Admin</strong>, sedangkan pengunjung hanya bisa melihat arsip yang dipublikasikan.
                    </div>
                </div>

                <!-- FAQ 3 -->
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button @click="openFaq = openFaq === 3 ? null : 3" 
                            class="w-full px-6 py-4 text-left bg-white hover:bg-gray-50 transition-colors duration-200 flex items-center justify-between">
                        <span class="font-medium text-gray-800">Apakah arsip dapat diunduh?</span>
                        <svg :class="openFaq === 3 ? 'rotate-180' : ''" 
                             class="w-5 h-5 text-gray-600 transition-transform duration-200" 
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="openFaq === 3" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 transform -translate-y-2"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         class="px-6 py-4 bg-gray-50 text-gray-600 border-t border-gray-200">
                        Ya, pengunjung dapat mengunduh file arsip yang tersedia di halaman publik apabila admin memberikan izin unduh.
                    </div>
                </div>

                <!-- FAQ 4 -->
                <div class="border border-gray-200 rounded-lg overflow-hidden">
                    <button @click="openFaq = openFaq === 4 ? null : 4" 
                            class="w-full px-6 py-4 text-left bg-white hover:bg-gray-50 transition-colors duration-200 flex items-center justify-between">
                        <span class="font-medium text-gray-800">Bagaimana jika lupa password admin?</span>
                        <svg :class="openFaq === 4 ? 'rotate-180' : ''" 
                             class="w-5 h-5 text-gray-600 transition-transform duration-200" 
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div x-show="openFaq === 4" 
                         x-transition:enter="transition ease-out duration-200"
                         x-transition:enter-start="opacity-0 transform -translate-y-2"
                         x-transition:enter-end="opacity-100 transform translate-y-0"
                         class="px-6 py-4 bg-gray-50 text-gray-600 border-t border-gray-200">
                        Silakan hubungi tim teknis Rumah BUMN Sidoarjo untuk melakukan reset akun admin.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Lokasi Section -->
    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-3">Lokasi Kami</h2>
                <p class="text-gray-600">Temukan kami di peta dan kunjungi Rumah BUMN Sidoarjo</p>
                <div class="w-24 h-1 bg-gray-800 mx-auto mt-4 rounded-full"></div>
            </div>

            <!-- Google Maps -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden border border-gray-200">
                <div class="aspect-video w-full">
                    <iframe 
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.594763496784!2d112.724!3d-7.450!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fbe2a8d58a87%3A0x68418b4530c6b6f7!2sRumah%20BUMN%20Sidoarjo!5e0!3m2!1sid!2sid!4v1700000000000!5m2!1sid!2sid"
                        width="100%" 
                        height="100%" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy"
                        class="w-full h-full">
                    </iframe>
                </div>
            </div>
        </div>
    </section>

    <!-- Hubungi Kami Section -->
    <section id="kontak" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-gray-800 mb-3">Hubungi Kami</h2>
                <p class="text-gray-600">Jangan ragu untuk menghubungi kami kapan saja</p>
                <div class="w-24 h-1 bg-gray-800 mx-auto mt-4 rounded-full"></div>
            </div>

            <!-- Contact Cards Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-12">
                <!-- Alamat Card -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6 hover:shadow-xl transition-shadow duration-300">
                    <div class="w-14 h-14 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-7 h-7 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Alamat</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Jl. Raya Ponti No.5, Lemahputro, Sidoarjo, Jawa Timur
                    </p>
                </div>

                <!-- Telepon Card -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6 hover:shadow-xl transition-shadow duration-300">
                    <div class="w-14 h-14 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-7 h-7 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Telepon</h3>
                    <a href="tel:+6281234567890" class="text-gray-600 hover:text-gray-800 text-sm font-medium transition-colors">
                        (+62) 812-3456-7890
                    </a>
                </div>

                <!-- Email Card -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6 hover:shadow-xl transition-shadow duration-300">
                    <div class="w-14 h-14 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-7 h-7 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Email</h3>
                    <a href="mailto:info@rumahbumnsidoarjo.id" class="text-gray-600 hover:text-gray-800 text-sm font-medium transition-colors break-all">
                        info@rumahbumnsidoarjo.id
                    </a>
                </div>

                <!-- Jam Operasional Card -->
                <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-6 hover:shadow-xl transition-shadow duration-300">
                    <div class="w-14 h-14 bg-gray-100 rounded-full flex items-center justify-center mb-4">
                        <svg class="w-7 h-7 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-800 mb-2">Jam Operasional</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        Senin - Jumat<br>
                        08:00 - 16:00 WIB
                    </p>
                </div>
            </div>

            <!-- Social Media Section -->
            <div class="bg-gradient-to-br from-gray-800 to-gray-900 rounded-xl shadow-xl p-8 text-center">
                <h3 class="text-2xl font-bold text-white mb-3">Ikuti Media Sosial Kami</h3>
                <p class="text-gray-300 mb-6">Dapatkan update terbaru tentang kegiatan dan event kami</p>
                <div class="flex justify-center space-x-4">
                    <a href="https://www.instagram.com/rumahbumnsidoarjo" target="_blank" 
                       class="w-12 h-12 flex items-center justify-center bg-white hover:bg-gray-100 text-gray-800 rounded-lg transition-all duration-200 hover:scale-110 shadow-lg"
                       title="Instagram">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                        </svg>
                    </a>
                    <a href="https://www.facebook.com/rumahbumnsidoarjo" target="_blank" 
                       class="w-12 h-12 flex items-center justify-center bg-white hover:bg-gray-100 text-gray-800 rounded-lg transition-all duration-200 hover:scale-110 shadow-lg"
                       title="Facebook">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                        </svg>
                    </a>
                    <a href="https://wa.me/6281234567890" target="_blank" 
                       class="w-12 h-12 flex items-center justify-center bg-white hover:bg-gray-100 text-gray-800 rounded-lg transition-all duration-200 hover:scale-110 shadow-lg"
                       title="WhatsApp">
                        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                    </a>
                    <a href="mailto:info@rumahbumnsidoarjo.id" 
                       class="w-12 h-12 flex items-center justify-center bg-white hover:bg-gray-100 text-gray-800 rounded-lg transition-all duration-200 hover:scale-110 shadow-lg"
                       title="Email">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    

</body>
</html>


 
<!-- 🔗 Script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>AOS.init();</script>
</body>
</html>
