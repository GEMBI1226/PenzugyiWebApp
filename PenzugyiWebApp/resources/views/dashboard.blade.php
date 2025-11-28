<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-900 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <div class="flex items-center gap-3">
                <!-- Dark Mode Toggle -->
                <button onclick="toggleDarkMode()" class="p-2 rounded-lg bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors duration-200">
                    <svg id="sun-icon" class="w-5 h-5 text-gray-800 dark:text-gray-200 hidden dark:block" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                    <svg id="moon-icon" class="w-5 h-5 text-gray-800 dark:text-gray-200 block dark:hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                    </svg>
                </button>
                <a href="{{ route('transactions.create') }}"
                    class="inline-flex items-center px-4 py-2 bg-indigo-600 dark:bg-indigo-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 dark:hover:bg-indigo-600 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                    + New Transaction
                </a>
            </div>
        </div>
    </x-slot>
    <div class="py-12 bg-gray-50 dark:bg-gray-900 min-h-screen transition-colors duration-300">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Summary Cards -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- Total Income Card -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg transition-colors duration-300">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-green-100 dark:bg-green-900 rounded-md p-3">
                                <svg class="h-6 w-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Income</p>
                                <p class="text-2xl font-semibold text-green-600 dark:text-green-400">{{ number_format($totalIncome, 0, ',', ' ') }} Ft</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Expense Card -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg transition-colors duration-300">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-red-100 dark:bg-red-900 rounded-md p-3">
                                <svg class="h-6 w-6 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Total Expenses</p>
                                <p class="text-2xl font-semibold text-red-600 dark:text-red-400">{{ number_format($totalExpense, 0, ',', ' ') }} Ft</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg transition-colors duration-300">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 bg-blue-100 dark:bg-blue-900 rounded-md p-3">
                                <svg class="h-6 w-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Balance</p>
                                <p class="text-2xl font-semibold {{ $balance >= 0 ? 'text-blue-600 dark:text-blue-400' : 'text-red-600 dark:text-red-400' }}">
                                    {{ $balance >= 0 ? '+' : '' }}{{ number_format($balance, 0, ',', ' ') }} Ft
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Chart Section -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg transition-colors duration-300">
                <div class="p-6">
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Income and Expenses</h3>
                        <div class="flex gap-2">
                            <button id="weeklyBtn" onclick="showWeekly()" 
                                class="px-4 py-2 text-sm font-medium text-white bg-indigo-600 dark:bg-indigo-500 rounded-md hover:bg-indigo-700 dark:hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                Weekly View
                            </button>
                            <button id="monthlyBtn" onclick="showMonthly()" 
                                class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-gray-200 dark:bg-gray-700 rounded-md hover:bg-gray-300 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500">
                                Monthly View
                            </button>
                        </div>
                    </div>
                    
                    <div class="relative" style="height: 400px;">
                        <canvas id="transactionChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <a href="{{ route('transactions.index') }}" 
                    class="block p-6 bg-blue-50 dark:bg-blue-900/30 border border-blue-200 dark:border-blue-800 rounded-lg hover:bg-blue-100 dark:hover:bg-blue-900/50 transition-colors duration-150">
                    <div class="flex items-center">
                        <svg class="w-8 h-8 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-100">View Transactions</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400">See all your transactions</p>
                        </div>
                    </div>
                </a>

                <a href="{{ route('transactions.create') }}" 
                    class="block p-6 bg-green-50 dark:bg-green-900/30 border border-green-200 dark:border-green-800 rounded-lg hover:bg-green-100 dark:hover:bg-green-900/50 transition-colors duration-150">
                    <div class="flex items-center">
                        <svg class="w-8 h-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        <div class="ml-4">
                            <h4 class="text-lg font-semibold text-gray-900 dark:text-gray-100">New Transaction</h4>
                            <p class="text-sm text-gray-600 dark:text-gray-400">Add income or expense</p>
                        </div>
                    </div>
                </a>
            </div>

        </div>
    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <script>
        // Dark mode functions
        function toggleDarkMode() {
            document.documentElement.classList.toggle('dark');
            localStorage.setItem('darkMode', document.documentElement.classList.contains('dark'));
            if (currentChart) {
                updateChartForTheme();
            }
        }

        function updateChartForTheme() {
            const isDark = document.documentElement.classList.contains('dark');
            currentChart.options.plugins.legend.labels.color = isDark ? '#e5e7eb' : '#1f2937';
            currentChart.options.scales.y.grid.color = isDark ? 'rgba(75, 85, 99, 0.3)' : 'rgba(0, 0, 0, 0.05)';
            currentChart.options.scales.y.ticks.color = isDark ? '#9ca3af' : '#6b7280';
            currentChart.options.scales.x.ticks.color = isDark ? '#9ca3af' : '#6b7280';
            currentChart.update();
        }

        // Load dark mode preference
        if (localStorage.getItem('darkMode') === 'true') {
            document.documentElement.classList.add('dark');
        }

        // Data from backend
        const weeklyData = @json($weeklyData);
        const monthlyData = @json($monthlyData);

        let currentChart = null;
        let currentView = 'weekly';

        // Chart configuration
        function createChart(labels, incomeData, expenseData) {
            const ctx = document.getElementById('transactionChart').getContext('2d');
            const isDark = document.documentElement.classList.contains('dark');
            
            if (currentChart) {
                currentChart.destroy();
            }

            currentChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [
                        {
                            label: 'Income',
                            data: incomeData,
                            backgroundColor: 'rgba(34, 197, 94, 0.8)',
                            borderColor: 'rgb(34, 197, 94)',
                            borderWidth: 1,
                            borderRadius: 4,
                        },
                        {
                            label: 'Expense',
                            data: expenseData,
                            backgroundColor: 'rgba(239, 68, 68, 0.8)',
                            borderColor: 'rgb(239, 68, 68)',
                            borderWidth: 1,
                            borderRadius: 4,
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    interaction: {
                        mode: 'index',
                        intersect: false,
                    },
                    plugins: {
                        legend: {
                            position: 'top',
                            labels: {
                                color: isDark ? '#e5e7eb' : '#1f2937',
                                font: {
                                    size: 14
                                },
                                padding: 20
                            }
                        },
                        tooltip: {
                            backgroundColor: isDark ? 'rgba(31, 41, 55, 0.95)' : 'rgba(0, 0, 0, 0.8)',
                            titleColor: isDark ? '#e5e7eb' : '#ffffff',
                            bodyColor: isDark ? '#e5e7eb' : '#ffffff',
                            borderColor: isDark ? '#4b5563' : 'rgba(0, 0, 0, 0.8)',
                            borderWidth: 1,
                            padding: 12,
                            titleFont: {
                                size: 14
                            },
                            bodyFont: {
                                size: 13
                            },
                            callbacks: {
                                label: function(context) {
                                    let label = context.dataset.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    label += new Intl.NumberFormat('hu-HU').format(context.parsed.y) + ' Ft';
                                    return label;
                                }
                            }
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                color: isDark ? '#9ca3af' : '#6b7280',
                                callback: function(value) {
                                    return new Intl.NumberFormat('hu-HU').format(value) + ' Ft';
                                }
                            },
                            grid: {
                                color: isDark ? 'rgba(75, 85, 99, 0.3)' : 'rgba(0, 0, 0, 0.05)'
                            }
                        },
                        x: {
                            ticks: {
                                color: isDark ? '#9ca3af' : '#6b7280'
                            },
                            grid: {
                                display: false
                            }
                        }
                    }
                }
            });
        }

        function showWeekly() {
            currentView = 'weekly';
            createChart(weeklyData.labels, weeklyData.income, weeklyData.expense);
            
            // Update button styles
            const isDark = document.documentElement.classList.contains('dark');
            document.getElementById('weeklyBtn').className = `px-4 py-2 text-sm font-medium text-white bg-indigo-600 ${isDark ? 'dark:bg-indigo-500' : ''} rounded-md hover:bg-indigo-700 ${isDark ? 'dark:hover:bg-indigo-600' : ''} focus:outline-none focus:ring-2 focus:ring-indigo-500`;
            document.getElementById('monthlyBtn').className = `px-4 py-2 text-sm font-medium text-gray-700 ${isDark ? 'dark:text-gray-300' : ''} bg-gray-200 ${isDark ? 'dark:bg-gray-700' : ''} rounded-md hover:bg-gray-300 ${isDark ? 'dark:hover:bg-gray-600' : ''} focus:outline-none focus:ring-2 focus:ring-gray-500`;
        }

        function showMonthly() {
            currentView = 'monthly';
            createChart(monthlyData.labels, monthlyData.income, monthlyData.expense);
            
            // Update button styles
            const isDark = document.documentElement.classList.contains('dark');
            document.getElementById('monthlyBtn').className = `px-4 py-2 text-sm font-medium text-white bg-indigo-600 ${isDark ? 'dark:bg-indigo-500' : ''} rounded-md hover:bg-indigo-700 ${isDark ? 'dark:hover:bg-indigo-600' : ''} focus:outline-none focus:ring-2 focus:ring-indigo-500`;
            document.getElementById('weeklyBtn').className = `px-4 py-2 text-sm font-medium text-gray-700 ${isDark ? 'dark:text-gray-300' : ''} bg-gray-200 ${isDark ? 'dark:bg-gray-700' : ''} rounded-md hover:bg-gray-300 ${isDark ? 'dark:hover:bg-gray-600' : ''} focus:outline-none focus:ring-2 focus:ring-gray-500`;
        }

        // Initialize with weekly view
        document.addEventListener('DOMContentLoaded', function() {
            showWeekly();
        });
    </script>
</x-app-layout>
