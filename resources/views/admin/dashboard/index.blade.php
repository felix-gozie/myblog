@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-10">

    <h1 class="text-3xl font-bold mb-8">Arbitrage Blogging Dashboard</h1>

    <!-- KPI CARDS -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-6 mb-10">
        @php
            $cards = [
                ['Total Articles', $totalArticles],
                ['Total Page Views', number_format($totalViews)],
                ['Total Revenue', '₦'.number_format($totalRevenue)],
                ['Today’s Revenue', '₦'.number_format($todayRevenue)],
                ['Avg RPM', '₦'.$avgRPM],
            ];
        @endphp

        @foreach ($cards as [$label, $value])
            <div class="bg-white p-6 rounded-xl shadow">
                <p class="text-sm text-gray-500">{{ $label }}</p>
                <p class="text-2xl font-bold mt-2">{{ $value }}</p>
            </div>
        @endforeach
    </div>

    <!-- PERFORMANCE METRICS -->
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-6 mb-10">
        <div class="bg-white p-5 rounded-xl shadow text-center">
            <p class="text-sm text-gray-500">Impressions</p>
            <p class="text-xl font-bold">{{ number_format($impressions) }}</p>
        </div>

        <div class="bg-white p-5 rounded-xl shadow text-center">
            <p class="text-sm text-gray-500">Clicks</p>
            <p class="text-xl font-bold">{{ number_format($clicks) }}</p>
        </div>

        <div class="bg-white p-5 rounded-xl shadow text-center">
            <p class="text-sm text-gray-500">CTR</p>
            <p class="text-xl font-bold">{{ $ctr }}%</p>
        </div>

        <div class="bg-white p-5 rounded-xl shadow text-center">
            <p class="text-sm text-gray-500">Avg CPC</p>
            <p class="text-xl font-bold">₦{{ number_format($avgCpc, 2) }}</p>
        </div>
    </div>

    <!-- CHARTS -->
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-10">
        <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="font-semibold mb-4">Views (Last 30 Days)</h3>
            <canvas id="viewsChart" class="h-64"></canvas>
        </div>

        <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="font-semibold mb-4">Earnings (Last 30 Days)</h3>
            <canvas id="earningsChart" class="h-64"></canvas>
        </div>
    </div>

    <!-- CATEGORY PERFORMANCE + PROFIT -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- CATEGORY PERFORMANCE -->
        <div class="bg-white p-6 rounded-xl shadow lg:col-span-2">
            <h3 class="font-semibold mb-6">Category Performance</h3>

            <div class="space-y-5">
                @foreach ($categoryPerformance as $category)
                    @php
                        $rpm = $category->views > 0
                            ? round(($category->revenue / $category->views) * 1000, 2)
                            : 0;
                    @endphp

                    <div>
                        <div class="flex justify-between text-sm mb-1">
                            <span>{{ $category->name }}</span>
                            <span class="font-semibold">
                                ₦{{ number_format($category->revenue) }} • RPM ₦{{ $rpm }}
                            </span>
                        </div>

                        <div class="w-full bg-gray-200 rounded-full h-3">
                            <div
                                class="bg-green-500 h-3 rounded-full"
                                style="width: {{ min($rpm / 10, 100) }}%">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- COST & PROFIT + OPTIMIZATION -->
        <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="font-semibold mb-4">Cost & Profit</h3>

            <div class="space-y-3 text-sm mb-6">
                <div class="flex justify-between">
                    <span>Ad Spend</span>
                    <span>₦{{ number_format($adSpend) }}</span>
                </div>

                <div class="flex justify-between font-bold text-green-600">
                    <span>Profit</span>
                    <span>₦{{ number_format($profit) }}</span>
                </div>
            </div>

            <hr class="my-4">

            <h4 class="font-semibold mb-2 text-sm">Optimization Insights</h4>
            <ul class="text-xs text-gray-600 space-y-2">
                @if ($ctr < 1)
                    <li>⚠ Low CTR detected — review ad placement.</li>
                @endif

                @if ($profit < 0)
                    <li>❌ Campaign running at a loss.</li>
                @endif

                @if ($avgRPM > 1000)
                    <li>🚀 High RPM niche — scale traffic.</li>
                @endif
            </ul>
        </div>

    </div>
</div>

<!-- CHART JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    new Chart(viewsChart, {
        type: 'line',
        data: {
            labels: @json($viewsLabels),
            datasets: [{ data: @json($viewsData), borderWidth: 2, tension: 0.4 }]
        },
        options: { responsive: true, plugins: { legend: { display: false } } }
    });

    new Chart(earningsChart, {
        type: 'line',
        data: {
            labels: @json($earningsLabels),
            datasets: [{ data: @json($earningsData), borderWidth: 2, tension: 0.4 }]
        },
        options: { responsive: true, plugins: { legend: { display: false } } }
    });
</script>
@endsection
