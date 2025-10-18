<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Archive;
use App\Models\Event;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ArchiveController extends Controller
{
    // Landing page: tampilkan events + archives (publik)
    public function index(Request $request)
    {
        // Ambil kategori untuk filter
        $categories = Category::orderBy('name')->get();
        
        // Query events dengan filter
        $query = Event::with('archives');
        
        // Filter berdasarkan kategori jika ada
        if ($request->filled('category')) {
            $query->where('category_id', $request->category);
        }
        
        // Filter berdasarkan pencarian
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('location', 'like', "%{$search}%")
                  ->orWhere('organizer', 'like', "%{$search}%");
            });
        }
        
        $events = $query->latest('date_start')->get();
        
        // Ambil arsip terbaru untuk ditampilkan
        $archives = Archive::with('event')
            ->latest('created_at')
            ->take(6)
            ->get();
        
        return view('landing', compact('events', 'categories', 'archives'));
    }

    // Admin: daftar arsip
    public function adminIndex()
    {
        $archives = Archive::with('event')->latest()->paginate(15);
        return view('admin.archives.index', compact('archives'));
    }

    // Form create (tampilkan dropdown event)
    public function create()
    {
        $events = Event::orderBy('date_start', 'desc')->get();
        $categories = Category::orderBy('name', 'asc')->get();
        return view('admin.archives.create', compact('events', 'categories'));
    }

    // Simpan arsip baru
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'nullable|date',
            'location' => 'nullable|string|max:255',
            'organizer' => 'nullable|string|max:255',
            'presenter_name' => 'nullable|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'event_id' => 'nullable|exists:events,id',
            'material' => 'nullable|file|mimes:pdf|max:10240',
            'documentation.*' => 'nullable|image|max:5120',
            'video_embed' => 'nullable|string|max:500',
        ]);

        // Handle file uploads
        if ($request->hasFile('material')) {
            $data['material'] = $request->file('material')->store('archives/materials', 'public');
        }

        // Handle multiple documentation images
        if ($request->hasFile('documentation')) {
            $documentationPaths = [];
            foreach ($request->file('documentation') as $file) {
                $documentationPaths[] = $file->store('archives/documentation', 'public');
            }
            $data['documentation'] = $documentationPaths;
        }

        Archive::create($data);

        return redirect()->route('admin.archives.index')->with('success', 'Arsip berhasil disimpan.');
    }

    // Tampilkan detail arsip
    public function show(Archive $archive)
    {
        $archive->load('event');
        // Cek apakah request dari admin atau publik
        if (request()->is('admin/*')) {
            return view('admin.archives.show', compact('archive'));
        }
        return view('admin.archives.show', compact('archive'));
    }

    // Form edit
    public function edit(Archive $archive)
    {
        $events = Event::orderBy('date_start', 'desc')->get();
        $categories = Category::orderBy('name', 'asc')->get();
        return view('admin.archives.edit', compact('archive', 'events', 'categories'));
    }

    // Update arsip
    public function update(Request $request, Archive $archive)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'nullable|date',
            'location' => 'nullable|string|max:255',
            'organizer' => 'nullable|string|max:255',
            'presenter_name' => 'nullable|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'event_id' => 'nullable|exists:events,id',
            'material' => 'nullable|file|mimes:pdf|max:10240',
            'documentation.*' => 'nullable|image|max:5120',
            'video_embed' => 'nullable|string|max:500',
        ]);

        if ($request->hasFile('material')) {
            if ($archive->material) Storage::disk('public')->delete($archive->material);
            $data['material'] = $request->file('material')->store('archives/materials', 'public');
        }

        if ($request->hasFile('documentation')) {
            if ($archive->documentation && is_array($archive->documentation)) {
                foreach ($archive->documentation as $doc) {
                    Storage::disk('public')->delete($doc);
                }
            }
            $documentationPaths = [];
            foreach ($request->file('documentation') as $file) {
                $documentationPaths[] = $file->store('archives/documentation', 'public');
            }
            $data['documentation'] = $documentationPaths;
        }

        $archive->update($data);

        return redirect()->route('admin.archives.index')->with('success', 'Arsip berhasil diupdate.');
    }

    // Hapus arsip
    public function destroy(Archive $archive)
    {
        if ($archive->material) Storage::disk('public')->delete($archive->material);
        if ($archive->documentation && is_array($archive->documentation)) {
            foreach ($archive->documentation as $doc) {
                Storage::disk('public')->delete($doc);
            }
        }

        $archive->delete();

        return redirect()->route('admin.archives.index')->with('success', 'Arsip berhasil dihapus.');
    }
}
