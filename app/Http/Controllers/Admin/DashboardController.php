<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Category;
use App\Models\PageView;
use App\Models\Earning;
use App\Models\AdCost;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        /*
        |--------------------------------------------------------------------------
        | BASIC COUNTS
        |--------------------------------------------------------------------------
        */
        $totalArticles = Post::count();

        $totalViews = PageView::sum('views');

        $totalRevenue = Earning::sum('amount');

        $todayRevenue = Earning::whereDate('earned_at', Carbon::today())
            ->sum('amount');

        /*
        |--------------------------------------------------------------------------
        | AVERAGE RPM
        |--------------------------------------------------------------------------
        */
        $avgRPM = $totalViews > 0
            ? round(($totalRevenue / $totalViews) * 1000, 2)
            : 0;

        /*
        |--------------------------------------------------------------------------
        | PERFORMANCE METRICS (ARBITRAGE LOGIC)
        |--------------------------------------------------------------------------
        | These mimic AdSense-style analytics
        */
        $impressions = $totalViews * 3; // avg ads per page

        $clicks = Earning::whereNotNull('post_id')->count();

        $ctr = $impressions > 0
            ? round(($clicks / $impressions) * 100, 2)
            : 0;

        $avgCpc = $clicks > 0
            ? round($totalRevenue / $clicks, 2)
            : 0;

        /*
        |--------------------------------------------------------------------------
        | VIEWS CHART (LAST 30 DAYS)
        |--------------------------------------------------------------------------
        */
        $viewsLast30Days = PageView::where('view_date', '>=', now()->subDays(30))
            ->selectRaw('DATE(view_date) as date, SUM(views) as total')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $viewsLabels = $viewsLast30Days->pluck('date')->map(
            fn ($date) => Carbon::parse($date)->format('M d')
        );

        $viewsData = $viewsLast30Days->pluck('total');

        /*
        |--------------------------------------------------------------------------
        | EARNINGS CHART (LAST 30 DAYS)
        |--------------------------------------------------------------------------
        */
        $earningsLast30Days = Earning::where('earned_at', '>=', now()->subDays(30))
            ->selectRaw('DATE(earned_at) as date, SUM(amount) as total')
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $earningsLabels = $earningsLast30Days->pluck('date')->map(
            fn ($date) => Carbon::parse($date)->format('M d')
        );

        $earningsData = $earningsLast30Days->pluck('total');

        /*
        |--------------------------------------------------------------------------
        | CATEGORY PERFORMANCE
        |--------------------------------------------------------------------------
        */
        $categoryPerformance = Category::leftJoin('posts', 'categories.id', '=', 'posts.category_id')
            ->leftJoin('page_views', 'posts.id', '=', 'page_views.post_id')
            ->leftJoin('earnings', 'posts.id', '=', 'earnings.post_id')
            ->selectRaw('
                categories.name,
                COALESCE(SUM(earnings.amount), 0) as revenue,
                COALESCE(SUM(page_views.views), 0) as views
            ')
            ->groupBy('categories.name')
            ->get();

        /*
        |--------------------------------------------------------------------------
        | COST & PROFIT
        |--------------------------------------------------------------------------
        */
        $adSpend = AdCost::sum('amount');

        $profit = $totalRevenue - $adSpend;

        /*
        |--------------------------------------------------------------------------
        | RETURN VIEW
        |--------------------------------------------------------------------------
        */
        return view('admin.dashboard.index', compact(
            'totalArticles',
            'totalViews',
            'totalRevenue',
            'todayRevenue',
            'avgRPM',
            'impressions',
            'clicks',
            'ctr',
            'avgCpc',
            'viewsLabels',
            'viewsData',
            'earningsLabels',
            'earningsData',
            'categoryPerformance',
            'adSpend',
            'profit'
        ));
    }
}
