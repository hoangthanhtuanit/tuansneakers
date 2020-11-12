<?php

namespace App\Http\Controllers;

use App\Helper\Date;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RevenueController extends Controller
{
    public function index()
    {
        $listMonth = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12];
        // Doanh thu theo tháng
        $revenueInMonth = Order::where('status', 2)
            ->whereMonth('date_shipped', date('m'))
            ->select(DB::raw('sum(total_price) as totalPrice'), DB::raw('date(date_shipped) as month'))
            ->groupBy('month')
            ->get()->toArray();
        $arrRevenueInMonth = [];
        foreach ($listMonth as $month) {
            $total = 0;
            foreach ($revenueInMonth as $key => $value) {
                if (date('m', strtotime($value['month'])) == $month) {
                    $total += (int) $value['totalPrice'];
                }
            }
            $arrRevenueInMonth[] = $total;
        }
        $listMonthJson = json_encode($listMonth);
        $arrRevenueInMonthJson = json_encode($arrRevenueInMonth);
        return view('admin.revenues.index', compact('arrRevenueInMonthJson','listMonthJson'));
    }
}
