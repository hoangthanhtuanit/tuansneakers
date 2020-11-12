<?php

namespace App\Http\Controllers;

use App\Order;
use App\Order_detail;
use App\Product;
use Carbon\Carbon;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }

    public function detail($id)
    {
        $order_details = Order_detail::where('order_id', $id)->get();
        return view('admin.orders.detail', compact('order_details'));
    }

    public function getUpdate($action, $id)
    {
        $order = Order::find($id);
        if ($order) {
            switch ($action) {
                case 'process':
                    $order->status = 1;
                    break;
                case 'success':
                    $order->status = 2;
                    $order->date_shipped = Carbon::now()->toDateString();
                    break;
                case 'cancel':
                    $order->status = 3;
                    $orx = Order_detail::where('order_id', $id)->get();
                    foreach ($orx as $value){
                        $product_id = $value->product_id;
                        $product = Product::find($product_id);
                        Product::where('id', $product_id)->update(array('quantity_in_stock' => $product->quantity_in_stock + $value->quantity, 'quantity_sold' => $product->quantity_sold - $value->quantity));
                    }
                    break;
            }
            $isHandling = $order->save();
            if ($isHandling) {
                session()->flash('toastr', [
                    'type' => 'success',
                    'message' => 'Xử lý thành công'
                ]);
            } else {
                session()->flash('toastr', [
                    'type' => 'error',
                    'message' => 'Xử lý thất bại'
                ]);
            }
        }
        return back();
    }

    public function delete($id)
    {
        $order = Order::find($id);
        if ($order->status == 2 || $order->status == 3) {
            $isDelete = $order->delete();
            Order_detail::where('order_id', $id)->delete();
            if ($isDelete) {
                session()->flash('toastr', [
                    'type' => 'success',
                    'message' => 'Xóa thành công'
                ]);
            }
        } else {
            session()->flash('toastr', [
                'type' => 'error',
                'message' => 'Xóa thất bại'
            ]);
        }
        return redirect('admin/order/index');

    }
}