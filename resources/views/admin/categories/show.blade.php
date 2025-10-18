<x-admin-layout>
    <x-slot name="header">
        Detail Kategori
    </x-slot>

    <!-- Header Section -->
    <div class="mb-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <div class="mb-4 sm:mb-0">
                <p class="text-gray-600">Informasi lengkap kategori</p>
            </div>
            <div class="flex items-center space-x-2">
                <a href="{{ route('admin.categories.edit', $category->id) }}" 
                   class="inline-flex items-center px-4 py-2 bg-amber-600 hover:bg-amber-700 text-white font-semibold rounded-lg shadow-sm transition-colors duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    Edit
                </a>
                <a href="{{ route('admin.categories.index') }}" 
                   class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white font-semibold rounded-lg shadow-sm transition-colors duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Kembali
                </a>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Category Details Card -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                    <h2 class="text-xl font-bold text-gray-800 flex items-center">
                        <svg class="w-6 h-6 text-gray-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                        </svg>
                        {{ $category->name }}
                    </h2>
                </div>

                <div class="p-6">
                    <!-- Description -->
                    <div class="mb-6">
                        <h3 class="text-base font-semibold text-gray-700 mb-3 flex items-center">
                            <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path>
                            </svg>
                            Deskripsi Kategori
                        </h3>
                        <p class="text-gray-700 leading-relaxed">
                            {{ $category->description ?? 'Tidak ada deskripsi untuk kategori ini.' }}
                        </p>
                    </div>

                    <!-- Statistics -->
                    <div class="border-t border-gray-200 pt-6">
                        <h3 class="text-base font-semibold text-gray-700 mb-4 flex items-center">
                            <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                            Statistik Penggunaan
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Events Count -->
                            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm font-medium text-blue-600 mb-1">Total Event</p>
                                        <p class="text-2xl font-bold text-blue-900">{{ $category->events->count() }}</p>
                                    </div>
                                    <div class="bg-blue-100 p-3 rounded-lg">
                                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <!-- Archives Count -->
                            <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                                <div class="flex items-center justify-between">
                                    <div>
                                        <p class="text-sm font-medium text-green-600 mb-1">Total Arsip</p>
                                        <p class="text-2xl font-bold text-green-900">{{ $category->archives->count() }}</p>
                                    </div>
                                    <div class="bg-green-100 p-3 rounded-lg">
                                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Related Events -->
            @if($category->events->count() > 0)
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                    <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-bold text-gray-800 flex items-center">
                            <svg class="w-5 h-5 text-gray-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            Event Terkait ({{ $category->events->count() }})
                        </h3>
                    </div>

                    <div class="p-6">
                        <div class="space-y-3">
                            @foreach($category->events->take(5) as $event)
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                                    <div class="flex items-center">
                                        <div class="bg-blue-100 p-2 rounded-lg mr-3">
                                            <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-800">{{ $event->title }}</p>
                                            <p class="text-sm text-gray-500">
                                                {{ \Carbon\Carbon::parse($event->date_start)->format('d M Y') }}
                                            </p>
                                        </div>
                                    </div>
                                    <a href="{{ route('admin.events.show', $event->id) }}" 
                                       class="text-blue-600 hover:text-blue-800 text-sm font-semibold">
                                        Lihat →
                                    </a>
                                </div>
                            @endforeach

                            @if($category->events->count() > 5)
                                <div class="text-center pt-2">
                                    <p class="text-sm text-gray-500">
                                        Dan {{ $category->events->count() - 5 }} event lainnya
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endif

            <!-- Related Archives -->
            @if($category->archives->count() > 0)
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                    <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-bold text-gray-800 flex items-center">
                            <svg class="w-5 h-5 text-gray-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                            </svg>
                            Arsip Terkait ({{ $category->archives->count() }})
                        </h3>
                    </div>

                    <div class="p-6">
                        <div class="space-y-3">
                            @foreach($category->archives->take(5) as $archive)
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors">
                                    <div class="flex items-center">
                                        <div class="bg-green-100 p-2 rounded-lg mr-3">
                                            <svg class="w-5 h-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-gray-800">{{ $archive->title }}</p>
                                            <p class="text-sm text-gray-500">
                                                {{ $archive->date ? $archive->date->format('d M Y') : '-' }}
                                            </p>
                                        </div>
                                    </div>
                                    <a href="{{ route('admin.archives.show', $archive->id) }}" 
                                       class="text-green-600 hover:text-green-800 text-sm font-semibold">
                                        Lihat →
                                    </a>
                                </div>
                            @endforeach

                            @if($category->archives->count() > 5)
                                <div class="text-center pt-2">
                                    <p class="text-sm text-gray-500">
                                        Dan {{ $category->archives->count() - 5 }} arsip lainnya
                                    </p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <!-- Sidebar -->
        <div class="lg:col-span-1 space-y-6">
            <!-- Category Information Card -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                    <h3 class="text-base font-bold text-gray-800">Informasi Kategori</h3>
                </div>

                <div class="p-6">
                    <div class="divide-y divide-gray-200">
                        <div class="py-3">
                            <p class="text-xs font-bold text-gray-600 uppercase mb-1">Tanggal Dibuat</p>
                            <p class="text-sm font-semibold text-gray-900">{{ $category->created_at->format('d M Y, H:i') }}</p>
                        </div>
                        <div class="py-3">
                            <p class="text-xs font-bold text-gray-600 uppercase mb-1">Terakhir Diupdate</p>
                            <p class="text-sm font-semibold text-gray-900">{{ $category->updated_at->format('d M Y, H:i') }}</p>
                        </div>
                        <div class="py-3">
                            <p class="text-xs font-bold text-gray-600 uppercase mb-1">Total Event</p>
                            <p class="text-sm font-semibold text-gray-900">{{ $category->events->count() }} Event</p>
                        </div>
                        <div class="py-3">
                            <p class="text-xs font-bold text-gray-600 uppercase mb-1">Total Arsip</p>
                            <p class="text-sm font-semibold text-gray-900">{{ $category->archives->count() }} Arsip</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Actions Card -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                    <h3 class="text-base font-bold text-gray-800">Tindakan</h3>
                </div>

                <div class="p-6 space-y-3">
                    <a href="{{ route('admin.categories.edit', $category->id) }}" 
                       class="block w-full px-4 py-3 bg-amber-600 hover:bg-amber-700 text-white text-center text-sm font-bold rounded-lg transition-colors duration-200">
                        <svg class="inline w-4 h-4 mr-2 -mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        Edit Kategori
                    </a>

                    <form action="{{ route('admin.categories.destroy', $category->id) }}" 
                          method="POST" 
                          onsubmit="return confirm('⚠️ PERINGATAN\n\nApakah Anda yakin ingin menghapus kategori ini?\n\nKategori akan dihapus permanen dan tidak dapat dikembalikan.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="block w-full px-4 py-3 bg-red-600 hover:bg-red-700 text-white text-center text-sm font-bold rounded-lg transition-colors duration-200">
                            <svg class="inline w-4 h-4 mr-2 -mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            Hapus Kategori
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
