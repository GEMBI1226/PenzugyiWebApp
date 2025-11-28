<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Statistics') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen transition-colors duration-300">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg transition-colors duration-300">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-2xl font-bold">{{ __('Expenses by Category') }}</h3>
                            
                            <!-- Dark Mode Toggle -->
                            <button onclick="toggleDarkMode()" class="p-2 rounded-lg bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors duration-200">
                                <svg id="sun-icon" class="w-6 h-6 text-gray-800 dark:text-gray-200 hidden dark:block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                                </svg>
                                <svg id="moon-icon" class="w-6 h-6 text-gray-800 dark:text-gray-200 block dark:hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                                </svg>
                            </button>
                        </div>
                        
                        <!-- Period Toggle -->
                        <div class="flex gap-3 mb-6">
                            <button 
                                onclick="loadChart('monthly')" 
                                id="monthly-btn"
                                class="period-toggle-btn {{ $period === 'monthly' ? 'active' : '' }} px-6 py-2 rounded-lg font-semibold transition-all duration-300">
                                {{ __('Monthly') }}
                            </button>
                            <button 
                                onclick="loadChart('yearly')" 
                                id="yearly-btn"
                                class="period-toggle-btn {{ $period === 'yearly' ? 'active' : '' }} px-6 py-2 rounded-lg font-semibold transition-all duration-300">
                                {{ __('Yearly') }}
                            </button>
                        </div>

                        <!-- Top 3 Categories Summary -->
                        @if(count($topCategories) > 0)
                            <div class="mb-8">
                                <h4 class="text-lg font-semibold mb-4 text-gray-700 dark:text-gray-300">{{ __('Top Spending Categories') }}</h4>
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                    @foreach($topCategories as $index => $category)
                                        <div class="bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-700 dark:to-gray-800 rounded-xl p-5 shadow-md hover:shadow-lg transition-all duration-300 border border-gray-200 dark:border-gray-600">
                                            <div class="flex items-start justify-between mb-3">
                                                <div class="flex items-center gap-2">
                                                    <span class="
                                                        @if($index === 0) bg-gradient-to-br from-yellow-400 to-yellow-600 
                                                        @elseif($index === 1) bg-gradient-to-br from-gray-300 to-gray-500 
                                                        @else bg-gradient-to-br from-orange-400 to-orange-600 
                                                        @endif
                                                        text-white text-xs font-bold w-7 h-7 rounded-full flex items-center justify-center shadow-sm">
                                                        {{ $index + 1 }}
                                                    </span>
                                                    <span class="text-sm font-medium text-gray-500 dark:text-gray-400">
                                                        @if($index === 0) {{ __('Most') }}
                                                        @elseif($index === 1) {{ __('2nd') }}
                                                        @else {{ __('3rd') }}
                                                        @endif
                                                    </span>
                                                </div>
                                            </div>
                                            <h5 class="font-bold text-lg text-gray-800 dark:text-gray-100 mb-2 truncate" title="{{ $category['name'] }}">
                                                {{ $category['name'] }}
                                            </h5>
                                            <p class="text-2xl font-extrabold bg-gradient-to-r from-purple-600 to-indigo-600 dark:from-purple-400 dark:to-indigo-400 bg-clip-text text-transparent">
                                                {{ number_format($category['amount'], 0, ',', ' ') }} Ft
                                            </p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Chart Container -->
                        <div class="chart-container" style="position: relative; height:400px; max-width: 600px; margin: 0 auto;">
                            @if(count($chartData['labels']) > 0)
                                <canvas id="expenseChart"></canvas>
                            @else
                                <div class="text-center py-20 text-gray-500 dark:text-gray-400">
                                    <svg class="mx-auto h-12 w-12 text-gray-400 dark:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                                    </svg>
                                    <p class="mt-4 text-lg font-medium">{{ __('No expense data available for this period') }}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart.js CDN -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>

    <script>
        // Chart data from Laravel
        const chartData = @json($chartData);
        const currentPeriod = '{{ $period }}';
        
        // Vibrant color palette
        // Enhanced color palettes - brighter for dark mode visibility
        const colorPalette = [
            'rgba(255, 99, 132, 0.9)',   // Pink
            'rgba(54, 162, 235, 0.9)',   // Blue
            'rgba(255, 206, 86, 0.9)',   // Yellow
            'rgba(75, 192, 192, 0.9)',   // Teal
            'rgba(153, 102, 255, 0.9)',  // Purple
            'rgba(255, 159, 64, 0.9)',   // Orange
            'rgba(220, 220, 220, 0.9)',  // Light Gray
            'rgba(130, 150, 255, 0.9)',  // Indigo
            'rgba(255, 99, 255, 0.9)',   // Magenta
            'rgba(99, 255, 132, 0.9)',   // Green
        ];

        const borderColors = [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(220, 220, 220, 1)',
            'rgba(130, 150, 255, 1)',
            'rgba(255, 99, 255, 1)',
            'rgba(99, 255, 132, 1)',
        ];

        let myChart = null;

        // Dark mode functions
        function toggleDarkMode() {
            document.documentElement.classList.toggle('dark');
            localStorage.setItem('darkMode', document.documentElement.classList.contains('dark'));
            if (myChart) {
                updateChartForTheme();
            }
        }

        function updateChartForTheme() {
            const isDark = document.documentElement.classList.contains('dark');
            myChart.options.plugins.legend.labels.color = isDark ? '#e5e7eb' : '#374151';
            myChart.update();
        }

        // Load dark mode preference
        if (localStorage.getItem('darkMode') === 'true') {
            document.documentElement.classList.add('dark');
        }

        function initChart() {
            if (chartData.labels.length === 0) {
                return;
            }

            const ctx = document.getElementById('expenseChart');
            
            if (myChart) {
                myChart.destroy();
            }

            const isDark = document.documentElement.classList.contains('dark');
            
            myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: chartData.labels,
                    datasets: [{
                        label: 'Expenses',
                        data: chartData.amounts,
                        backgroundColor: colorPalette,
                        borderColor: borderColors,
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                padding: 20,
                                color: isDark ? '#e5e7eb' : '#374151',
                                font: {
                                    size: 12,
                                    family: "'Inter', sans-serif"
                                }
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const label = context.label || '';
                                    const value = context.parsed || 0;
                                    const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                    const percentage = ((value / total) * 100).toFixed(1);
                                    // Format as Hungarian forint: space as thousands separator, no decimals
                                    const formattedValue = Math.round(value).toLocaleString('hu-HU');
                                    return `${label}: ${formattedValue} Ft (${percentage}%)`;
                                }
                            }
                        }
                    },
                    animation: {
                        animateRotate: true,
                        animateScale: true,
                        duration: 1000
                    }
                }
            });
        }

        function loadChart(period) {
            // Update button states
            document.querySelectorAll('.period-toggle-btn').forEach(btn => {
                btn.classList.remove('active');
            });
            document.getElementById(period + '-btn').classList.add('active');

            // Reload page with new period
            window.location.href = '{{ route("statistics.index") }}?period=' + period;
        }

        // Initialize chart on page load
        document.addEventListener('DOMContentLoaded', initChart);
    </script>

    <style>
        .period-toggle-btn {
            background-color: #e5e7eb;
            color: #6b7280;
        }

        .period-toggle-btn:hover {
            background-color: #d1d5db;
            transform: translateY(-2px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .period-toggle-btn.active {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            box-shadow: 0 4px 15px 0 rgba(102, 126, 234, 0.4);
        }
    </style>
</x-app-layout>

