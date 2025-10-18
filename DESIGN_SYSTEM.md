# 🎨 Design System - Rumah BUMN Sidoarjo

## 📋 Overview

Design system yang konsisten dan modern untuk seluruh halaman admin dengan fokus pada **formalitas, profesionalitas, dan kemudahan penggunaan**.

---

## 🎨 Color Palette

### Primary Colors (Konsisten di Semua Halaman)

```css
/* Blue - Untuk Arsip */
--primary-blue: #3B82F6     /* bg-blue-600 */
--primary-blue-hover: #2563EB /* bg-blue-700 */
--primary-blue-light: #DBEAFE /* bg-blue-100 */

/* Purple - Untuk Event */
--primary-purple: #A855F7   /* bg-purple-600 */
--primary-purple-hover: #9333EA /* bg-purple-700 */
--primary-purple-light: #F3E8FF /* bg-purple-100 */

/* Green - Untuk Kategori */
--primary-green: #16A34A    /* bg-green-600 */
--primary-green-hover: #15803D /* bg-green-700 */
--primary-green-light: #DCFCE7 /* bg-green-100 */
```

### Supporting Colors

```css
/* Gray Scale */
--gray-50: #F9FAFB
--gray-100: #F3F4F6
--gray-200: #E5E7EB
--gray-500: #6B7280
--gray-700: #374151
--gray-800: #1F2937

/* Action Colors */
--success: #22C55E    /* bg-green-500 */
--warning: #FBBF24    /* bg-yellow-400 */
--danger: #EF4444     /* bg-red-500 */
--info: #3B82F6       /* bg-blue-500 */
```

---

## 📐 Component Design

### 1. Page Header

**Konsisten di semua halaman index (Archives, Events, Categories)**

```blade
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
        <a href="{route}" class="inline-flex items-center px-4 py-2 bg-{color}-600 hover:bg-{color}-700 text-white font-semibold rounded-lg shadow-md transition-colors duration-200">
            {Button Content}
        </a>
    </div>
</div>
```

**Warna per Halaman:**

-   **Archives**: `bg-blue-100`, `bg-blue-600`, `bg-blue-700`
-   **Events**: `bg-purple-100`, `bg-purple-600`, `bg-purple-700`
-   **Categories**: `bg-green-100`, `bg-green-600`, `bg-green-700`

---

### 2. Success Alert

```blade
<div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded-lg">
    <div class="flex items-center">
        <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
            {checkmark icon}
        </svg>
        <p class="text-green-700 font-medium">{{ session('success') }}</p>
    </div>
</div>
```

---

### 3. Table Design

**Konsisten di semua halaman**

```blade
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">
                        {Column}
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr class="hover:bg-gray-50 transition-colors duration-150">
                    <td class="px-6 py-4 text-sm text-gray-700">
                        {Content}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
```

---

### 4. Action Buttons

**Icon-only buttons dengan warna konsisten**

```blade
<!-- Detail Button (Blue) -->
<a href="{route}"
   class="inline-flex items-center px-3 py-1 bg-blue-100 hover:bg-blue-200 text-blue-700 rounded-lg transition-colors duration-150"
   title="Detail">
    <svg class="w-4 h-4">...</svg>
</a>

<!-- Edit Button (Yellow) -->
<a href="{route}"
   class="inline-flex items-center px-3 py-1 bg-yellow-100 hover:bg-yellow-200 text-yellow-700 rounded-lg transition-colors duration-150"
   title="Edit">
    <svg class="w-4 h-4">...</svg>
</a>

<!-- Delete Button (Red) -->
<button type="submit"
        class="inline-flex items-center px-3 py-1 bg-red-100 hover:bg-red-200 text-red-700 rounded-lg transition-colors duration-150"
        title="Hapus">
    <svg class="w-4 h-4">...</svg>
</button>
```

---

### 5. Empty State

**Tampilan ketika data kosong**

