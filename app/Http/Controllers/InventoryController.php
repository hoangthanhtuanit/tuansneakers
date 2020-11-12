<?php

namespace App\Http\Controllers;

use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $inventories = Product::all();
        foreach ($inventories as $value) {
            $dateGet = date('Y-m-d', strtotime($value['created_at']));
            $dateNow = date_format(Carbon::now(), 'Y-m-d');
            $theDay = (strtotime($dateNow)-strtotime($dateGet))/ (60 * 60 * 24);
            if ($theDay >= 365) {
                $inventory[] = $value;
            }
        }
        return view('admin.inventories.index', compact('inventory'));
    }
}
