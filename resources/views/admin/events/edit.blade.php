<x-admin-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Event
            </h2>
            <a href="{{ route('admin.events.index') }}" 
               class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white font-medium rounded-lg transition-colors duration-200">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali
            </a>
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

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

  <div class="bg-white rounded-lg shadow-md overflow-hidden border border-gray-200">
    <form action="{{ route('admin.events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')

      <div class="p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <!-- Left Column -->
          <div class="space-y-6">
            <!-- Judul Event -->
            <div>
              <label class="block text-sm font-semibold text-gray-700 mb-2">
                Judul Event <span class="text-red-500">*</span>
              </label>
              <input type="text" name="title" value="{{ old('title', $event->title) }}" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                placeholder="Contoh: Workshop Digital Marketing">
            </div>

            <!-- Tanggal Mulai -->
            <div>
              <label class="block text-sm font-semibold text-gray-700 mb-2">
                Tanggal Mulai <span class="text-red-500">*</span>
              </label>
              <input type="date" name="date_start" value="{{ old('date_start', $event->date_start) }}" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
            </div>

            <!-- Tanggal Selesai -->
            <div>
              <label class="block text-sm font-semibold text-gray-700 mb-2">Tanggal Selesai</label>
              <input type="date" name="date_end" value="{{ old('date_end', $event->date_end) }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
            </div>

            <!-- Lokasi -->
            <div>
              <label class="block text-sm font-semibold text-gray-700 mb-2">Lokasi</label>
              <input type="text" name="location" value="{{ old('location', $event->location) }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                placeholder="Contoh: Aula Rumah BUMN">
            </div>

            <!-- Penyelenggara -->
            <div>
              <label class="block text-sm font-semibold text-gray-700 mb-2">Penyelenggara</label>
              <input type="text" name="organizer" value="{{ old('organizer', $event->organizer) }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                placeholder="Contoh: Rumah BUMN Sidoarjo">
            </div>
          </div>

          <!-- Right Column -->
          <div class="space-y-6">
            <!-- Pemateri/Speaker -->
            <div>
              <label class="block text-sm font-semibold text-gray-700 mb-2">Pemateri/Speaker</label>
              <input type="text" name="speaker" value="{{ old('speaker', $event->speaker) }}"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
                placeholder="Contoh: Dr. Ahmad Fauzi">
            </div>

            <!-- Status -->
            <div>
              <label class="block text-sm font-semibold text-gray-700 mb-2">
                Status <span class="text-red-500">*</span>
              </label>
              <select name="status" required
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors">
                <option value="Akan Datang" {{ old('status', $event->status) == 'Akan Datang' ? 'selected' : '' }}>Akan Datang</option>
                <option value="Sedang Berlangsung" {{ old('status', $event->status) == 'Sedang Berlangsung' ? 'selected' : '' }}>Sedang Berlangsung</option>
                <option value="Selesai" {{ old('status', $event->status) == 'Selesai' ? 'selected' : '' }}>Selesai</option>
              </select>
            </div>

            <!-- Poster Event -->
            <div>
              <label class="block text-sm font-semibold text-gray-700 mb-2">Poster Event</label>
              @if($event->poster)
                <div class="mb-3 p-3 bg-gray-50 rounded-lg border border-gray-200">
                  <img src="{{ Storage::url($event->poster) }}" alt="Poster" class="w-full h-48 object-cover rounded-lg mb-2">
                  <p class="text-xs text-gray-600">Poster saat ini</p>
                </div>
              @endif
              <input type="file" name="poster" accept="image/*"
                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-gray-50 file:text-gray-700 hover:file:bg-gray-100">
              <p class="text-xs text-gray-500 mt-1">Format: JPG, PNG (Max 2MB). Biarkan kosong jika tidak ingin mengubah.</p>
            </div>
          </div>
        </div>

        <!-- Deskripsi Full Width -->
        <div class="mt-6">
          <label class="block text-sm font-semibold text-gray-700 mb-2">Deskripsi</label>
          <textarea name="description" rows="5"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
            placeholder="Jelaskan detail event...">{{ old('description', $event->description) }}</textarea>
        </div>
      </div>

      <!-- Form Footer -->
      <div class="bg-gray-50 px-6 py-4 flex items-center justify-end space-x-3 border-t border-gray-200">
        <a href="{{ route('admin.events.index') }}" 
           class="px-6 py-2 bg-white border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition-colors duration-200">
          Batal
        </a>
        <button type="submit" 
                class="px-6 py-2 bg-gray-800 hover:bg-gray-900 text-white font-semibold rounded-lg transition-colors duration-200 flex items-center">
          <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
          </svg>
          Update Event
        </button>
      </div>
    </form>
  </div>
        </div>
    </div>
</x-admin-layout>