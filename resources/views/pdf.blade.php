<!DOCTYPE html>
<html>
<head>
    <title>Pesanan</title>
</head>
<body>
    <div style="clear: both; overflow: hidden; max-width: 80rem; margin: 2.5rem auto 0;">
        <div style="width: 100%; border-bottom: 1px solid #e5e7eb; padding-bottom: 1rem;">
            <h2 style="font-size: 0.875rem; font-weight: 600;">Produk Dipesan</h2>
            <table style="width: 100%; margin-top: 0.5rem;">
                <thead>
                    <tr>
                        <th style="font-size: 0.875rem; font-weight: 600; width: 16.6666667%;">Harga Satuan</th>
                        <th style="font-size: 0.875rem; font-weight: 600; width: 16.6666667%;">Jumlah</th>
                        <th style="font-size: 0.875rem; font-weight: 600; width: 16.6666667%;">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($order->orderDetails as $orderDetail)
                        <tr>
                            <td style="width: 66.6666667%;">
                                <div style="display: flex; align-items: center;">
                                    <img src="{{ $orderDetail->product->product_url }}" alt="prod-img" style="width: 2.5rem; height: 2.5rem; object-fit: cover; margin-right: 0.75rem;">
                                    <p style="font-weight: 500;">{{ $orderDetail->product->name }}</p>
                                </div>
                            </td>
                            <td style="width: 16.6666667%;">Rp. {{ $order->total }}</td>
                            <td style="width: 16.6666667%;">{{ $orderDetail->quantity }}</td>
                            <td style="width: 16.6666667%; font-weight: 600;">
                                <p style="background-color: #fde68a; color: #855d27; border-radius: 9999px; padding: 0.25rem; width: 2rem; height: 2rem; display: flex; align-items: center; justify-content: center;">
                                    {{ $order->status }}
                                </p>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <p style="font-weight: 600; width: 100%; text-align: right; margin-top: 1rem;">Total : Rp. {{ $order->total }}</p>
    </div>
     
    
</body>
</html>