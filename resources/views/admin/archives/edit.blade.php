<x-admin-layout>
    <x-slot name="header">
        Edit Arsip
    </x-slot>

    <!-- Header Section -->
    <div class="mb-6">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
            <div class="mb-4 sm:mb-0">
                <p class="text-gray-600">Perbarui informasi arsip kegiatan</p>
            </div>
            <a href="{{ route('admin.archives.index') }}" 
               class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white font-semibold rounded-lg shadow-sm transition-colors duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali
            </a>
        </div>
    </div>

    <!-- Error Messages -->
    @if ($errors->any())
        <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-lg">
            <div class="flex items-start">
                <svg class="w-5 h-5 text-red-500 mr-2 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                </svg>
                <div class="flex-1">
                    <p class="text-red-700 font-medium mb-2">Terdapat kesalahan:</p>
                    <ul class="list-disc list-inside text-red-600 text-sm space-y-1">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif

    <!-- Form Card -->
    <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">

    <form action="{{ route('admin.archives.update', $archive->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="p-6 space-y-6">
        <!-- Row 1: Judul & Kategori -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
              Judul Arsip <span class="text-red-500">*</span>
            </label>
            <input type="text" 
                   name="title" 
                   value="{{ old('title', $archive->title) }}" 
                   required
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                   placeholder="Masukkan judul arsip">
          </div>

          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
              Kategori <span class="text-red-500">*</span>
            </label>
            <select name="category_id" 
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                    required>
              <option value="">-- Pilih Kategori --</option>
              @foreach($categories as $cat)
                <option value="{{ $cat->id }}" {{ old('category_id', $archive->category_id) == $cat->id ? 'selected' : '' }}>
                  {{ $cat->name }}
                </option>
              @endforeach
            </select>
          </div>
        </div>

        <!-- Deskripsi -->
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-2">
            Deskripsi
          </label>
          <textarea name="description" 
                    rows="4"
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                    placeholder="Deskripsikan kegiatan">{{ old('description', $archive->description) }}</textarea>
        </div>

        <!-- Row 2: Tanggal & Lokasi -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
              Tanggal Kegiatan <span class="text-red-500">*</span>
            </label>
            <input type="date" 
                   name="date" 
                   value="{{ old('date', $archive->date ? $archive->date->format('Y-m-d') : '') }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                   required>
          </div>

          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
              Lokasi <span class="text-red-500">*</span>
            </label>
            <input type="text" 
                   name="location" 
                   value="{{ old('location', $archive->location) }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                   placeholder="Contoh: Rumah BUMN Sidoarjo"
                   required>
          </div>
        </div>

        <!-- Row 3: Penyelenggara & Pemateri -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
              Penyelenggara <span class="text-red-500">*</span>
            </label>
            <input type="text" 
                   name="organizer" 
                   value="{{ old('organizer', $archive->organizer) }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                   placeholder="Nama penyelenggara"
                   required>
          </div>

          <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
              Nama Pemateri <span class="text-red-500">*</span>
            </label>
            <input type="text" 
                   name="presenter_name" 
                   value="{{ old('presenter_name', $archive->presenter_name) }}"
                   class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                   placeholder="Nama presenter"
                   required>
          </div>
        </div>

        <!-- Event Terkait -->
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-2">
            Event Terkait <span class="text-gray-500 text-xs">(Opsional)</span>
          </label>
          <select name="event_id" 
                  class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
            <option value="">-- Pilih Event --</option>
            @foreach($events as $e)
              <option value="{{ $e->id }}" {{ old('event_id', $archive->event_id) == $e->id ? 'selected' : '' }}>
                {{ $e->title }}
              </option>
            @endforeach
          </select>
        </div>

        <!-- Video Embed -->
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-2">
            Link Video Embed <span class="text-gray-500 text-xs">(Opsional)</span>
          </label>
          <input type="url" 
                 name="video_embed" 
                 value="{{ old('video_embed', $archive->video_embed) }}"
                 class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                 placeholder="https://www.youtube.com/embed/...">
          <p class="mt-1 text-sm text-gray-500">Format: https://www.youtube.com/embed/VIDEO_ID</p>
        </div>

        <!-- Material PDF -->
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-2">
            Material PDF
          </label>
          @if($archive->material)
            <div class="mb-3 p-3 bg-blue-50 rounded-lg flex items-center justify-between border border-blue-200">
              <div class="flex items-center">
                <svg class="w-6 h-6 text-red-600 mr-2" fill="currentColor" viewBox="0 0 20 20">
                  <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h4.586A2 2 0 0112 2.586L15.414 6A2 2 0 0116 7.414V16a2 2 0 01-2 2H6a2 2 0 01-2-2V4z" clip-rule="evenodd"/>
                </svg>
                <span class="text-sm text-gray-700 font-medium">{{ basename($archive->material) }}</span>
              </div>
              <a href="{{ Storage::url($archive->material) }}" 
                 target="_blank" 
                 class="text-blue-600 hover:text-blue-800 text-sm font-semibold">
                Lihat PDF
              </a>
            </div>
          @endif
          <input type="file" 
                 name="material" 
                 accept=".pdf"
                 class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
          <p class="mt-1 text-sm text-gray-500">Format: PDF (Maksimal 10MB). Biarkan kosong jika tidak ingin mengubah.</p>
        </div>

        <!-- Dokumentasi Foto -->
        <div>
          <label class="block text-sm font-semibold text-gray-700 mb-2">
            Dokumentasi Foto
          </label>
          @if($archive->documentation && is_array($archive->documentation))
            <div class="mb-3 grid grid-cols-3 gap-3">
              @foreach($archive->documentation as $doc)
                <div class="relative group">
                  <img src="{{ Storage::url($doc) }}" 
                       alt="Dokumentasi" 
                       class="w-full h-32 object-cover rounded-lg border border-gray-200">
                  <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-30 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-200 rounded-lg">
                    <a href="{{ Storage::url($doc) }}" 
                       target="_blank" 
                       class="text-white text-sm font-semibold">
                      Lihat
                    </a>
                  </div>
                </div>
              @endforeach
            </div>
          @endif
          <input type="file" 
                 name="documentation[]" 
                 accept="image/*" 
                 multiple
                 class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100">
          <p class="mt-1 text-sm text-gray-500">Format: JPG, PNG (Maksimal 5MB per file, bisa multiple). Biarkan kosong jika tidak ingin menambah foto baru.</p>
        </div>
      </div>

      <!-- Form Footer -->
      <div class="bg-gray-50 px-6 py-4 flex items-center justify-between border-t border-gray-200">
        <a href="{{ route('admin.archives.index') }}" 
           class="px-6 py-2 bg-white border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition-colors duration-200">
          Batal
        </a>
        <button type="submit" 
                class="px-6 py-2 bg-gray-800 hover:bg-gray-900 text-white font-semibold rounded-lg transition-colors duration-200 flex items-center">
          <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
          </svg>
          Update Arsip
        </button>
      </div>
    </form>
  </div>
</x-admin-layout>
