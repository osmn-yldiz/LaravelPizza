@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header"><i class="fas fa-cart-plus"></i> Siparişlerim

                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover text-center">
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
                                        <th scope="row">{{ $orders->firstItem() + $loop->index }}</th>
                                        <td>{{ $order->user->name }}</td>
                                        <td>{{ $order->user->email }}<br>{{$order->phone}}</td>
                                        <td>{{ \Carbon\Carbon::parse($order['date'])->format('d/m/Y') }}
                                            <br>{{ $order->time }}</td>
                                        <td>{{$order->category->name}}</td>
                                        <td>{{ $order->subcategory->name }}</td>
                                        <td>{{ $order->pizza->name }}</td>
                                        <td>{{ $order->pizza_quantity }}</td>
                                        <td>₺{{ ($order->pizza->price * $order->pizza_quantity) }}</td>
                                        <td>{{ $order->body }}</td>
                                        <td>{{ $order->status }}</td>
                                    </tr>
                                @endforeach

                            @else
                                <td colspan="11" class="text-danger font-weight-bold text-center">Gösterilecek Sipariş
                                    Yok!
                                </td>
                            @endif
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $orders->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        a.list-group-item {
            font-size: 18px;
        }

        a.list-group-item:hover {
            background-color: red;
            color: #fff;
        }

        .card-header {
            background-color: red;
            color: #fff;
            font-size: 20px;
        }

    </style>
@endsection
