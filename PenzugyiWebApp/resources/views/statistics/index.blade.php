<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Statistics') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="mb-6">
                        <h3 class="text-2xl font-bold mb-4">{{ __('Expenses by Category') }}</h3>
                        
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

                        <!-- Chart Container -->
                        <div class="chart-container" style="position: relative; height:400px; max-width: 600px; margin: 0 auto;">
                            @if(count($chartData['labels']) > 0)
                                <canvas id="expenseChart"></canvas>
                            @else
                                <div class="text-center py-20 text-gray-500">
                                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
        const colorPalette = [
            'rgba(255, 99, 132, 0.8)',   // Pink
            'rgba(54, 162, 235, 0.8)',   // Blue
            'rgba(255, 206, 86, 0.8)',   // Yellow
            'rgba(75, 192, 192, 0.8)',   // Teal
            'rgba(153, 102, 255, 0.8)',  // Purple
            'rgba(255, 159, 64, 0.8)',   // Orange
            'rgba(199, 199, 199, 0.8)',  // Gray
            'rgba(83, 102, 255, 0.8)',   // Indigo
            'rgba(255, 99, 255, 0.8)',   // Magenta
            'rgba(99, 255, 132, 0.8)',   // Green
        ];

        const borderColors = [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)',
            'rgba(153, 102, 255, 1)',
            'rgba(255, 159, 64, 1)',
            'rgba(199, 199, 199, 1)',
            'rgba(83, 102, 255, 1)',
            'rgba(255, 99, 255, 1)',
            'rgba(99, 255, 132, 1)',
        ];

        let myChart = null;

        function initChart() {
            if (chartData.labels.length === 0) {
                return;
            }

            const ctx = document.getElementById('expenseChart');
            
            if (myChart) {
                myChart.destroy();
            }

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

