<x-admin-layout>
    <x-slot name="header">
        Dashboard Admin
    </x-slot>

    <!-- Welcome Message -->
    <div class="bg-white border-l-4 border-gray-800 rounded-lg shadow-sm p-6 mb-6">
        <h3 class="text-2xl font-bold text-gray-800 mb-2">Selamat Datang, {{ Auth::user()->name ?? 'Admin' }}!</h3>
        <p class="text-gray-600">Kelola sistem arsip dan event Rumah BUMN Sidoarjo dengan mudah</p>
    </div>

            <!-- Statistics Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                <!-- Card Total Arsip Pelatihan -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 hover:shadow-md transition-shadow duration-300">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-gray-100 rounded-lg">
                                <svg class="w-8 h-8 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                                </svg>
                            </div>
                            <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Arsip</span>
                        </div>
                        <h3 class="text-3xl font-bold text-gray-800 mb-2">{{ \App\Models\Archive::count() }}</h3>
                        <p class="text-gray-600 text-sm mb-4">Total Arsip Pelatihan</p>
                        <a href="{{ route('admin.archives.index') }}" 
                           class="block w-full text-center bg-gray-800 text-white py-2 px-4 rounded-lg hover:bg-gray-900 transition-colors duration-200 font-medium text-sm">
                            Kelola Arsip
                        </a>
                    </div>
                </div>

                <!-- Card Total Event -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 hover:shadow-md transition-shadow duration-300">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-gray-100 rounded-lg">
                                <svg class="w-8 h-8 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Event</span>
                        </div>
                        <h3 class="text-3xl font-bold text-gray-800 mb-2">{{ \App\Models\Event::count() }}</h3>
                        <p class="text-gray-600 text-sm mb-4">Total Event & Kegiatan</p>
                        <a href="{{ route('admin.events.index') }}" 
                           class="block w-full text-center bg-gray-800 text-white py-2 px-4 rounded-lg hover:bg-gray-900 transition-colors duration-200 font-medium text-sm">
                            Kelola Event
                        </a>
                    </div>
                </div>

                <!-- Card Total Kategori -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 hover:shadow-md transition-shadow duration-300">
                    <div class="p-6">
                        <div class="flex items-center justify-between mb-4">
                            <div class="p-3 bg-gray-100 rounded-lg">
                                <svg class="w-8 h-8 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                                </svg>
                            </div>
                            <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Kategori</span>
                        </div>
                        <h3 class="text-3xl font-bold text-gray-800 mb-2">{{ \App\Models\Category::count() }}</h3>
                        <p class="text-gray-600 text-sm mb-4">Total Kategori Event</p>
                        <a href="{{ route('admin.categories.index') }}" 
                           class="block w-full text-center bg-gray-800 text-white py-2 px-4 rounded-lg hover:bg-gray-900 transition-colors duration-200 font-medium text-sm">
                            Kelola Kategori
                        </a>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6 mb-6">
                <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                    <svg class="w-5 h-5 mr-2 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                    </svg>
                    Aksi Cepat
                </h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <a href="{{ route('admin.archives.create') }}" 
                       class="flex items-center p-4 border-2 border-gray-200 rounded-lg hover:border-gray-400 hover:bg-gray-50 transition-all duration-200">
                        <div class="p-2 bg-gray-100 rounded-lg mr-3">
                            <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800">Tambah Arsip</h4>
                            <p class="text-sm text-gray-600">Buat arsip baru</p>
                        </div>
                    </a>

                    <a href="{{ route('admin.events.create') }}" 
                       class="flex items-center p-4 border-2 border-gray-200 rounded-lg hover:border-gray-400 hover:bg-gray-50 transition-all duration-200">
                        <div class="p-2 bg-gray-100 rounded-lg mr-3">
                            <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800">Tambah Event</h4>
                            <p class="text-sm text-gray-600">Buat event baru</p>
                        </div>
                    </a>

                    <a href="{{ route('admin.categories.create') }}" 
                       class="flex items-center p-4 border-2 border-gray-200 rounded-lg hover:border-gray-400 hover:bg-gray-50 transition-all duration-200">
                        <div class="p-2 bg-gray-100 rounded-lg mr-3">
                            <svg class="w-6 h-6 text-gray-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-semibold text-gray-800">Tambah Kategori</h4>
                            <p class="text-sm text-gray-600">Buat kategori baru</p>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Charts Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-6">
                <!-- Event Status Chart -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                        <svg class="w-5 h-5 text-gray-700 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        Status Event
                    </h3>
                    <div style="position: relative; height: 280px;">
                        <canvas id="eventStatusChart"></canvas>
                    </div>
                </div>

                <!-- Monthly Activity Chart -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                        <svg class="w-5 h-5 text-gray-700 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path>
                        </svg>
                        Aktivitas Bulanan
                    </h3>
                    <div style="position: relative; height: 280px;">
                        <canvas id="monthlyActivityChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Recent Activity / Info -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Recent Archives -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                        <svg class="w-5 h-5 text-gray-700 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                        </svg>
                        Arsip Terbaru
                    </h3>
                    @php
                        $recentArchives = \App\Models\Archive::with('event')->latest()->take(5)->get();
                    @endphp
                    @if($recentArchives->count() > 0)
                        <ul class="space-y-3">
                            @foreach($recentArchives as $archive)
                                <li class="flex items-start pb-3 border-b border-gray-100 last:border-0 last:pb-0">
                                    <span class="text-gray-400 mr-2 mt-1">•</span>
                                    <div class="flex-1">
                                        <a href="{{ route('admin.archives.show', $archive->id) }}" 
                                           class="text-gray-800 hover:text-gray-900 font-medium hover:underline">
                                            {{ Str::limit($archive->title, 40) }}
                                        </a>
                                        <p class="text-xs text-gray-500 mt-1">{{ $archive->created_at->diffForHumans() }}</p>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-gray-500 text-sm">Belum ada arsip tersedia</p>
                    @endif
                </div>

                <!-- Recent Events -->
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <h3 class="text-lg font-bold text-gray-800 mb-4 flex items-center">
                        <svg class="w-5 h-5 text-gray-700 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        Event Terbaru
                    </h3>
                    @php
                        $recentEvents = \App\Models\Event::latest('date_start')->take(5)->get();
                    @endphp
                    @if($recentEvents->count() > 0)
                        <ul class="space-y-3">
                            @foreach($recentEvents as $event)
                                <li class="flex items-start pb-3 border-b border-gray-100 last:border-0 last:pb-0">
                                    <span class="text-gray-400 mr-2 mt-1">•</span>
                                    <div class="flex-1">
                                        <a href="{{ route('admin.events.show', $event->id) }}" 
                                           class="text-gray-800 hover:text-gray-900 font-medium hover:underline">
                                            {{ Str::limit($event->title, 40) }}
                                        </a>
                                        <p class="text-xs text-gray-500 mt-1">{{ \Carbon\Carbon::parse($event->date_start)->format('d M Y') }}</p>
                                    </div>
                                </li>
                            @endforeach
                @endif
            </div>

        </div> <!-- end max-w-7xl -->
    </div> <!-- end py-6 -->

    @push('scripts')
    <!-- Chart.js Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Event Status Data
            const eventStatusData = {
                selesai: {{ $eventSelesai }},
                berlangsung: {{ $eventBerlangsung }},
                mendatang: {{ $eventMendatang }}
            };

            // Monthly Data
            const monthlyLabels = @json(array_column($monthlyData, 'month'));
            const archivesData = @json(array_column($monthlyData, 'archives'));
            const eventsData = @json(array_column($monthlyData, 'events'));

            // Event Status Doughnut Chart
            const eventStatusCtx = document.getElementById('eventStatusChart');
            if (eventStatusCtx) {
                new Chart(eventStatusCtx.getContext('2d'), {
                    type: 'doughnut',
                    data: {
                        labels: ['Selesai', 'Sedang Berlangsung', 'Akan Datang'],
                        datasets: [{
                            data: [eventStatusData.selesai, eventStatusData.berlangsung, eventStatusData.mendatang],
                            backgroundColor: [
                                'rgba(34, 197, 94, 0.8)',
                                'rgba(251, 191, 36, 0.8)',
                                'rgba(59, 130, 246, 0.8)'
                            ],
                            borderColor: [
                                'rgb(255, 255, 255)',
                                'rgb(255, 255, 255)',
                                'rgb(255, 255, 255)'
                            ],
                            borderWidth: 2
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: true,
                        aspectRatio: 1.5,
                        plugins: {
                            legend: {
                                position: 'bottom',
                                labels: {
                                    padding: 15,
                                    font: {
                                        size: 12,
                                        family: "'Inter', sans-serif"
                                    }
                                }
                            },
                            tooltip: {
                                backgroundColor: 'rgba(0, 0, 0, 0.8)',
                                padding: 12,
                                titleFont: {
                                    size: 14,
                                    weight: 'bold'
                                },
                                bodyFont: {
                                    size: 13
                                },
                                callbacks: {
                                    label: function(context) {
                                        let label = context.label || '';
                                        let value = context.parsed || 0;
                                        let total = context.dataset.data.reduce((a, b) => a + b, 0);
                                        let percentage = total > 0 ? ((value / total) * 100).toFixed(1) : 0;
                                        return label + ': ' + value + ' (' + percentage + '%)';
                                    }
                                }
                            }
                        }
                    }
                });
            }

            // Monthly Activity Line Chart
            const monthlyActivityCtx = document.getElementById('monthlyActivityChart');
            if (monthlyActivityCtx) {
                new Chart(monthlyActivityCtx.getContext('2d'), {
                    type: 'line',
                    data: {
                        labels: monthlyLabels,
                        datasets: [
                            {
                                label: 'Arsip',
                                data: archivesData,
                                borderColor: 'rgb(75, 85, 99)',
                                backgroundColor: 'rgba(75, 85, 99, 0.1)',
                                borderWidth: 2,
                                tension: 0.4,
                                fill: true,
                                pointRadius: 4,
                                pointBackgroundColor: 'rgb(75, 85, 99)',
                                pointBorderColor: '#fff',
                                pointBorderWidth: 2,
                                pointHoverRadius: 6
                            },
                            {
                                label: 'Event',
                                data: eventsData,
                                borderColor: 'rgb(31, 41, 55)',
                                backgroundColor: 'rgba(31, 41, 55, 0.1)',
                                borderWidth: 2,
                                tension: 0.4,
                                fill: true,
                                pointRadius: 4,
                                pointBackgroundColor: 'rgb(31, 41, 55)',
                                pointBorderColor: '#fff',
                                pointBorderWidth: 2,
                                pointHoverRadius: 6
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: true,
                        aspectRatio: 1.3,
                        interaction: {
                            mode: 'index',
                            intersect: false,
                        },
                        plugins: {
                            legend: {
                                position: 'bottom',
                                labels: {
                                    padding: 15,
                                    usePointStyle: true,
                                    font: {
                                        size: 12,
                                        family: "'Inter', sans-serif"
                                    }
                                }
                            },
                            tooltip: {
                                backgroundColor: 'rgba(0, 0, 0, 0.8)',
                                padding: 12,
                                titleFont: {
                                    size: 14,
                                    weight: 'bold'
                                },
                                bodyFont: {
                                    size: 13
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    stepSize: 1,
                                    font: {
                                        size: 11
                                    }
                                },
                                grid: {
                                    color: 'rgba(0, 0, 0, 0.05)'
                                }
                            },
                            x: {
                                ticks: {
                                    font: {
                                        size: 11
                                    }
                                },
                                grid: {
                                    display: false
                                }
                            }
                        }
                    }
                });
            }
        });
    </script>
    @endpush
</x-admin-layout>
