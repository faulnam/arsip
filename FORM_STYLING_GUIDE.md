# 📝 Form Styling Guide - Rumah BUMN Sidoarjo

## 🎨 Overview

Panduan konsisten untuk styling form create/edit di semua halaman admin dengan design system modern dan elegant.

---

## 🎯 Design Principles

### 1. Consistency with Color Theme

-   **Archives (Blue)**: `focus:ring-blue-500`, `bg-blue-600`
-   **Events (Purple)**: `focus:ring-purple-500`, `bg-purple-600`
-   **Categories (Green)**: `focus:ring-green-500`, `bg-green-600`

### 2. User Experience

-   ✅ Clear visual hierarchy
-   ✅ Helpful placeholder text
-   ✅ Required field indicators (\*)
-   ✅ Inline validation errors
-   ✅ File upload with custom styling
-   ✅ Responsive grid layout

---

## 📐 Form Structure

### Complete Template

```blade
@extends('layouts.app')

@section('content')
<div class="py-6">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-6">
            <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
                <div class="mb-4 sm:mb-0">
                    <h2 class="text-2xl font-bold text-gray-800 flex items-center">
                        <span class="bg-{color}-100 p-2 rounded-lg mr-3">
                            {icon}
                        </span>
                        {Title}
                    </h2>
                    <p class="text-gray-600 mt-1 ml-14">{Subtitle}</p>
                </div>
                <a href="{back_route}" class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white font-semibold rounded-lg transition-colors duration-200">
                    {Back Button}
                </a>
            </div>
        </div>

        <!-- Error Messages -->
        @if ($errors->any())
            {Error Block}
        @endif

        <!-- Form Card -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <form action="{route}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="p-6 space-y-6">
                    {Form Fields}
                </div>

                <!-- Form Footer -->
                <div class="bg-gray-50 px-6 py-4 flex items-center justify-end space-x-3 border-t border-gray-200">
                    {Action Buttons}
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
```

---

## 🧩 Components

### 1. Header Section

```blade
<div class="mb-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
        <div class="mb-4 sm:mb-0">
            <h2 class="text-2xl font-bold text-gray-800 flex items-center">
                <span class="bg-blue-100 p-2 rounded-lg mr-3">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                </span>
                Tambah Arsip Pelatihan
            </h2>
            <p class="text-gray-600 mt-1 ml-14">Isi form untuk menambah arsip baru</p>
        </div>
        <a href="{{ route('admin.archives.index') }}"
           class="inline-flex items-center px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white font-semibold rounded-lg transition-colors duration-200">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
            </svg>
            Kembali
        </a>
    </div>
</div>
```

### 2. Error Messages Block

```blade
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
```

### 3. Text Input Field

```blade
<div>
    <label class="block text-sm font-semibold text-gray-700 mb-2">
        Judul Pelatihan <span class="text-red-500">*</span>
    </label>
    <input type="text"
           name="title"
           value="{{ old('title') }}"
           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
           placeholder="Masukkan judul pelatihan"
           required>
</div>
```

### 4. Textarea Field

```blade
<div>
    <label class="block text-sm font-semibold text-gray-700 mb-2">
        Deskripsi
    </label>
    <textarea name="description"
              rows="4"
              class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
              placeholder="Deskripsikan kegiatan">{{ old('description') }}</textarea>
</div>
```

### 5. Select/Dropdown Field

```blade
<div>
    <label class="block text-sm font-semibold text-gray-700 mb-2">
        Kategori <span class="text-red-500">*</span>
    </label>
    <select name="category_id"
            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
            required>
        <option value="">-- Pilih Kategori --</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>
```

### 6. Date Input Field

```blade
<div>
    <label class="block text-sm font-semibold text-gray-700 mb-2">
        Tanggal Kegiatan <span class="text-red-500">*</span>
    </label>
    <input type="date"
           name="date"
           value="{{ old('date') }}"
           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors"
           required>
</div>
```

### 7. File Upload Field

```blade
<div>
    <label class="block text-sm font-semibold text-gray-700 mb-2">
        Dokumentasi Kegiatan (Gambar)
    </label>
    <input type="file"
           name="documentation[]"
           class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100"
           multiple
           accept="image/*">
    <p class="mt-1 text-sm text-gray-500">Bisa pilih lebih dari satu gambar</p>
</div>
```

### 8. Grid Layout (2 Columns)

```blade
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    <div>
        {Field 1}
    </div>
    <div>
        {Field 2}
    </div>
</div>
```

### 9. Form Footer/Action Buttons

```blade
<div class="bg-gray-50 px-6 py-4 flex items-center justify-end space-x-3 border-t border-gray-200">
    <a href="{{ route('admin.archives.index') }}"
       class="px-6 py-2 bg-white border border-gray-300 text-gray-700 font-medium rounded-lg hover:bg-gray-50 transition-colors duration-200">
        Batal
    </a>
    <button type="submit"
            class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg transition-colors duration-200 flex items-center">
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
        </svg>
        Simpan Arsip
    </button>
</div>
```

