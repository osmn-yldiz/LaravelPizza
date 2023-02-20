@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">Menü</div>

                    <div class="card-body">

                        <form action="{{route('frontpage')}}" method="get">
                            <a class="list-group-item list-group-item-action" href="/">Anasayfa</a>
                            <ul class="list-group">
                                @foreach($categories as $category)
                                    <li class="list-group-item list-group-item-action"><a
                                            href="?category_id={{$category->id}}">{{$category->name}}</a></li>
                                @endforeach
                            </ul>
                        </form>

                    </div>

                </div>
            </div>

            @if($category_id)
                <div class="col-md-8">
                    <div class="card">
                        <div
                            class="card-header">{{$categoryName->name}} {{ count($pizzas) ? '('.count($pizzas) .' Pizza'.')' : '' }}</div>

                        <div class="card-body">

                            <nav id="navbar" class="navbar navbar-light" style="background-color: #e3342f;">
                                @foreach($subcategories as $subcategory)
                                    <span class="navbar-brand h1"
                                          data-id="{{$subcategory->category_id}}"><a
                                            href="?category_id={{ $category_id }}&subcategory_id={{$subcategory->id}}">{{$subcategory->name}}</a></span>
                                @endforeach
                            </nav>

                            <div class="row">
                                @forelse ($pizzas as $pizza )
                                    <div class="col-md-4 mt-2 text-center" style="border: 1px solid #ccc;">
                                        <img src="{{ asset("pizza_images/".$pizza->image) }}" class="img-thumbnail"
                                             style="width: 100%;">
                                        <p><b>{{ $pizza->name }}</b></p>
                                        <p>{{ $pizza->description }}</p>
                                        <a href="{{route('pizza.show',$pizza->id)}}">
                                            <button class="btn btn-danger mb-1">Şimdi Sipariş Ver</button>
                                        </a>
                                    </div>
                                @empty
                                    @if(!$subcategory_id)
                                        <div class="col-md-12 mt-3 text-center">
                                            <p class="text-danger font-weight-bold h4">Gösterilecek Pizza Yok!</p>
                                        </div>
                                    @endif
                                @endforelse

                            </div>

                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>
    <style>
        a.list-group-item {
            font-size: 18px;
        }

        a.list-group-item:hover {
            background-color: #e3342f;
            color: #ffffff;
        }

        .list-group a {
            font-size: 15px;
            color: #000000;
        }

        .list-group a:hover {
            color: #e3342f;
            text-decoration: none;
        }

        #navbar a {
            font-size: 18px;
            color: #ffffff;
        }

        #navbar a:hover {
            color: #ffffff;
            text-decoration: none;
        }

        .card-header {
            background-color: #e3342f;
            color: #ffffff;
            font-size: 20px;
        }

    </style>
@endsection
