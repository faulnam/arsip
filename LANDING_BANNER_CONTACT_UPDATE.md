# 🎨 Landing Page - Banner Carousel & Contact Cards Update

**Tanggal**: 18 Oktober 2025
**Status**: ✅ SELESAI

---

## 📋 Update Overview

Landing page telah ditingkatkan dengan dua fitur baru yang modern dan interaktif:
1. **Banner Carousel** - Hero carousel dengan auto-rotation
2. **Contact Cards** - Kontak section yang terpisah dengan card design

---

## 🎯 Fitur Baru

### 1. Banner Carousel ✨

**Lokasi**: Setelah navbar, menggantikan hero section statis

**Fitur:**
- 🔄 **Auto-rotation** setiap 5 detik
- 📱 **Responsive** di semua devices
- 🎨 **Gradient overlay** untuk readability
- ⬅️➡️ **Navigation arrows** untuk kontrol manual
- 🔘 **Indicator dots** dengan active state
- ✨ **Smooth transitions** dengan Alpine.js
- 🎯 **CTA buttons** (Lihat Arsip & Event Terbaru)

**Alpine.js Implementation:**
```javascript
x-data="{ 
    currentBanner: 0, 
    banners: [
        {
            image: 'url',
            title: 'Title',
            subtitle: 'Subtitle'
        }
    ]
}"
x-init="setInterval(() => { 
    currentBanner = (currentBanner + 1) % banners.length 
}, 5000)"
```

**Banner Content:**
1. **Banner 1**: Selamat Datang di Rumah BUMN Sidoarjo
2. **Banner 2**: Program Pelatihan Berkualitas
3. **Banner 3**: Kolaborasi untuk Kemajuan

**Design Elements:**
- Height: 400px (mobile) - 500px (desktop)
- Background: Full-width images dengan gradient overlay
- Typography: Text-4xl/5xl/6xl responsive
- CTA Buttons: White primary, Gray-800 secondary dengan border

---

### 2. Contact Section Redesign 💳

**Struktur Baru:**

#### A. Lokasi (Map Section)
**Lokasi**: Section pertama dengan background gray-50
- Google Maps full-width
- Rounded card design
- Shadow-lg untuk depth
- Aspect-ratio video untuk responsive

#### B. Hubungi Kami (Contact Cards)
**Lokasi**: Section kedua dengan background white

**4 Contact Cards:**

1. **📍 Alamat Card**
   - Icon: Location marker
   - Content: Jl. Raya Ponti No.5, Lemahputro, Sidoarjo

2. **📞 Telepon Card**
   - Icon: Phone
   - Content: (+62) 812-3456-7890
   - Clickable: tel: link

3. **✉️ Email Card**
   - Icon: Envelope
   - Content: info@rumahbumnsidoarjo.id
   - Clickable: mailto: link

4. **🕐 Jam Operasional Card**
   - Icon: Clock
   - Content: Senin - Jumat, 08:00 - 16:00 WIB

**Card Design:**
```css
- Background: White
- Border: Gray-200
- Shadow: Shadow-lg
- Hover: Shadow-xl dengan transition
- Icon Container: Gray-100 rounded-full (w-14 h-14)
- Grid: 1 column (mobile) → 2 columns (md) → 4 columns (lg)
```

#### C. Social Media Section
**Design**: Gradient card (gray-800 to gray-900)

**Features:**
- Dark gradient background
- White text dengan gray-300 subtitle
- 4 social media icons:
  - Instagram
  - Facebook
  - WhatsApp
  - Email
- Hover effects: Scale-110 animation
- White icon background dengan shadow-lg

---

## 🎨 Design System

### Banner Carousel
**Colors:**
- Overlay: Gray-900 dengan opacity gradient
- Text: White
- Primary CTA: White background
- Secondary CTA: Gray-800 dengan white border

**Typography:**
- Title: text-4xl md:text-5xl lg:text-6xl, font-bold
- Subtitle: text-lg md:text-xl, text-gray-200

**Spacing:**
- Section height: h-[400px] md:h-[500px]
- Content padding: px-4 sm:px-6 lg:px-8
- Button gap: gap-4

### Contact Cards
**Colors:**
- Card Background: White
- Icon Container: Gray-100
- Icon Color: Gray-700
- Text Primary: Gray-800
- Text Secondary: Gray-600
- Border: Gray-200

**Typography:**
- Card Title: text-lg, font-semibold
- Content: text-sm, text-gray-600

**Spacing:**
- Card Padding: p-6
- Grid Gap: gap-6
- Icon Size: w-14 h-14
- Icon SVG: w-7 h-7

---

## 🔧 Technical Implementation

### Banner Carousel (Alpine.js)

**Features:**
1. **Auto-rotation:**
   ```javascript
   x-init="setInterval(() => { 
       currentBanner = (currentBanner + 1) % banners.length 
   }, 5000)"
   ```

2. **Manual Navigation:**
   ```html
   <!-- Previous -->
   @click="currentBanner = currentBanner === 0 ? banners.length - 1 : currentBanner - 1"
   
   <!-- Next -->
   @click="currentBanner = (currentBanner + 1) % banners.length"
   ```

