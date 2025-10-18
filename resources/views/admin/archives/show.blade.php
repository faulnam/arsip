<x-admin-layout>
    <x-slot name="header">
        Detail Arsip Kegiatan
    </x-slot>

    <!-- Header Section -->
    <div class="mb-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <div class="mb-4 sm:mb-0">
                <p class="text-gray-600">Informasi lengkap arsip pelatihan</p>
            </div>
            <div class="flex items-center space-x-2">
                <a href="{{ route('admin.archives.edit', $archive->id) }}" 
                   class="inline-flex items-center px-4 py-2 bg-amber-600 hover:bg-amber-700 text-white font-semibold rounded-lg shadow-sm transition-colors duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                    </svg>
                    Edit
                </a>
                <a href="{{ route('admin.archives.index') }}" 
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
            <!-- Archive Details Card -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                    <h2 class="text-xl font-bold text-gray-800">{{ $archive->title }}</h2>
                </div>

                <div class="p-6">
                    <!-- Description -->
                    @if($archive->description)
                        <div class="mb-6">
                            <h3 class="text-base font-semibold text-gray-700 mb-3 flex items-center">
                                <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7"></path>
                                </svg>
                                Deskripsi Kegiatan
                            </h3>
                            <p class="text-gray-700 leading-relaxed text-justify">{{ $archive->description }}</p>
                        </div>
                    @endif

                    <!-- Information Table -->
                    <h3 class="text-base font-semibold text-gray-700 mb-3 flex items-center">
                        <svg class="w-5 h-5 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Informasi Detail
                    </h3>
                    
                    <div class="overflow-hidden border border-gray-200 rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <tbody class="divide-y divide-gray-200">
                                @if($archive->date)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap w-1/3 bg-gray-50">
                                        <div class="flex items-center">
                                            <svg class="w-5 h-5 text-gray-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                            <span class="text-sm font-semibold text-gray-700">Tanggal Kegiatan</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="text-sm font-medium text-gray-900">{{ $archive->date->format('d M Y') }}</span>
                                    </td>
                                </tr>
                                @endif

                                @if($archive->location)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap bg-gray-50">
                                        <div class="flex items-center">
                                            <svg class="w-5 h-5 text-gray-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            </svg>
                                            <span class="text-sm font-semibold text-gray-700">Lokasi</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="text-sm font-medium text-gray-900">{{ $archive->location }}</span>
                                    </td>
                                </tr>
                                @endif

                                @if($archive->organizer)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap bg-gray-50">
                                        <div class="flex items-center">
                                            <svg class="w-5 h-5 text-gray-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                            </svg>
                                            <span class="text-sm font-semibold text-gray-700">Penyelenggara</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="text-sm font-medium text-gray-900">{{ $archive->organizer }}</span>
                                    </td>
                                </tr>
                                @endif

                                @if($archive->presenter_name)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap bg-gray-50">
                                        <div class="flex items-center">
                                            <svg class="w-5 h-5 text-gray-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                            </svg>
                                            <span class="text-sm font-semibold text-gray-700">Pemateri</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="text-sm font-medium text-gray-900">{{ $archive->presenter_name }}</span>
                                    </td>
                                </tr>
                                @endif

                                @if($archive->category)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap bg-gray-50">
                                        <div class="flex items-center">
                                            <svg class="w-5 h-5 text-gray-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                            </svg>
                                            <span class="text-sm font-semibold text-gray-700">Kategori</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="inline-flex px-3 py-1 text-xs font-semibold bg-gray-100 text-gray-800 rounded-full">{{ $archive->category->name }}</span>
                                    </td>
                                </tr>
                                @endif

                                @if($archive->event)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap bg-gray-50">
                                        <div class="flex items-center">
                                            <svg class="w-5 h-5 text-gray-500 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                            <span class="text-sm font-semibold text-gray-700">Event Terkait</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ route('admin.events.show', $archive->event->id) }}" 
                                           class="text-sm font-medium text-blue-600 hover:text-blue-800 underline">
                                            {{ $archive->event->title }}
                                        </a>
                                    </td>
                                </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Material PDF Section -->
            @if($archive->material)
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                    <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-bold text-gray-800 flex items-center">
                            <svg class="w-5 h-5 text-gray-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"/>
                            </svg>
                            Material Pelatihan (PDF)
                        </h3>
                    </div>

                    <div class="p-6">
                        <div class="border border-gray-200 rounded-lg p-4 hover:border-gray-300 transition-colors duration-200">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="bg-gray-100 p-3 rounded-lg border border-gray-200">
                                        <svg class="w-10 h-10 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 6a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zm1 3a1 1 0 100 2h6a1 1 0 100-2H7z" clip-rule="evenodd"/>
                                        </svg>
                                    </div>
                                    <div class="ml-4">
                                        <p class="font-bold text-gray-800 text-sm">Dokumen Material</p>
                                        <p class="text-sm text-gray-600 mt-1">{{ basename($archive->material) }}</p>
                                    </div>
                                </div>
                                <a href="{{ Storage::url($archive->material) }}" 
                                   target="_blank" 
                                   class="inline-flex items-center px-4 py-2 bg-gray-800 hover:bg-gray-900 text-white text-sm font-semibold rounded-lg transition-colors duration-200">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    Unduh
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Documentation Photos Section -->
            @if($archive->documentation && is_array($archive->documentation) && count($archive->documentation) > 0)
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                    <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-bold text-gray-800 flex items-center">
                            <svg class="w-5 h-5 text-gray-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                            </svg>
                            Dokumentasi Foto ({{ count($archive->documentation) }} Item)
                        </h3>
                    </div>

                    <div class="p-6 bg-gray-50">
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            @foreach($archive->documentation as $index => $doc)
                                <div class="relative group bg-white border border-gray-200 overflow-hidden rounded-lg hover:border-gray-300 transition-colors duration-200">
                                    <img src="{{ Storage::url($doc) }}" 
                                         alt="Dokumentasi {{ $index + 1 }}" 
                                         class="w-full h-48 object-cover">
                                    <div class="absolute bottom-0 left-0 right-0 bg-gray-800 bg-opacity-90 px-3 py-2">
                                        <p class="text-white text-xs font-semibold">Foto {{ $index + 1 }}</p>
                                    </div>
                                    <a href="{{ Storage::url($doc) }}" 
                                       target="_blank" 
                                       class="absolute inset-0 bg-gray-900 bg-opacity-0 group-hover:bg-opacity-70 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-all duration-300">
                                        <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/>
                                        </svg>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <!-- Video Section -->
            @if($archive->video_embed)
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                    <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-bold text-gray-800 flex items-center">
                            <svg class="w-5 h-5 text-gray-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M2 6a2 2 0 012-2h6a2 2 0 012 2v8a2 2 0 01-2 2H4a2 2 0 01-2-2V6zM14.553 7.106A1 1 0 0014 8v4a1 1 0 00.553.894l2 1A1 1 0 0018 13V7a1 1 0 00-1.447-.894l-2 1z"/>
                            </svg>
                            Video Dokumentasi Kegiatan
                        </h3>
                    </div>

                    <div class="p-6 bg-gray-50">
                        <div class="border-2 border-gray-300 rounded-lg overflow-hidden">
                            <div class="aspect-video">
                                <iframe src="{{ $archive->video_embed }}" 
                                        class="w-full h-full" 
                                        frameborder="0" 
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                        allowfullscreen>
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>
        <!-- Sidebar -->
        <div class="lg:col-span-1 space-y-6">
            <!-- Archive Information Card -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                    <h3 class="text-base font-bold text-gray-800">Informasi Arsip</h3>
                </div>

                <div class="p-6">
                    <div class="divide-y divide-gray-200">
                        <div class="py-3">
                            <p class="text-xs font-bold text-gray-600 uppercase mb-1">Tanggal Dibuat</p>
                            <p class="text-sm font-semibold text-gray-900">{{ $archive->created_at->format('d M Y, H:i') }}</p>
                        </div>
                        <div class="py-3">
                            <p class="text-xs font-bold text-gray-600 uppercase mb-1">Terakhir Diupdate</p>
                            <p class="text-sm font-semibold text-gray-900">{{ $archive->updated_at->format('d M Y, H:i') }}</p>
                        </div>
                        @if($archive->material)
                            <div class="py-3">
                                <p class="text-xs font-bold text-gray-600 uppercase mb-1">Material PDF</p>
                                <p class="text-sm font-semibold text-green-700">
                                    <span class="inline-flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        Tersedia
                                    </span>
                                </p>
                            </div>
                        @endif
                        @if($archive->documentation && is_array($archive->documentation))
                            <div class="py-3">
                                <p class="text-xs font-bold text-gray-600 uppercase mb-1">Dokumentasi Foto</p>
                                <p class="text-sm font-semibold text-gray-900">{{ count($archive->documentation) }} Item</p>
                            </div>
                        @endif
                        @if($archive->video_embed)
                            <div class="py-3">
                                <p class="text-xs font-bold text-gray-600 uppercase mb-1">Video Kegiatan</p>
                                <p class="text-sm font-semibold text-green-700">
                                    <span class="inline-flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                        </svg>
                                        Tersedia
                                    </span>
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Actions Card -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                <div class="bg-gray-50 px-6 py-4 border-b border-gray-200">
                    <h3 class="text-base font-bold text-gray-800">Tindakan</h3>
                </div>

                <div class="p-6 space-y-3">
                    <a href="{{ route('admin.archives.edit', $archive->id) }}" 
                       class="block w-full px-4 py-3 bg-amber-600 hover:bg-amber-700 text-white text-center text-sm font-bold rounded-lg transition-colors duration-200">
                        <svg class="inline w-4 h-4 mr-2 -mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                        </svg>
                        Edit Arsip
                    </a>

                    <form action="{{ route('admin.archives.destroy', $archive->id) }}" 
                          method="POST" 
                          onsubmit="return confirm('⚠️ PERINGATAN\n\nApakah Anda yakin ingin menghapus arsip ini?\n\nSemua data dan file terkait akan dihapus secara permanen dan tidak dapat dikembalikan.')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="block w-full px-4 py-3 bg-red-600 hover:bg-red-700 text-white text-center text-sm font-bold rounded-lg transition-colors duration-200">
                            <svg class="inline w-4 h-4 mr-2 -mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            Hapus Arsip
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