```blade
<tr>
    <td colspan="{n}" class="px-6 py-12 text-center">
        <div class="flex flex-col items-center justify-center text-gray-500">
            <svg class="w-16 h-16 mb-4 text-gray-300">
                {relevant icon}
            </svg>
            <p class="text-lg font-semibold mb-2">{Empty Title}</p>
            <p class="text-sm mb-4">{Empty Description}</p>
            <a href="{route}"
               class="inline-flex items-center px-4 py-2 bg-{color}-600 hover:bg-{color}-700 text-white font-medium rounded-lg transition-colors duration-200">
                {CTA Button}
            </a>
        </div>
    </td>
</tr>
```

---

## 📊 Dashboard Components

### Statistics Cards

3 kartu dengan warna berbeda:

-   **Arsip**: Blue (`bg-blue-100`, `bg-blue-600`)
-   **Event**: Purple (`bg-purple-100`, `bg-purple-600`)
-   **Kategori**: Green (`bg-green-100`, `bg-green-600`)

### Charts (Chart.js)

1. **Event Status Chart** (Doughnut)

    - Selesai: Green (#22C55E)
    - Sedang Berlangsung: Yellow (#FBBF24)
    - Akan Datang: Blue (#3B82F6)

2. **Monthly Activity Chart** (Line)
    - Arsip: Blue (#3B82F6)
    - Event: Purple (#A855F7)
    - 6 bulan terakhir

---

## 🎯 Design Principles

### 1. Konsistensi Warna

-   **Blue**: Semua yang berkaitan dengan Arsip
-   **Purple**: Semua yang berkaitan dengan Event
-   **Green**: Semua yang berkaitan dengan Kategori

### 2. Spacing & Layout

-   Container: `max-w-7xl mx-auto px-4 sm:px-6 lg:px-8`
-   Section spacing: `mb-6` (24px)
-   Grid gap: `gap-6` (24px)
-   Card padding: `p-6` (24px)
-   Table cell: `px-6 py-4`

### 3. Typography

-   Page Title: `text-2xl font-bold text-gray-800`
-   Subtitle: `text-gray-600 text-sm` atau `text-base`
-   Body text: `text-sm text-gray-700`
-   Table header: `text-xs font-semibold text-gray-700 uppercase`

### 4. Interactive Elements

-   Transition: `transition-colors duration-150` atau `duration-200`
-   Hover states: Selalu lebih gelap dari warna dasar
-   Rounded corners: `rounded-lg` (8px)
-   Shadows: `shadow-md` untuk cards

### 5. Icons

-   Heroicons (dari Tailwind)
-   Size: `w-4 h-4` untuk button icons, `w-5 h-5` atau `w-6 h-6` untuk headers
-   Color: Sesuai dengan tema komponen

---

## 🚀 Implementation Status

### ✅ Completed

-   [x] Archives Index - Blue theme
-   [x] Events Index - Purple theme
-   [x] Categories Index - Green theme
-   [x] Dashboard with Charts
-   [x] Consistent table design
-   [x] Unified action buttons
-   [x] Empty states
-   [x] Success alerts

### 🔄 Next Steps (If Needed)

-   [ ] Create/Edit forms styling
-   [ ] Detail pages styling
-   [ ] Mobile responsive optimization
-   [ ] Loading states
-   [ ] Error handling UI

---

## 📱 Responsive Breakpoints

```css
sm:  640px  /* Small devices */
md:  768px  /* Medium devices */
lg:  1024px /* Large devices */
xl:  1280px /* Extra large devices */
```

### Grid Adjustments

-   Mobile: 1 column (`grid-cols-1`)
-   Tablet: 2 columns (`md:grid-cols-2`)
-   Desktop: 3 columns (`lg:grid-cols-3`)

---

## 🎨 Chart.js Configuration

### CDN

```html
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
```

### Chart Options

-   Font family: `'Inter', sans-serif`
-   Responsive: `true`
-   Maintain aspect ratio: `false`
-   Tooltip background: `rgba(0, 0, 0, 0.8)`
-   Legend position: `bottom`

---

## 📚 Resources

-   **Tailwind CSS**: https://tailwindcss.com/docs
-   **Heroicons**: https://heroicons.com/
-   **Chart.js**: https://www.chartjs.org/docs/latest/
-   **Laravel Blade**: https://laravel.com/docs/blade

---

**Last Updated:** 17 Oktober 2025  
**Version:** 2.0  
**Status:** ✅ Production Ready
