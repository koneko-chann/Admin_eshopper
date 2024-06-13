<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use LaravelDaily\LaravelCharts\Classes\LaravelChart;
use App\Models\Views\InventoryView;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
class StatisticController extends Controller
{
    //
    public function _construct()
    {
       
    }
   
    public function index()
    {
        return view('admin.statistic.index');
    }

    public function getRevenueData(Request $request)
    {
        $startDate = $request->input('start_date', now()->startOfYear()->format('Y-m-d'));
        $endDate = $request->input('end_date', now()->endOfYear()->format('Y-m-d'));
        $groupByPeriod = $request->input('period', 'month');
        
        switch ($groupByPeriod) {
            case 'day':
                $dateFormat = '%Y-%m-%d';
                break;
            case 'year':
                $dateFormat = '%Y';
                break;
            case 'month':
            default:
                $dateFormat = '%Y-%m';
                break;
        }
        
        $orders = DB::table('orders')
            ->select(DB::raw('SUM(total_price) as total_revenue'), DB::raw("DATE_FORMAT(created_at, '$dateFormat') as period"))
            ->where('status', 2)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->groupBy('period')
            ->orderBy('period', 'asc')
            ->get();
        
        $labels = $orders->pluck('period');
        $data = $orders->pluck('total_revenue');
        
        return response()->json([
            'labels' => $labels,
            'data' => $data,
        ]);
        
    }

    public function getTopProductsData(Request $request)
    {
        $startDate = $request->input('start_date', now()->startOfYear()->format('Y-m-d'));
        $endDate = $request->input('end_date', now()->endOfYear()->format('Y-m-d'));

        $topProducts = DB::table('order_items')
            ->join('products', 'order_items.product_id', '=', 'products.id')
            ->select('products.name', DB::raw('SUM(order_items.quantity) as total_quantity'))
            ->whereBetween('order_items.created_at', [$startDate, $endDate])
            ->groupBy('products.name')
            ->orderBy('total_quantity', 'desc')
            ->take(5)
            ->get();

        $labels = $topProducts->pluck('name');
        $data = $topProducts->pluck('total_quantity');

        return response()->json([
            'labels' => $labels,
            'data' => $data,
        ]);
    }
}
