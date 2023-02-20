@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-2">
                @include("inc.sidebar")
            </div>
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header"><i class="fa-solid fa-bars"></i> Kategoriler
                        <a href="{{ route('category.create') }}">
                            <button class="btn btn-success float-right"><i class="fas fa-plus"></i> Yeni Kategori Ekle
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
                                <th scope="col">İsim</th>
                                <th scope="col">Seo Url</th>
                                <th scope="col">Alt Kategori</th>
                                <th scope="col">Düzenle</th>
                                <th scope="col">Sil</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if (count($categories) > 0)
                                @foreach ($categories as $category)
                                    <tr>
                                        <th scope="row">{{ $categories->firstItem() + $loop->index }}</th>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->url }}</td>
                                        <td><a href="{{ route('subcategory.index', $category->id) }}">
                                                <button
                                                    class="btn btn-dark"><i class="fas fa-file-export"></i> Alt Kategori
                                                </button>
                                            </a></td>
                                        <td><a href="{{ route('category.edit', $category->id) }}">
                                                <button
                                                    class="btn btn-warning"><i class="fas fa-edit"></i> Düzenle
                                                </button>
                                            </a></td>
                                        <td>
                                            <button class="btn btn-danger" data-toggle="modal"
                                                    data-target="#exampleModal{{ $category->id }}"><i
                                                    class="fas fa-trash"></i> Sil
                                            </button>
                                        </td>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{ $category->id }}" tabindex="-1"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <form action="{{ route('category.destroy', $category->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title"
                                                                id="exampleModalLabel">{{$category->name}}</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Silmek ister misiniz ?
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
                                <td colspan="6" class="text-danger font-weight-bold text-center">Gösterilecek Kategori
                                    Yok!
                                </td>
                            @endif


                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center">
                            {{ $categories->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