3. **Smooth Transitions:**
   ```html
   x-transition:enter="transition ease-out duration-700"
   x-transition:enter-start="opacity-0 transform translate-x-full"
   x-transition:enter-end="opacity-100 transform translate-x-0"
   ```

4. **Indicators:**
   ```html
   :class="currentBanner === index ? 'bg-white w-8' : 'bg-white/50 w-3'"
   ```

### Contact Cards

**Responsive Grid:**
```html
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
```

**Card Hover Effect:**
```html
class="hover:shadow-xl transition-shadow duration-300"
```

**Icon Container:**
```html
<div class="w-14 h-14 bg-gray-100 rounded-full flex items-center justify-center">
```

---

## 📱 Responsive Design

### Banner Carousel
**Breakpoints:**
- Mobile (< 768px): Single column, text-4xl
- Tablet (≥ 768px): Two-column CTA, text-5xl
- Desktop (≥ 1024px): Full layout, text-6xl

**Height:**
- Mobile: 400px
- Desktop: 500px

### Contact Cards
**Grid Layout:**
- Mobile: 1 column (stack vertically)
- Tablet: 2 columns (2x2 grid)
- Desktop: 4 columns (single row)

### Social Media
**Icon Layout:**
- All devices: Horizontal flex row
- Center aligned
- Equal spacing (space-x-4)

---

## ✅ Removed Features

**Hero Section (Old):**
- ❌ Static gradient background
- ❌ Centered text only
- ❌ No images
- ❌ Simple layout

**Contact Section (Old):**
- ❌ Two-column layout (info + map)
- ❌ List-based contact info
- ❌ Small social icons at bottom
- ❌ Single section design

---

## 🚀 New User Experience

### Banner Carousel Benefits:
1. ✅ **Visual Appeal** - Eye-catching images
2. ✅ **Dynamic Content** - Multiple messages
3. ✅ **User Control** - Manual navigation
4. ✅ **Clear CTAs** - Direct action buttons
5. ✅ **Auto-rotation** - Engaging without clicks

### Contact Cards Benefits:
1. ✅ **Scannable** - Icon-driven design
2. ✅ **Organized** - Separate map and contact sections
3. ✅ **Accessible** - Clickable phone & email
4. ✅ **Professional** - Card-based layout
5. ✅ **Prominent Social** - Dark gradient section
6. ✅ **Informative** - Operating hours included

---

## 🎯 Customization Guide

### Mengubah Banner Images:
Edit array `banners` di Alpine.js:
```javascript
banners: [
    {
        image: 'URL_GAMBAR_ANDA',
        title: 'Judul Banner',
        subtitle: 'Subtitle Banner'
    }
]
```

### Mengubah Auto-rotation Speed:
Edit interval di `x-init` (dalam milliseconds):
```javascript
setInterval(() => { ... }, 5000) // 5000 = 5 detik
```

### Menambah/Kurangi Contact Cards:
Edit grid di section contact cards:
```html
<!-- 3 columns di desktop -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
```

### Mengubah Jam Operasional:
Edit text di Operating Hours card:
```html
<p class="text-gray-600 text-sm leading-relaxed">
    Senin - Sabtu<br>
    09:00 - 17:00 WIB
</p>
```

---

## 📝 File Changes

**Modified:**
- ✅ `resources/views/landing.blade.php`
  - Added: Banner Carousel section (after navbar)
  - Removed: Static Hero section
  - Replaced: Contact & Lokasi section
  - Added: Separate Hubungi Kami section
  - Updated: Social media in gradient card

**Lines Changed:**
- Before: ~537 lines
- After: ~680 lines
- Net Addition: ~143 lines

---

## 🧪 Testing Checklist

**Banner Carousel:**
- [ ] Auto-rotation berfungsi (5 detik)
- [ ] Previous arrow bekerja
- [ ] Next arrow bekerja
- [ ] Indicator dots clickable
- [ ] Active indicator berubah warna
- [ ] Transitions smooth
- [ ] CTA buttons link ke section yang benar
- [ ] Responsive di mobile
- [ ] Images load correctly

**Contact Cards:**
- [ ] 4 cards tampil dengan benar
- [ ] Grid responsive (1→2→4 columns)
- [ ] Icons tampil
- [ ] Phone number clickable (opens dialer)
- [ ] Email clickable (opens mail client)
- [ ] Hover effects bekerja
- [ ] Social media links benar
- [ ] Social icons hover scale
- [ ] Google Maps loads

**Overall:**
- [ ] No console errors
- [ ] Smooth scroll dari banner CTA
- [ ] Mobile menu masih berfungsi
- [ ] All sections visible
- [ ] Performance acceptable

---

## 🎉 Summary

**Landing page sekarang memiliki:**
- ✅ **Modern Banner Carousel** dengan 3 slides auto-rotating
- ✅ **Professional Contact Cards** dalam 4-column grid
- ✅ **Separated Sections** untuk better organization
- ✅ **Enhanced Visual Appeal** dengan images dan gradients
- ✅ **Better User Experience** dengan clear CTAs
- ✅ **Full Alpine.js Integration** untuk smooth interactions

**Status**: 🎊 **COMPLETE!**

---

*Updated by nafisbgt | Rumah BUMN Sidoarjo © 2025*
