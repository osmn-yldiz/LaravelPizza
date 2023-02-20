<!doctype html>
<html lang="tr">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Siparişler</title>

    <style>
        #customers {
            border-collapse: collapse;
            width: 100%;
            text-align: center;
            vertical-align: center;
        }

        #customers td, #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

        #customers th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #000000;
            color: white;
            text-align: center;
        }
    </style>
</head>

<body>

<h1 style="text-align: center;font-family: DejaVu Sans, sans-serif;">SİPARİŞLER</h1>

<table id="customers" style="font-family: DejaVu Sans, sans-serif;">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Kullanıcı</th>
        <th scope="col">Telefon/Email</th>
        <th scope="col">Tarih/Saat</th>
        <th scope="col">Ana Kategori</th>
        <th scope="col">Alt Kategori</th>
        <th scope="col">Pizza</th>
        <th scope="col">Pizza Adeti</th>
        <th scope="col">Tutar</th>
        <th scope="col">Mesaj</th>
        <th scope="col">Durumu</th>
    </tr>
    </thead>
    <tbody>

    @if (count($orders) > 0)
        @foreach ($orders as $order)
            <tr>
                <th scope="row">{{ $loop->iteration }}</th>
                <td>{{ $order->user->name }}</td>
                <td>{{ $order->user->email }}<br>{{$order->phone}}</td>
                <td>{{ \Carbon\Carbon::parse($order['date'])->format('d/m/Y') }}
                    <br>{{ $order->time }}</td>
                <td>{{ $order->category->name }}</td>
                <td>{{ $order->subcategory->name }}</td>
                <td>{{ $order->pizza->name }}</td>
                <td>{{ $order->pizza_quantity }}</td>
                <td>₺{{ ($order->pizza->price * $order->pizza_quantity) }}</td>
                <td>{{ $order->body }}</td>
                <td>{{ $order->status }}</td>
            </tr>
        @endforeach

    @else
        <td colspan="12" class="text-danger font-weight-bold text-center">Gösterilecek Sipariş
            Yok!
        </td>
    @endif

    </tbody>
</table>

</body>
</html>
