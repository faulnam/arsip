# Update Admin Panel - Sidebar Layout

## Perubahan yang Sudah Dilakukan

### 1. Layout Baru dengan Sidebar
File: `resources/views/layouts/admin.blade.php`

Fitur:
- ✅ Sidebar permanen di desktop, collapsible di mobile
- ✅ Desain profesional dan formal tanpa warna-warna mencolok
- ✅ Menggunakan palet warna abu-abu dan hitam
- ✅ User info di sidebar
- ✅ Menu terorganisir dengan baik (Dashboard, Manajemen Data, Pengaturan)
- ✅ Indikator active menu
- ✅ Responsive untuk mobile

### 2. Component AdminLayout
File: `app/View/Components/AdminLayout.php`

### 3. Dashboard Admin
File: `resources/views/admin/dashboard.blade.php`

Perubahan:
- ✅ Menggunakan layout admin baru
- ✅ Menghapus gradient warna yang colorful
- ✅ Menggunakan warna abu-abu profesional
- ✅ Border subtle tanpa warna mencolok
- ✅ Chart dengan warna yang lebih formal

## File-File yang Perlu Diupdate

Untuk konsistensi, semua file admin berikut perlu diupdate dari:
```blade
@extends('layouts.app')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- content -->
    </div>
</div>
@endsection
```

Menjadi:
```blade
<x-admin-layout>
    <x-slot name="header">
        [Judul Halaman]
    </x-slot>

    <!-- content tanpa wrapper py-6 dan max-w-7xl karena sudah ada di layout -->
    
</x-admin-layout>
```

### Daftar File yang Perlu Diupdate:

#### Archives
1. `resources/views/admin/archives/index.blade.php`
2. `resources/views/admin/archives/create.blade.php`
3. `resources/views/admin/archives/edit.blade.php`
4. `resources/views/admin/archives/show.blade.php`

#### Events
5. `resources/views/admin/events/index.blade.php`
6. `resources/views/admin/events/create.blade.php`
7. `resources/views/admin/events/edit.blade.php`
8. `resources/views/admin/events/show.blade.php`

#### Categories
9. `resources/views/admin/categories/index.blade.php`
10. `resources/views/admin/categories/create.blade.php`
11. `resources/views/admin/categories/edit.blade.php`

## Panduan Update Manual

Untuk setiap file, lakukan perubahan berikut:

1. Ganti `@extends('layouts.app')` dengan `<x-admin-layout>`
2. Ganti `@section('content')` dengan slot header untuk judul
3. Hapus wrapper `<div class="py-6">` dan `<div class="max-w-7xl mx-auto...">`
4. Ganti `@endsection` dengan `</x-admin-layout>`
5. Update warna-warna colorful:
   - `bg-blue-600` → `bg-gray-800`
   - `bg-purple-600` → `bg-gray-700`
   - `bg-green-600` → `bg-gray-600`
   - `text-blue-600` → `text-gray-700`
   - Border colors menjadi `border-gray-200` atau `border-gray-300`

## Warna Profesional yang Digunakan

### Primary Colors
- Background utama: `bg-gray-50`
- Card background: `bg-white`
- Border: `border-gray-200`

### Buttons & Actions
- Primary button: `bg-gray-800 hover:bg-gray-900`
- Secondary button: `bg-gray-600 hover:bg-gray-700`
- Danger button: `bg-red-600 hover:bg-red-700` (untuk delete)

### Text
- Heading: `text-gray-800` atau `text-gray-900`
- Body text: `text-gray-600`
- Muted text: `text-gray-500`

### Icons & Accents
- Icon color: `text-gray-700`
- Muted icons: `text-gray-400`
- Active state: `bg-gray-100` dengan `text-gray-900`

## Testing

Setelah semua file diupdate, test:
1. ✅ Dashboard admin - sudah selesai
2. ⏳ Index pages (archives, events, categories)
3. ⏳ Create pages
4. ⏳ Edit pages
5. ⏳ Show/detail pages
6. ⏳ Responsiveness di mobile
7. ⏳ Active menu states saat navigasi
