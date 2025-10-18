<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::with('archives')->latest('date_start')->paginate(12);
        return view('admin.events.index', compact('events'));
    }

    public function create()
    {
        return view('admin.events.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date_start' => 'required|date',
            'date_end' => 'nullable|date|after_or_equal:date_start',
            'location' => 'nullable|string|max:255',
            'organizer' => 'nullable|string|max:255',
            'speaker' => 'nullable|string|max:255',
            'poster' => 'nullable|image|max:5120',
            'status' => ['required', Rule::in(['Akan Datang','Sedang Berlangsung','Selesai'])],
        ]);

        if ($request->hasFile('poster')) {
            $data['poster'] = $request->file('poster')->store('events/posters', 'public');
        }

        Event::create($data);

        return redirect()->route('admin.events.index')->with('success', 'Event berhasil dibuat.');
    }

    public function show(Event $event)
    {
        $event->load('archives');
        // Cek apakah request dari admin atau publik
        if (request()->is('admin/*')) {
            return view('admin.events.show', compact('event'));
        }
        return view('events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date_start' => 'required|date',
            'date_end' => 'nullable|date|after_or_equal:date_start',
            'location' => 'nullable|string|max:255',
            'organizer' => 'nullable|string|max:255',
            'speaker' => 'nullable|string|max:255',
            'poster' => 'nullable|image|max:5120',
            'status' => ['required', Rule::in(['Akan Datang','Sedang Berlangsung','Selesai'])],
        ]);

        if ($request->hasFile('poster')) {
            if ($event->poster) Storage::disk('public')->delete($event->poster);
            $data['poster'] = $request->file('poster')->store('events/posters', 'public');
        }

        $event->update($data);

        return redirect()->route('admin.events.index')->with('success', 'Event berhasil diupdate.');
    }

    public function destroy(Event $event)
    {
        if ($event->poster) Storage::disk('public')->delete($event->poster);
        $event->delete();

        return redirect()->route('admin.events.index')->with('success', 'Event berhasil dihapus.');
    }
}