---

## 🎨 Color Mapping

### Archives (Blue Theme)

```css
/* Focus Ring */
focus:ring-blue-500
focus:border-blue-500

/* File Upload */
file:bg-blue-50
file:text-blue-700
hover:file:bg-blue-100

/* Submit Button */
bg-blue-600
hover:bg-blue-700

/* Header Icon */
bg-blue-100 (container)
text-blue-600 (icon)
```

### Events (Purple Theme)

```css
/* Focus Ring */
focus:ring-purple-500
focus:border-purple-500

/* File Upload */
file:bg-purple-50
file:text-purple-700
hover:file:bg-purple-100

/* Submit Button */
bg-purple-600
hover:bg-purple-700

/* Header Icon */
bg-purple-100 (container)
text-purple-600 (icon)
```

### Categories (Green Theme)

```css
/* Focus Ring */
focus:ring-green-500
focus:border-green-500

/* File Upload */
file:bg-green-50
file:text-green-700
hover:file:bg-green-100

/* Submit Button */
bg-green-600
hover:bg-green-700

/* Header Icon */
bg-green-100 (container)
text-green-600 (icon)
```

---

## 📱 Responsive Design

### Container Width

-   Small screens: `px-4`
-   Medium screens: `sm:px-6`
-   Large screens: `lg:px-8`
-   Max width: `max-w-4xl` (forms), `max-w-3xl` (simple forms)

### Grid Breakpoints

```blade
<!-- 2 Columns on Desktop, 1 on Mobile -->
<div class="grid grid-cols-1 md:grid-cols-2 gap-6">
    ...
</div>
```

### Header Responsive

```blade
<!-- Stack on mobile, side-by-side on desktop -->
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between">
    ...
</div>
```

---

## 🔧 Form Field Classes

### Base Input Class

```css
w-full px-4 py-2 border border-gray-300 rounded-lg
focus:ring-2 focus:ring-{color}-500 focus:border-{color}-500
transition-colors
```

### Label Class

```css
block text-sm font-semibold text-gray-700 mb-2
```

### Required Indicator

```html
<span class="text-red-500">*</span>
```

### Optional Indicator

```html
<span class="text-gray-500 text-xs">(Opsional)</span>
```

### Help Text

```css
mt-1 text-sm text-gray-500
```

---

## ✅ Implementation Checklist

### Per Form Page

-   [ ] Header dengan icon badge sesuai warna modul
-   [ ] Subtitle descriptive
-   [ ] Back button dengan arrow icon
-   [ ] Error messages block
-   [ ] All fields dengan label proper
-   [ ] Required fields marked with (\*)
-   [ ] Optional fields marked with (Opsional)
-   [ ] Placeholder text helpful
-   [ ] Focus ring sesuai color theme
-   [ ] File upload dengan custom styling
-   [ ] Grid layout untuk paired fields
-   [ ] Form footer dengan Cancel & Submit
-   [ ] Submit button dengan checkmark icon
-   [ ] Old input values preserved
-   [ ] Responsive pada mobile

---

## 🚀 Completed Forms

### ✅ Archives Create

-   Blue theme
-   All fields styled
-   Grid layout untuk paired fields
-   File upload untuk documentation & material
-   Video embed optional field

### ✅ Events Create

-   Purple theme
-   Date range (start & end)
-   Status dropdown
-   Poster upload
-   Speaker & organizer fields

### ✅ Categories Create

-   Green theme
-   Minimal 2 fields (name & description)
-   Simple clean design
-   Fast input experience

---

## 🎓 Best Practices

### 1. Label Text

-   Use descriptive labels
-   Add required indicator (\*)
-   Include optional tag when needed

### 2. Placeholder Text

-   Provide examples: `Contoh: Rumah BUMN Sidoarjo`
-   Be specific: `Masukkan link embed YouTube`
-   Don't repeat label text

### 3. Help Text

-   Add below field: `<p class="mt-1 text-sm text-gray-500">...</p>`
-   Explain format: `Format: JPG, PNG, GIF (Max 2MB)`
-   Give examples when useful

### 4. Validation

-   Mark required fields clearly
-   Preserve old() values on error
-   Show all errors in dedicated block
-   Use inline errors when needed

### 5. File Uploads

-   Custom file button styling
-   Accept attribute for file types
-   Help text for file requirements
-   Color-coded to match theme

---

## 📊 Form Sizing Guide

### Container

-   Simple forms (1-3 fields): `max-w-3xl`
-   Normal forms (4-8 fields): `max-w-4xl`
-   Complex forms (9+ fields): `max-w-5xl`

### Spacing

-   Between fields: `space-y-6`
-   Grid gap: `gap-6`
-   Form padding: `p-6`
-   Footer padding: `px-6 py-4`

### Input Height

-   Text inputs: `py-2` (consistent)
-   Textarea: `rows="4"` default
-   Select: Same as text input

---

**Last Updated:** 17 Oktober 2025  
**Status:** ✅ Production Ready  
**Files:** 3 create forms completed
