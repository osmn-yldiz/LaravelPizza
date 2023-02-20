@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-2">
                @include("inc.sidebar")
            </div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route("category.index")}}">Kategoriler</a></li>
                                <li class="breadcrumb-item"><a
                                        href="{{route("subcategory.index", $subcategory->category_id)}}">{{$category->name}}</a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">{{$subcategory->name}}</li>
                            </ol>
                        </nav>
                        <i class="fas fa-pizza-slice"></i> Pizzalar
                        <a href="{{ route('pizza.create', $subcategory->id) }}">
                            <button class="btn btn-success float-right"><i class="fas fa-plus"></i> Yeni Pizza Ekle
                            </button>
                        </a>
                    </div>

                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        <table class="table table-bordered table-striped table-hover text-center">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Resim</th>
                                <th scope="col">İsim</th>
                                <th scope="col">Seo Url</th>
                                <th scope="col">Açıklama</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Fiyat</th>
                                <th scope="col">Düzenle</th>
                                <th scope="col">Sil</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if (count($pizzas) > 0)
                                @foreach ($pizzas as $pizza)
                                    <tr>
                                        <th scope="row">{{ $pizzas->firstItem() + $loop->index }}</th>
                                        <td><img src="{{ asset("pizza_images/".$pizza->image) }}" width="80"
                                                 alt="{{$pizza->name}}"></td>
                                        <td>{{ $pizza->name }}</td>
                                        <td>{{ $pizza->url }}</td>
                                        <td>{{ $pizza->description }}</td>
                                        <td>{{ $pizza->subcategory->name }}</td>
                                        <td>{{ $pizza->price }}</td>
                                        <td><a href="{{route("pizza.edit", $pizza->id)}}">
                                                <button
                                                    class="btn btn-warning"><i class="fas fa-edit"></i> Düzenle
                                                </button>
                                            </a></td>
                                        <td>
                                            <button class="btn btn-danger" data-toggle="modal"
                                                    data-target="#exampleModal{{ $pizza->id }}"><i
                                                    class="fas fa-trash"></i> Sil
                                            </button>
                                        </td>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{ $pizza->id }}" tabindex="-1"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <form action="{{route("pizza.destroy", $pizza->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="exampleModalLabel">{{$pizza->name}}</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Silmek ister misiniz ?
                                                            <img src="{{ asset("pizza_images/".$pizza->image) }}"
                                                                 alt="{{$pizza->name}}" width="80">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Kapat
                                                            </button>
                                                            <button type="submit" class="btn btn-danger">Sil
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </tr>
                                @endforeach

                            @else
                                <td colspan="9" class="text-danger font-weight-bold text-center">Gösterilecek Pizza
                                    Yok!
                                </td>
                            @endif


                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $pizzas->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
