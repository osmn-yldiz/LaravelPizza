@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">

            <div class="col-md-12">

                <div class="card">
                    <div class="card-header"><i class="fas fa-cart-plus"></i> Siparişler
                        <a style="float:right;" href="{{route("category.index")}}">
                            <button class="bnt btn-secondary btn-sm" style="margin-left: 5px;">Kategoriler</button>
                        </a>
                        <a style="float:right;" href="{{route("customers")}}">
                            <button class="bnt btn-secondary btn-sm" style="margin-left: 5px;">Kullanıcılar</button>
                        </a>

                        <a style="float:right;" href="{{route("order.export")}}">
                            <button class="bnt btn-secondary btn-sm" style="margin-left: 5px;">Excel Dışarı Aktar
                            </button>
                        </a>

                        <a style="float:right;" href="{{route("order.downloadPDF")}}">
                            <button class="bnt btn-secondary btn-sm" style="margin-left: 5px;">Pdf Dışarı Aktar
                            </button>
                        </a>

                    </div>
                    <div class="card-body">
                        <table id="orders-table" class="table table-bordered table-striped table-hover text-center">
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
                                <th scope="col">Kabul Etmek</th>
                                <th scope="col">İptal Etmek</th>
                                <th scope="col">Sipariş<br>Tamamlamak</th>
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
                                        <form action="{{ route('order.status',$order->id) }}" method="post"> @csrf
                                            <td>
                                                <input name="status" type="submit" value="kabul edildi"
                                                       class="btn btn-primary btn-sm">
                                            </td>
                                            <td>
                                                <input name="status" type="submit" value="iptal edildi"
                                                       class="btn btn-danger btn-sm">
                                            </td>
                                            <td>
                                                <input name="status" type="submit" value="tamamlandı"
                                                       class="btn btn-success btn-sm">
                                            </td>
                                        </form>
                                    </tr>
                                @endforeach

                            @else
                                <td colspan="12" class="text-danger font-weight-bold text-center">Gösterilecek Sipariş
                                    Yok!
                                </td>
                            @endif

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
