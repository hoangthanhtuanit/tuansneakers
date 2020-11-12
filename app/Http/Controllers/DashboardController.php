<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Contact;
use App\Helper\Date;
use App\Order;
use App\Product;
use App\User;
use Barryvdh\Debugbar\Twig\Extension\Dump;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Tổng số đơn hàng
        $countOrder = count(Order::where('status', 1)->orwhere('status', 0)->orwhere('status', 2)->get());
        // Tổng số thành viên
        $countUser = count(User::all());
        // Tổng doanh thu
        $sumRevenue = Order::where('status', 2)->sum('total_price');
        // Tổng đáng giá
        $sumFeedback = count(Comment::whereNotNull('product_id')->get());
        // Đơn hàng mới nhất
        $orders = Order::orderByDesc('id')->limit(10)->get();
        // San phẩm bán chạy
        $hot_solds = Product::orderByDesc('quantity_sold')->limit(6)->get();
        // Liên hệ mới
        $contacts = Contact::orderByDesc('id')->limit(10)->get()->toArray();
        // Trạng thái đơn hàng
        $orderWait = Order::where('status', 0)->count();
        $orderProcess = Order::where('status', 1)->count();
        $orderDone = Order::where('status', 2)->count();
        $orderCancel = Order::where('status', 3)->count();
        $statusOrder = [
            ['Đang giao hàng', $orderProcess, false],
            ['Đã hủy', $orderCancel, false],
            ['Đã nhận hàng', $orderDone, false],
            ['Chờ xử lý', $orderWait, false]
        ];
        $listDay = Date::GetListDayInMonth();

        // Doanh thu theo tháng
        $revenueInMonth = Order::where('status', 2)
            ->whereMonth('date_shipped', date('m'))
            ->select(DB::raw('sum(total_price) as totalPrice'), DB::raw('date(date_shipped) as day'))
            ->groupBy('day')
            ->get()->toArray();
        $arrRevenueInMonth = [];
        foreach ($listDay as $day) {
            $total = 0;
            foreach ($revenueInMonth as $key => $value) {
                if ($value['day'] == $day) {
                    $total = (int) $value['totalPrice'];
                    break;
                }
            }
            $arrRevenueInMonth[] = $total;
        }

        $statusOrderJson = json_encode($statusOrder);
        $listDayJson = json_encode($listDay);
        $arrRevenueInMonthJson = json_encode($arrRevenueInMonth);
        return view('admin.dashboard', compact('countOrder', 'countUser', 'sumRevenue', 'sumFeedback', 'orders', 'hot_solds', 'statusOrderJson', 'listDayJson', 'arrRevenueInMonthJson', 'contacts'));
    }
}
