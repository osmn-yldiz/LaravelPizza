@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Şimdi Sipariş Ver</div>

                    <div class="card-body">
                        @if (Auth::check())
                            <form action="{{ route('order.store') }}" method="post">@csrf
                                <div class="form-group ">
                                    <p><b>İsim:</b> {{ auth()->user()->name }}</p>
                                    <p><b>Email:</b> {{ auth()->user()->email }}</p>
                                    <p>Telefon Numarası: <input type="number" class="form-control" name="phone"
                                                                required>
                                    </p>
                                    <p>Pizza Adeti: <input type="number" class="form-control"
                                                           name="pizza_quantity"
                                                           value="0" min="0"></p>
                                    <p><input type="hidden" name="pizza_id" value="{{ $pizza->id }}"></p>
                                    <p>Tarih:<input type="date" name="date" class="form-control" required></p>
                                    <p>Saat:<input type="time" name="time" class="form-control" required></p>
                                    <p>Mesaj:<textarea class="form-control" name="body" required></textarea></p>

                                    <p class="text-center">
                                        <button class="btn btn-danger" type="submit">Sipariş Ver
                                        </button>
                                    </p>
                                    @if (session('message'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('message') }}
                                        </div>
                                    @endif
                                    @if (session('errmessage'))
                                        <div class="alert alert-danger" role="alert">
                                            {{ session('errmessage') }}
                                        </div>
                                    @endif

                                </div>
                            </form>


                        @else
                            <p><a href="{{route("register")}}" class="text-danger font-weight-bold">Sipariş vermek için
                                    lütfen kayıt
                                    olun!</a></p>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Pizza</div>

                    <div class="card-body">


                        <img src="{{ asset("pizza_images/". $pizza->image) }}" class="img-fluid"
                             style="width: 100%; height: 500px;">
                        <p>
                        <h3><b>{{ $pizza->name }}</b></h3>
                        </p>
                        <p>
                        <h4>{{ $pizza->description }}</h4>
                        </p>
                        <p class="badge badge-dark">{{$category[0]->name}}</p>
                        <p class="badge badge-dark">{{$subcategory[0]->name}}</p>
                        <p><b>Pizza Fiyat:</b> ₺{{ $pizza->price }}</p>


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
