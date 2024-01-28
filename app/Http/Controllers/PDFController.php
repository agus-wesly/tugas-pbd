<?php
  
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Order;
use PDF;
  
class PDFController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Order $order)
    {
        $user = Auth::user();
        $order = $user->orders()->where('id', $order->id)->with([
            'orderDetails:order_id,product_id,quantity' => [
                'product:id,product_url,type_id,name,price' => [
                    'type:id,name'
                ],
            ],
        ])->first();

        $totalPrice = number_format($order->total, 0, ',', '.');

        $pdf = PDF::loadView('pdf', [
            'order' => $order,
            'totalPrice' => $totalPrice
        ]);
    
        return $pdf->download('pesanan.pdf');
    }

}