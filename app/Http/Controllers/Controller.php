<?php

namespace App\Http\Controllers;

use App\Category;
use App\Contact;
use App\Order;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function __construct()
    {
        $categories = Category::all();
        $orderN = Order::orderByDesc('date_order')->limit(5)->get();
        $messages = Contact::orderByDesc('created_at')->limit(5)->get();
        view::share(compact('orderN','messages', 'categories'));
    }
}
