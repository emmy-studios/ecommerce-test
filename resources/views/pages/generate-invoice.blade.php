<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ecommerce | Invoice</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                font-size: 12px;
                color: #333;
                margin: 0;
                padding: 0;
            }

            .container {
                width: 100%;
                max-width: 600px;
                margin: 20px auto;
                padding: 20px;
                border: 1px solid #ddd;
            }

            .header,
            .customer-info,
            .products,
            .order-summary {
                margin-bottom: 20px;
            }

            .header {
                text-align: center;
                border-bottom: 1px solid #ddd;
                padding-bottom: 10px;
            }

            .header h1 {
                font-size: 20px;
                margin: 0;
            }

            .header .date {
                font-size: 12px;
                margin-top: 5px;
            }

            .customer-info h2,
            .products h2 {
                font-size: 16px;
                margin-bottom: 10px;
            }

            .customer-info p,
            .order-summary p {
                margin: 5px 0;
            }

            table {
                width: 100%;
                border-collapse: collapse;
                margin-top: 10px;
            }

            table th,
            table td {
                border: 1px solid #ddd;
                padding: 5px;
                text-align: left;
            }

            table th {
                background-color: #f9f9f9;
            }

            .product-name {
                word-wrap: break-word;
                max-width: 300px;
            }

            .order-summary {
                text-align: right;
                border-top: 1px solid #ddd;
                padding-top: 10px;
            }
        </style>
    </head>

    <body>
        <div class="container">
            <div class="header">
                <h1>ecommerce</h1>
                <div class="date">
                    <p>{{ $createdAt }}</p>
                    <p>Order Code: {{ $order->order_code }}</p>
                </div>
            </div>

            <div class="customer-info">
                <h2>Customer Information</h2>
                <p><strong>Username:</strong> {{ $user->name }}</p>
                <p><strong>Name:</strong> {{ $user->first_name }} {{ $user->last_name }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Phone:</strong> {{ $user->phone_code }} {{ $user->phone_number }}</p>
                <p><strong>Billing Address:</strong> {{ $user->address->address_line_1 }}</p>
            </div>

            <div class="products">
                <h2>Products</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orderItems as $item)
                        <tr>
                            <td class="product-name">{{ $item->product->name }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>${{ $item->product->unit_price }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="order-summary">
                <p><strong>Subtotal:</strong> ${{ $order->subtotal }}</p>
                <p><strong>Total:</strong> ${{ $order->total }}</p>
            </div>
        </div>
    </body> 

</html>
